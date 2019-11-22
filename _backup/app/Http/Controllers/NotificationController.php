<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NotificationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Notification::where('view', 0)->where('user_id', Auth::id())->get();

        if(!$notification->isEmpty()) {
            return json_decode($notification);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMessages()
    {
        $notification = Notification::where('view', 0)->where('user_id', Auth::id())->where('type', 'message')->get();
        if(!$notification->isEmpty()) {
            return json_decode($notification);
        }
    }

    public function ok(Request $request) {
        return Notification::where('user_id', Auth::id())->where('reference', $request->user_id_to)->where('view', 0)->update(['view' => 1]);
    }

    public function stream() {
        $response = new StreamedResponse();
        $notification = Notification::where('view', 0)->where('user_id', Auth::id())->get();
        $count = $notification->count();
        $response->setCallback(function () use ($notification, $count) {
            foreach($notification as $n) {
                Notification::where('user_id', Auth::id())->where('id', $n->id)->update(['view' => 1]);
            }
             echo 'data: ' . $notification . "\n\n";
             echo 'count: ' . $count . "\n\n";
             @ob_flush();
             @flush();
        });
        // Notification::where('user_id', Auth::id())->where('id', $notification->id)->update(['view' => 1]);
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->send();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
