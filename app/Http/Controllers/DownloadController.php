<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadFile($id)
    {
        $file = Asset::where('id', $id)->value('upload');
        return Storage::download($file);
    }
}
