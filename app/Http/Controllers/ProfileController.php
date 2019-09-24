<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profile = User::where('id', Auth::id())->get();
        return view('profile', ['User' => $profile[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $new = trim($request->new);
        if(strlen($new) < 7) {
            return ['result' => -3, 'messsage' => 'La nueva contraseña debe tener al menos 6 caracteres.'];
        }

        if ($request->renew !== $new) {
            return ['result' => 0, 'messsage' => 'Las contraseñas no coinciden.'];
        }

        $user = User::find(Auth::id());
        return $user->changePassword($new);
    }
}
