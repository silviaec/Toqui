<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Klass;
use App\KlassUser;
use App\Hashtag;
use App\UserPostLove;
use App\HashtagPost;

use Illuminate\Support\Facades\Auth;
use DB;
use Redirect;


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

    private function setDefaultKlass() {
        $user = User::select('last_klass_id')->where('id', Auth::id())->first();
        if($user->last_klass_id) {
            session(['current_klass' => $user->last_klass_id]);
            return true;
        } else {
            $klass = KlassUser::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
            if(isset($klass->klass_id)) {
                session(['current_klass' => $klass->klass_id]);
            } else {
                return false;
            }
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($filter = false)
    {   
        if(session('current_klass') === null) {
            if ($this->setDefaultKlass()) {
                return redirect()->route('home');
            }
            return redirect()->route('class.login.form');
        }

        $hashtagFilter = array();
        $hashtagFilter[0] = false;
        if($filter) {
            $where = "#".$filter;
            $hashtagFilter = Hashtag::select(['hashtag_post.post_id', 'hashtags.hashtag', 'hashtags.color'])
                    ->join('hashtag_post', 'hashtag_post.hashtag_id', '=', 'hashtags.id')
                    ->where('hashtag', $where)->where('hashtags.klass_id', session('current_klass'))
                    ->get();
        }

        $isFiltered = false;

        if($hashtagFilter[0]) {
            $filters = array();
            foreach($hashtagFilter as $filter) {
                $filters[] = $filter->post_id;
            }
            $posts = Post::with(['user', 'hashtags'])
                ->whereIn('id', $filters)
                ->orderBy('id', 'DESC')->get();

            $isFiltered = true;
        } else {
            $posts = Post::with(['user', 'hashtags'])
                ->where('klass_id', session('current_klass'))
                ->orderBy('id', 'DESC')->get();
        }

        $user = User::where('id', Auth::id())->with(['klasses'])->first();
        $loves = UserPostLove::select('post_id')->where('user_id', Auth::id())->get();
        $thisKlass = Klass::select(['klasses.*', 'users.name as userName', 'users.id as userId'])->where('klasses.id', session('current_klass'))->join('users', 'users.id', '=', 'klasses.user_id')->get();
        
        // $allHashtags = Hashtag::where('klass_id', session('current_klass'))->orderBy('hashtag', 'ASC')->get();
        
        $hastagsPost = HashtagPost::select('hashtag_id')->get();
        $allHashtags = Hashtag::select('hashtags.*')
            ->whereIn('hashtags.id', $hastagsPost)
            ->where('hashtags.klass_id', '=',  session('current_klass'))
            ->get();
                //dd($allHashtags);

        $postThatIlove = array();
        $i = 0;

        foreach($loves as $love) {
            $postThatIlove[$love->post_id] = true;
            $i++;
        }

        return view('home', [
            'User' => $user, 
            'Posts' => $posts, 
            'Loves' => $postThatIlove, 
            'Klasses' => $user->klasses, 
            'ThisKlass' => $thisKlass[0], 
            'AllHashtags' => $allHashtags, 
            'IsFiltered' => $isFiltered, 
            'Filter' => $hashtagFilter[0], 
            'CountFavorites' => $i
        ]);
    }

}
