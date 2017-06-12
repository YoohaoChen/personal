<?php
/**
 * Created by PhpStorm.
 * User: yoohao
 * Date: 17-5-23
 * Time: 下午6:26
 */

namespace app\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HelloController extends Controller
{
    public function show(Request $request)
    {
        $users = DB::table('tests')->paginate(15);
        //        $users = $users->setPath('test/show')->toJson();
        $article = DB::table('articles')->where('id', '=', 1)->get();
        return view('test.show', ['users' => $users, 'articles' => $article]);
    }

    public function editor(Request $request)
    {
//        var_dump($request);
//        Log::info($request);
        var_dump($request->input());
        echo $request->input('content');
//        return response()->json(['errno' => 0, 'data' => ['']]);
    }
    
}
