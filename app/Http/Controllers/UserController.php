<?php
/**
 * Created by PhpStorm.
 * User: yoohao
 * Date: 17-5-23
 * Time: 下午8:43
 */

namespace app\Http\Controllers;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

}