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
        User::where('id', Auth::id())->update(['last_klass_id' => $klass_id]);
        session(['current_klass' => $klass_id]);
        return redirect()->route('home');
    }

    public function desactive($id)
    {
        Klass::where('user_id', Auth::id())->where('id', $id)->update(['active' => 0]);
        return redirect()->route('class.list');
    }

    public function active($id)
    {
        Klass::where('user_id', Auth::id())->where('id', $id)->update(['active' => 1]);
        return back();
    }

    public function remove($id)
    {
        Klass::where('user_id', Auth::id())->where('id', $id)->delete();
        return back();
    }

    public function myClasses()
    {
        $user = User::where('id', Auth::id())->with(['klasses'])->first();
        return view('klass-list', ['Classes' => $user->klasses, 'UserID' => Auth::id()]);
    }

    public function removeUser($id, $klassId)
    {
        $klass = Klass::where('user_id', Auth::id())->where('id', $klassId)->first();
        $remove = KlassUser::where('user_id', $id)->where('klass_id', $klass->id)->delete();

        return back();
    }

    public function myClass($name, $id)
    {
        $klass = Klass::where('user_id', Auth::id())->where('id', $id)->with(['users'])->first();
        return view('klass', ['Klass' => $klass]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request)
    {
        $getKlass = Klass::where('code', $request->code)->first();
        $klass = $getKlass;
        if ($getKlass) {
            $userClass = new KlassUser;
            $userClass->user_id = Auth::id();
            $userClass->klass_id = $klass->id;
            $userClass->active = 1;
            $userClass->save();

            User::where('id', Auth::id())->update(['last_klass_id' => $userClass->id]);
            session(['current_klass' => $klass->id]);
            return redirect()->route('home')->with('KlassName', $klass->name);
        }
        return back();
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
