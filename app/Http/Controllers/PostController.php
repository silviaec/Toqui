<?php

namespace App\Http\Controllers;

use App\Post;
use App\HashtagPost;
use App\Comment;
use App\Hashtag;
use App\Klass;
use DB;
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


        $post = new Post;
        $post->title = trim($request->title);
        $post->userId = Auth::id();
        $post->short_text = $this->cutText($request->text, 50);
        $post->images = $imageName;
        $post->text = $request->text;
        $post->klass_id = session('current_klass');
        $post->hash = trim($request->hash);
        $post->save();

        preg_match_all('/#(\w+)/', $request->text, $allHashtags);
        $this->processHashtags($allHashtags, $post->id);

        return redirect()->route('home')->with('success', 'You have successfully upload image.');
        
    }

    private function processHashtags($allHashtags, $postId) {

        HashtagPost::where('post_id', $postId)->forceDelete();

        foreach($allHashtags[0] as $hashtag) {
            $hashTagExist = Hashtag::where('hashtag', $hashtag)->where('klass_id', session('current_klass'))->first();
            if($hashTagExist === null) {
                $newHashtag = new Hashtag;
                $newHashtag->hashtag = $hashtag;
                $newHashtag->klass_id = session('current_klass');
                $newHashtag->color = $this->getRandomColor();
                $newHashtag->save();
                $hashtagId = $newHashtag->id;
            } else {
                $hashtagId = $hashTagExist->id;
            }
            HashtagPost::where('post_id', $postId)->where('hashtag_id', $hashtagId)->forceDelete();
            $hashtagPost = new HashtagPost;
            $hashtagPost->hashtag_id = $hashtagId;
            $hashtagPost->post_id = $postId;
            $hashtagPost->save();
        }
    }

    private function unlinkHashtags($postId) {
        HashtagPost::where('post_id', $postId)->update([
            'deleted_at' => date('Y-m-d h:i:s')
        ]);
    }

    function getRandomColor() {
        $color[] = '#ec82cc';
        $color[] = '#ff9aed';
        $color[] = '#6c87e0';
        $color[] = '#5e7153';
        $color[] = '#537239';
        $color[] = '#d95e0e';
        $color[] = '#fa721c';
        $color[] = '#514f76';
        $color[] = '#514f76';
        $color[] = '#7c5e84';
        return $color[rand(0, count($color)-1)];
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
        $thisKlass = Klass::select(['klasses.*', 'users.name as userName', 'users.id as userId', 'users.photo'])->where('klasses.id', session('current_klass'))->join('users', 'users.id', '=', 'klasses.user_id')->get();
        $post = Post::where('id', $id)->with(['user', 'userPostLove'])->get();
        $comments = Comment::select(['comments.*', 'users.name as userAuthorName', 'users.id as userAuthorId'])->where('post_id', $id)->join('users', 'users.id', '=', 'user_id')->get();
        return view('post', ['Post' => $post[0], 'Comments'=>$comments, 'ThisKlass' => $thisKlass[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->where('userId', Auth::id())->get();

        if(count($post) === 0) {
            return redirect('home');
        }

        return view('postEdit', ['Post' => $post[0]]);
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
        preg_match_all('/#(\w+)/', $request->text, $allHashtags);
        $this->processHashtags($allHashtags, $request->id);

        DB::table('posts')
            ->where('id', $request->id)
            ->where('userId', Auth::id())
            ->update(
                [
                    'text' => $request->text, 
                    'title' => $request->title
                ]);

        return redirect('home');
    }

    public function unpublish($id)
    {
        Post::where('id', $id)
            ->where('userId', Auth::id())
            ->update([
                    'deleted_at' => date('Y-m-d h:i:s')
                ]);
        $this->unlinkHashtags($id);
        return redirect('home');
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
