<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:500'    
        ]);

        Comment::create([
            'text' => trim($request->text),
            'user_id' => Auth::id(),
            'post_id' => $request->post,
            'short_text' => $this->cutText($request->text, 20),
            'comment_id' => isset($request->comment_id) ? $request->comment_id : null
        ]);
        $userName = Auth::user()->select('id', 'name')->get();
        
        return response()->json(['success'=>'Comentario agregado con éxito.', 'data'=>['user'=>$userName, 'text'=>$request->text]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
