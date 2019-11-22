<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Intervention\Image\ImageManagerStatic as Image;


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
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function detail($name, $id)
    {
        $profile = User::where('id', $id)->get();
        return view('profile-detail', ['User' => $profile[0]]);
    }

    function updateAvatar(Request $request)
    {
     $validation = Validator::make($request->all(), [
      'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
     ]);
     if($validation->passes()) {
        $image       = $request->file('select_file');
        $filename = rand() . '.' . $image->getClientOriginalExtension();      

        $image_medium = Image::make($image->getRealPath()); 
        $image_medium->fit(300);
        $image_medium->save(public_path('images/' .$filename));

        $image_small = Image::make($image->getRealPath());              
        $image_small->resize(50, 50);
        $image_small->save(public_path('images/_' .$filename));
        
      User::where('id', Auth::id())->update(['photo' => $filename]);
        
      return response()->json([
       'message'   => 'Image Upload Successfully',
       'uploaded_image' => '<img src="/images/'.$filename.'" class="img-thumbnail" width="250" style="cursor: pointer;"/>',
       'class_name'  => 'alert-success'
      ]);
     } else {
      return response()->json([
       'message'   => $validation->errors()->all(),
       'uploaded_image' => '',
       'class_name'  => 'alert-danger'
      ]);
     }
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
