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

class HelloController extends Controller
{
    public function show(Request $request)
    {
        $users = DB::table('tests')->paginate(15);
//        $users = $users->setPath('test/show')->toJson();
        return view('test.show', ['users' => $users]);
    }
}
