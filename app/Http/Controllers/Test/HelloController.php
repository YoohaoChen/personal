<?php
/**
 * Created by PhpStorm.
 * User: yoohao
 * Date: 17-5-23
 * Time: 下午6:26
 */

namespace app\Http\Controllers\Test;


use App\Http\Controllers\Controller;

class HelloController extends Controller
{

    public function show($id)
    {
        return view('test.show', ['con' => $this, 'id' => $id]);
    }

}