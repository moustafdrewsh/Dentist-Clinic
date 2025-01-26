<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Services\FileService;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('languages.index', compact('languages'));
    }

    // عرض نموذج الإضافة
    public function create()
    {
        return view('languages.create');
    }

    // تخزين لغة جديدة
    public function store(Request $request)
    {
        $data = $request->validated();

        // رفع الملفات المختلفة
        if ($request->hasFile('panel_file')) {
            $data['panel_file'] = FileService::uploadLanguageFile($request->file('panel_file'), $request->code);
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

        return response()->json([
            'message' => 'تم إضافة اللغة بنجاح.',
            'language' => $language
        ]);
    }
    // عرض نموذج التعديل
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('languages.edit', compact('language'));
    }

    // تحديث بيانات لغة
    public function update(Request $request, Language $language)
    {
        $data = $request->validated();

        // تحديث الملفات
        if ($request->hasFile('panel_file')) {
            $data['panel_file'] = FileService::uploadLanguageFile($request->file('panel_file'), $language->code);
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
        FileService::deleteLanguageFile($language->panel_file);
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
}
