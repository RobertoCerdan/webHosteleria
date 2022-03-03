<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;

class StorageController extends Controller
{
    static public function save(UploadedFile $file, String $nombre)
    {
       //indicamos que queremos guardar un nuevo archivo en el disco local
       Storage::disk('imagenes')->put($nombre,  File::get($file));

    }

    static public function destroy($archivo)
    {
        
        Storage::delete($archivo);
    }
}
