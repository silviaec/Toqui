<?php

namespace App\Http\Controllers;

use App\Post;
use App\HashtagPost;
use App\Comment;
use App\Hashtag;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postWrite', ['hash' => md5(time().rand(0, 9))]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $imageName = null;

        if(isset(request()->image)) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }

        preg_match_all('/#(\w+)/', $request->text, $allHashtags);

        $post = new Post;
        $post->title = trim($request->title);
        $post->userId = Auth::id();
        $post->short_text = $this->cutText($request->text, 50);
        $post->images = $imageName;
        $post->text = $request->text;
        $post->klass_id = session('current_klass');
        $post->hash = trim($request->hash);
        $post->save();

        foreach($allHashtags[0] as $hashtag) {
            $hashTagExist = Hashtag::where('hashtag', $hashtag)->where('klass_id', session('current_klass'))->get();
            if($hashTagExist->isEmpty()) {
                $newHashtag = new Hashtag;
                $newHashtag->hashtag = $hashtag;
                $newHashtag->klass_id = session('current_klass');
                $newHashtag->save();
                $hashtagId = $newHashtag->id;
            } else {
                $hashtagId = $hashTagExist[0]->id;
            }
            $hashtagPost = new HashtagPost;
            $hashtagPost->hashtag_id = $hashtagId;
            $hashtagPost->post_id = $post->id;
            $hashtagPost->save();
        }

        return redirect()->route('home')->with('success', 'You have successfully upload image.');
        
    }

    function cutText($texto, $limite=100) {  
        $texto = trim($texto);
        $texto = strip_tags($texto);
        $tamano = strlen($texto);
        $resultado = '';
        if($tamano <= $limite){
          return $texto;
        } else {
          $texto = substr($texto, 0, $limite);
          $palabras = explode(' ', $texto);
          $resultado = implode(' ', $palabras);
          $resultado .= '...';
        }  
        return $resultado;
    }

        
    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($title, $id)
    {
        $post = Post::where('id', $id)->with(['user', 'userPostLove'])->get();
        $comments = Comment::select(['comments.*', 'users.name as userAuthorName', 'users.id as userAuthorId'])->where('post_id', $id)->join('users', 'users.id', '=', 'user_id')->get();
        return view('post', ['Post' => $post[0], 'Comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
