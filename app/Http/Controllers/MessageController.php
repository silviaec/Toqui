<?php

namespace App\Http\Controllers;

use App\Message;
use App\KlassUser;
use App\Klass;
use App\User;
use App\Notification;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myKlasses = KlassUser::select('klass_id')->where('user_id', Auth::id())->get();
        $KlassUser = KlassUser::select('user_id')->whereIn('klass_id', $myKlasses)->groupBy('user_id')->get();
        $users = User::select('id')->addSelect('name')->whereIn('id', $KlassUser)->where('id', '!=', Auth::id())->get();
        return view('messages', ['Classmates' => $users]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox($user_id_to)
    {
        $messages = Message::where('user_id_to', $user_id_to)->where('user_id', Auth::id())
        ->orWhere(function($query) use ($user_id_to) {
            $query->where('user_id_to',  Auth::id())
                      ->where('user_id', $user_id_to);
        })->orderBy('created_at', 'ASC')
        ->join('users', 'users.id', 'messages.user_id')
        ->select('users.name', 'messages.*')
        ->get();
        
        Message::where('user_id_to', Auth::id())->where('user_id', $user_id_to)->where('view', 0)->update(['view' => 1]);

        return json_encode($messages);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message;
        $message->text = $request->message;
        $message->user_id = Auth::id();
        $message->user_id_to = $request->user_id_to;
        $message->save();
        
        $notification = New Notification;
        $notification->user_id = $request->user_id_to;	
        $notification->text	= 'Tenés un nuevo mensaje de '.Auth::user()->name;
        $notification->type = "message";
        $notification->moment = time();
        $notification->reference = Auth::id();
        $notification->save();

        return Auth::user();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        
    }
}
