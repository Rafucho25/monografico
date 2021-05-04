<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use App\Models\User;

class UserController extends Controller
{

    public function register(Request $request){

        $data = $request->all();
        Sentinel::registerAndActivate($data);
        return redirect('/');
    }

    public function login(Request $request){

        $data = $request->all();
        if(isset($data['remember'])){
            if(Sentinel::authenticateAndRemember($data) == false){
                return redirect()->back()->with('messageDanger', 'Correo o Contraseña incorrecta, trate de nuevo remember');
            }
            return view('manage.index');
        }

        if(Sentinel::authenticate($data) == false){
            Sentinel::disableCheckpoints();
            return redirect()->back()->with('messageDanger', 'Correo o Contraseña incorrecta, trate de nuevo');
        }
        return redirect()->route('manage.index');
    }
    
    public function logout(){
        Sentinel::logout();
        return redirect('/');
    }

    public function profile(){

        $user = User::find(Sentinel::getUser()->id);
        return view('profile',compact('user'));
    }

    public function update($id, Request $request){

        $user = User::find(Sentinel::getUser()->id);
        $data = $request->all();

        if ($file = $request->file('photo')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/images/users/';
            $safeName = 'user_no_' . $user->id . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $data['photo'] = url('/').'/images/users/'.$safeName;
            $user->photo = $data['photo'];
        }
        $user->fill($data);
        $user->save();

        return redirect()->back()->with('messageSuccess', 'Cambios efectuado correctamente');
    }
}
