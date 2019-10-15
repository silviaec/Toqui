<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

use App\UserPostLove;
use Illuminate\Support\Facades\Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = Post::with(['user', 'hashtags'])->where('klass_id', session('current_klass'))->orderBy('id', 'DESC')->get();
        $user = User::where('id', Auth::id())->with(['klasses'])->first();
        $loves = UserPostLove::select('post_id')->where('user_id', Auth::id())->get();

        foreach($loves as $love) {
            $postThatIlove[$love->post_id] = true;
        }

        return view('home', ['Posts' => $posts, 'Loves' => isset($postThatIlove), 'Klasses' => $user->klasses]);
    }

    public function saludar($id) {
       $user = User::find($id);
       return "Hola ".$user->name;
    }
}
