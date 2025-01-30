<?php

namespace App\Services;

use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class FileService
{
        /**
     * @param $requestFile
     * @param $folder
     * @return string
     */
    public static function upload($requestFiles, $folder)
    {
        $uploadedFiles = [];
        $folderPath = 'images/' . $folder;
        $uploadPath = public_path($folderPath);

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        if (is_array($requestFiles)) {
            foreach ($requestFiles as $file) {
                $fileName = uniqid('', true) . time() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $fileName);
                $uploadedFiles[] = $folderPath . '/' . $fileName;
            }
            return $uploadedFiles; // ✅ إرجاع مصفوفة عند رفع عدة ملفات
        } else {
            $fileName = uniqid('', true) . time() . '.' . $requestFiles->getClientOriginalExtension();
            $requestFiles->move($uploadPath, $fileName);
            return $folderPath . '/' . $fileName; // ✅ إرجاع نص عند رفع ملف واحد
        }
    }


    /**
     * @param $requestFile
     * @param $code
     * @return string
     */
    public static function uploadLanguageFile($requestFile, $code)
    {
        $filename = $code . '.' . $requestFile->getClientOriginalExtension();
        if (file_exists(base_path('resources/lang/') . $filename)) {
            File::delete(base_path('resources/lang/') . $filename);
        }
        $requestFile->move(base_path('resources/lang/'), $filename);
        return $filename;
    }

    /**
     * @param $file
     * @return bool
     */
    public static function deleteLanguageFile($file)
    {
        if (file_exists(base_path('resources/lang/') . $file)) {
            return File::delete(base_path('resources/lang/') . $file);
        }
        return true;
    }
        /**
     * @param $image = rawOriginalPath
     * @return bool
     */
    public static function delete($image)
    {
        if (!empty($image) && Storage::disk(config('filesystems.default'))->exists($image)) {
            return Storage::disk(config('filesystems.default'))->delete($image);
        }

        //Image does not exist in server so feel free to upload new image
        return true;
    }
        /**
     * @param $requestFile
     * @param $folder
     * @param $deleteRawOriginalImage
     * @return string
     */
    public static function replace($requestFile, $folder, $deleteRawOriginalImage)
    {
        self::delete($deleteRawOriginalImage);
        return self::upload($requestFile, $folder);
    }
}
