<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\UserPostLove;
use Log;
use Illuminate\Support\Facades\Auth;

class LoveController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::find($request->post);
        $loved = UserPostLove::where('post_id', $request->post)->where('user_id', Auth::id());

        if($loved->get()->isEmpty()) {
            $post->increment('love', 1);
            $love = new UserPostLove();
            $love->user_id = Auth::id();
            $love->post_id = $request->post;
            $love->save();
        } else {
            $post->decrement('love', 1);
            $loved->delete();
        }
        
        $post->save();

        return $post->love;
    }
}
