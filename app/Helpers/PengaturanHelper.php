<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class PengaturanHelper
{
    public static function getPengaturan()
    {
        $path = storage_path('app/pengaturan.json');
        if (File::exists($path)) {
            return json_decode(File::get($path), true);
        }
        return ['tema' => 'default'];
    }
}
