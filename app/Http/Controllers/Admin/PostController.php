<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function albumUpdate(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('upload', 'upload');
            $name = substr($path, 7);
            $photo = new Photo;
            $photo->name = $name;
            $photo->real_name = $file->getClientOriginalName();
            $photo->path = $path;
            $photo->save();
            return view('admin.album');
        }
        return view('admin.album');
    }

    public function album(Request $request)
    {
        //查看,创建和删除
    }

    public function albumsList()
    {
        //获取相册列表
        $data = DB::table('albums')->get();
        return response()->json($data);
    }

    public function getPhotos(Request $request)
    {
        //获取指定相册的图片
    }
}
