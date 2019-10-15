<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Klass;
use App\KlassUser;
use App\User;

class KlassController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klass-create', ['CurrentKlass' => session('current_klass')]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('klass-login');
    }

    public function classmate()
    {
       return json_encode(User::select('name')->whereIn('id', session('current_klass'))->get());   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change($klass_id)
    {
        session(['current_klass' => $klass_id]);
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request)
    {
        $getKlass = Klass::where('code', $request->code)->get();
        $klass = $getKlass[0];
        if (!$getKlass->isEmpty()) {
            $userClass = new KlassUser;
            $userClass->user_id = Auth::id();
            $userClass->klass_id = $klass->id;
            $userClass->active = 1;
            $userClass->save();
            return redirect()->route('class.login.form')->with('KlassName', $klass->name);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $klass = new Klass;
        $klass->name = $request->name;
        $klass->code = substr(time(),-5);
        $klass->user_id = Auth::id();
        $klass->active = 1;
        if($klass->save()) {
            $userClass = new KlassUser;
            $userClass->user_id = Auth::id();
            $userClass->klass_id = $klass->id;
            $userClass->active = 1;
            $userClass->save();
            return redirect()->route('class.create.form')->with('code', $klass->code);
        }       
    }
}
