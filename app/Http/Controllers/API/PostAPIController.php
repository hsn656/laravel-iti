<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class PostAPIController extends Controller
{
    function index()
    {
        //        $posts =Post::all();
        return Post::with("user")->get();
    }
}
