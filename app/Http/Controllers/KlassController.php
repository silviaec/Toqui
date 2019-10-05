<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Klass;
use App\KlassUser;

class KlassController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($klass_id)
    {
        return view('klass-create', ['CurrentKlass' => $klass_id]);
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
