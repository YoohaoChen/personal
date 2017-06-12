<?php
/**
 * Created by PhpStorm.
 * User: yoohao
 * Date: 17-6-10
 * Time: 下午11:52
 */

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Storage;


class AssetController extends Controller
{
    public function getImage($name)
    {
        return response()->file(Storage::get('/image'.$name));
    }

    public function getPhoto($name)
    {
        return response()->file(Storage::disk('upload')->get('/upload'.$name));
    }

}