<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Article;
use App\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function albumUpdate(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('upload', 'upload');
            $name = substr($path, 7);
            $album = Album::find($request->albumId);
            if (!is_null($album)) {
                $photo = new Photo;
                $photo->name = $name;
                $photo->real_name = $file->getClientOriginalName();
                $photo->path = $path;
                $photo->album_id = $album->id;
                $photo->album_name = $album->name;
                $photo->save();
                return response()->json(['status'=>200, 'filename'=>$name, 'url'=>url('/images/'.$path), 'albumId' => $album]);
            }
            return response()->json(['status'=>304, 'filename'=>$name, 'url'=>url('/images/'.$path), 'albumId' => $album]);
        }
        return response()->json($request->albumId);
//        var_dump($request->allFiles());
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
    public function albumsList(Request  $request)
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

    public function editorUpload(Request $request)
    {
        // 编辑附带的上传
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->store('upload', 'upload');
            $name = substr($path, 7);
            $photo = new Photo;
            $photo->name = $name;
            $photo->real_name = $file->getClientOriginalName();
            $photo->path = $path;
            $photo->album_id = 1;
            $photo->album_name = 'default';
            $photo->save();
            return response()->json(['errno' => 0, 'data' => [asset('/uploads/'.$path)]]);
        }

        return response()->json(['errno' => 1]);
    }

    public function newArticle(Request $request)
    {
//        Log::info($request->input());
        $title = $request->input('title');
        $module = $request->input('module');
        $content = e($request->input('content'));
        $article = new Article();
        $article->title = $title;
        $article->module_id = $module;
        $article->content = $content;
        $article->save();
//        file_put_contents('/home/yoohao/Desktop/aa.html', html_entity_decode($content));
        return response()->json(['status' => 'success']);
    }

    public function updateArticle(Request $request)
    {
        DB::table('articles')->where('id', $request->id)->update([
            'title' => $request->input('title'),
            'module_id' => $request->input('module'),
            'content' => e($request->input('content'))
        ]);

        return response()->json(['status' => 200]);
    }

    public function newModule(Request $request)
    {
        // 创建模块
        $module = new Module();
        $module->name = $request->name;
        $module->save();

        return response()->json(['status' => 200]);
    }
}
