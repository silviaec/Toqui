<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\UserPostLove;
use Illuminate\Support\Facades\Auth;


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
        $posts = Post::with(['user'])->orderBy('id', 'DESC')->get();
        $loves = UserPostLove::select('post_id')->where('user_id', Auth::id())->get();

        foreach($loves as $love) {
            $postThatIlove[$love->post_id] = true;
        }
        
        $valores = [
            "nombre" => "Silvia",
            "edad" => 30,
            "nacionalidad"=> 'Argentinna'
        ];

        return view('home', ['Posts' => $posts, 'Loves' => isset($postThatIlove), 'Datos' => $valores]);
    }
}
