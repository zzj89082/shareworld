<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Type;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        echo 'fuck';
    }

    /**
     * 军事首页
     */
    public function getMilitary()
    {
        $data = Content::where('Ccategory','军事') -> orderby('Cid','desc') -> get();
        return view('/home/content/military',['title' => '军事资讯','military_data' => $data]);
    }
}
