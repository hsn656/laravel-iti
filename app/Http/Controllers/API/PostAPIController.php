<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use  App\Http\Resources\PostResource;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB; ## keep it to check db queries



class PostAPIController extends Controller
{
    function index()
    {
        //   DB::enableQueryLog();
        $posts = Post::with("user")->get();

        $posts = PostResource::collection($posts);
        //    dump(DB::getQueryLog());
        return $posts;
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $user = auth('sanctum')->user();
        $request["user_id"] = $user->id;
        $post = Post::create($request->all());
        return new PostResource($post);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return response()->json([
            "status_code" => 200,
            "message" => "post deleted"
        ]);
    }
}
