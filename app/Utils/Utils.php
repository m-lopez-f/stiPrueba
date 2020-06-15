<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

Class Utils {

    public static function readFile()
    {
        $contents = fopen(storage_path("app/public/fichero.txt"), "r");
        return $contents;
    }

    public static function extractData($file)
    {
        $coincidents = [];
        while(!feof($file)) {
            $content = fgets($file);
            if (preg_match('/\A[(0-9),(0-9)]/', $content) === 1) {
                
                array_push($coincidents, str_replace(["\r\n", "\n", "\r", '\n\r'], '', $content));
            }
         }
         
        fclose($file);
        return $coincidents;
    }
}