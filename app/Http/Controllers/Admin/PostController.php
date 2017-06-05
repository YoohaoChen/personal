<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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

    /**
     * @param Request $request
     */
    public function album(Request $request)
    {
        //查看,创建和删除
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function albumsList(Request $request)
    {
        //获取相册列表
        $data = DB::table('albums')->get();
        return response()->json($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPhotos(Request $request)
    {
        //获取指定相册的图片
        $photos = DB::table('photos')->where('album_id', $request->albumId)->paginate(15);
        foreach ($photos as $value) {
            $value->photoUrl = asset('uploads/'.$value->path);
        };
        return response()->json($photos);
    }
}
