<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(5);
        $roles = Role::all();
        return \view('user.index', ['users' => $users, 'roles' => $roles]);
    }
    public function edit($id){
        $roles = Role::all();
        $user = User::find($id);
        return \view('user.edit', ['user' => $user, 'roles' => $roles]);
    }
    public function update($id , Request $request){
        $user = User::find($id);
        $user->roles()->sync($request['roles']);

        return \redirect('users');
    }
    public function destroy($id){
        $user = User::find($id);

        $user->roles()->detach();
        $user->delete();

        return \redirect('users');
    }
    public function search(Request $request){
        $search = $request['search'];
        $users = User::where('name', 'like', "%$search%")->paginate(5);

        return \view('user.index', ['users' => $users]);

    }
}
