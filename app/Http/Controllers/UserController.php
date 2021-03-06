<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use File;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('user.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->pluck('name', 'id');
        return view('user.usuarios.create', compact('roles'));
    }


    public function store(Request $request){

        Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required',
        ])->validate();
        
        /*return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cedula' => ['required', 'unique:users,cedula'],
            'cedula_cliente' => ['exists:clientes,cedula'],
        ]);*/
        
        if($request->password == $request->confirm_password){
            $data = $request->all();
            $newuser = Sentinel::registerAndActivate($data);

            $user = Sentinel::findById($newuser->id);
    
            $role = Sentinel::findRoleById($request->role);
    
            $role->users()->attach($user);

            //foto
            $user = User::find($newuser->id);

            if ($file = $request->file('photo')) {
                $extension = $file->extension()?: 'png';
                $destinationPath = public_path() . '/images/users/';
                $safeName = 'user_no_' . $user->id . '.' . $extension;
                $file->move($destinationPath, $safeName);
                $data['photo'] = url('/').'/images/users/'.$safeName;
                $user->photo = $data['photo'];
            }
            $user->save();
    
            return redirect()->route('manage.admin.usuarios.index')->with('messageSuccess', 'Usuario Creado Correctamente');
        }else{
            return redirect()->back()->with('messageDanger', 'Las Contrase??as no coinciden, favor verificar');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Sentinel::findById($id);
        $roles = DB::table('roles')->pluck('name', 'id');
        
        if ($user->inRole('Basic')) {
            $value = 1;
        } else {
            $value = 2;
        }

        return view('user.usuarios.show', compact('user', 'roles', 'value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$user = User::find($id);
        $user = Sentinel::findById($id);

        $roles = DB::table('roles')->pluck('name', 'id');
        
        if ($user->inRole('Basic')) {
            $value = 1;
        } else {
            $value = 2;
        }

        return view('user.usuarios.edit', compact('user', 'roles', 'value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = User::find($id);
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

        //Elimino el rol actual del usuario
        DB::table('role_users')->where('user_id', $id)->delete();
        
        $user = Sentinel::findById($id);
        $role = Sentinel::findRoleById($request->role);
        $role->users()->attach($user);

        return redirect()->route('manage.admin.usuarios.index')->with('messageSuccess', 'Usuario Modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Sentinel::findById($request->id);
        $user->delete();

        return redirect()->route('manage.admin.usuarios.index')->with('messageSuccess', 'Usuario Eliminado Correctamente');
    }

    public function login(Request $request){

        $data = $request->all();
        if(isset($data['remember'])){
            if(Sentinel::authenticateAndRemember($data) == false){
                return redirect()->back()->with('messageDanger', 'Correo o Contrase??a incorrecta, trate de nuevo remember');
            }
            return view('manage.index');
        }

        if(Sentinel::authenticate($data) == false){
            Sentinel::disableCheckpoints();
            return redirect()->back()->with('messageDanger', 'Correo o Contrase??a incorrecta, trate de nuevo');
        }
        return redirect()->route('manage.index');
    }
    
    public function logout(){
        Sentinel::logout();
        return redirect('/');
    }

    public function profile(){

        $user = User::find(Sentinel::getUser()->id);
        $roles = DB::table('roles')->pluck('name', 'id');
        return view('user.profile',compact('user', 'roles'));
    }

    public function updateProfile($id, Request $request){

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
