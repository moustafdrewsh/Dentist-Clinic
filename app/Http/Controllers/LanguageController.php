<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Services\FileService;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{

    private string $uploadFolder;

    public function __construct() {
        $this->uploadFolder = "language";
    }
    // عرض قائمة اللغات
    public function index(Request $request)
    {
        $languages = Language::paginate(10);
        return view('admin.languages.index', compact('languages'));
    }

    // عرض نموذج الإضافة
    public function create()
    {
        return view('admin.languages.create');
    }

    // تخزين لغة جديدة
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'name_in_english'=>'required|string|max:255',
            'code' => 'required|string|unique:languages,code',
            'admin_file' => 'nullable|file|mimes:json',
            'app_file' => 'nullable|file|mimes:json',
            'web_file' => 'nullable|file|mimes:json',
            'image' => 'nullable|image|max:2048',
        ]);

        // رفع الملفات المختلفة
        if ($request->hasFile('admin_file')) {
            $data['admin_file'] = FileService::uploadLanguageFile($request->file('admin_file'), $request->code);
        }

        if ($request->hasFile('app_file')) {
            $data['app_file'] = FileService::uploadLanguageFile($request->file('app_file'), $request->code . "_app");
        }

        if ($request->hasFile('web_file')) {
            $data['web_file'] = FileService::uploadLanguageFile($request->file('web_file'), $request->code . "_web");
        }

        if ($request->hasFile('image')) {
            $data['image'] = FileService::upload($request->file('image'), $this->uploadFolder);
        }

        // حفظ البيانات في قاعدة البيانات
        $language = Language::create($data);

        return redirect()->route('languages.index')->with('success', 'تم إضافة اللغة بنجاح.');
    }
    // عرض نموذج التعديل
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('admin.languages.edit', compact('language'));
    }

    // تحديث بيانات لغة
    public function update(Request $request, Language $language)
    {
        $data = $request->validated();


        // تحديث الملفات
        if ($request->hasFile('admin_file')) {
            $data['admin_file'] = FileService::uploadLanguageFile($request->file('admin_file'), $language->code);
        }

        if ($request->hasFile('app_file')) {
            $data['app_file'] = FileService::uploadLanguageFile($request->file('app_file'), $language->code . "_app");
        }

        if ($request->hasFile('web_file')) {
            $data['web_file'] = FileService::uploadLanguageFile($request->file('web_file'), $language->code . "_web");
        }

        if ($request->hasFile('image')) {
            $data['image'] = FileService::replace($request->file('image'), $this->uploadFolder, $language->getRawOriginal('image'));
        }

        $language->update($data);

        return response()->json([
            'message' => 'تم تحديث اللغة بنجاح.',
            'language' => $language
        ]);
    }
    // حذف لغة
    public function destroy(Language $language)
    {
        // حذف الملفات المرتبطة
        FileService::deleteLanguageFile($language->app_file);
        FileService::deleteLanguageFile($language->admin_file);
        FileService::deleteLanguageFile($language->web_file);
        FileService::delete($language->getRawOriginal('image'));

        $language->delete();

        return response()->json(['message' => 'تم حذف اللغة بنجاح.']);
    }
    public function fetchLanguages()
    {
        $languages = Language::all();
        $defaultLanguage = Language::where('code', 'en')->first();
        $currentLanguage = Session::get('language', $defaultLanguage);
        if (!$currentLanguage) {
            $currentLanguage = $defaultLanguage;
        }
        return view('layouts.master', compact('languages', 'currentLanguage'));
    }



    public function setLanguage($languageCode) {
        $language = Language::where('code', $languageCode)->first();
        if (!empty($language)) {
            Session::put('locale', $language->code);
            Session::put('language', (object)$language->toArray());
            Session::save();
            app()->setLocale($language->code);
        }
        return redirect()->back();
    }


    public function setDefaultLanguage(Request $request) {
        $defaultLanguage = Language::where('code', $request->language_code)->first();

        if ($defaultLanguage) {
            config(['app.locale' => $defaultLanguage->code]);
            Session::put('default_locale', $defaultLanguage->code);
            Session::save();
        }

        return redirect()->back()->with('success', 'Default language updated successfully!');
    }

    //add web language file to path recorse/lang


    public function importAppLanguageFile(Request $request)
    {
        $data = $request->validate([
            'app_file' => 'required|file|mimes:json',
            'language_id' => 'required|exists:languages,id'
        ]);

        $language = Language::findOrFail($data['language_id']);

        $file = $request->file('app_file');
        $fileContent = File::get($file->getRealPath());
        $fileContent = json_decode($fileContent, true);

        // تحديد المسار لحفظ الملف داخل مجلد lang
        $langPath = resource_path('lang');

        // التأكد من وجود المجلد
        if (!File::exists($langPath)) {
            File::makeDirectory($langPath, 0755, true);
        }

        // اسم الملف الذي سيتم تخزينه
        $fileName = $language->code . '.json';

        // تحديد المسار الكامل لحفظ الملف
        $filePath = $langPath . '/' . $fileName;

        // حفظ الملف داخل المجلد المحدد
        File::put($filePath, json_encode($fileContent, JSON_PRETTY_PRINT));

        return redirect()->back()->with('success', 'App language file imported and saved successfully!');
    }




}
