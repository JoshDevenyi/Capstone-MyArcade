<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Arcade;
use App\Models\Game;


class UsersController extends Controller
{

    // LISTS

    public function list()
    {
        return view('users.list', [
            'users' => User::all()
        ]);
    }

    public function listByName()
    {
        return view('users.list', [
            'users'  => DB::table('users')->orderBy('last_name', 'asc')->get()
        ]);
    }

    public function listByUsername()
    {
        return view('users.list', [
            'users'  => DB::table('users')->orderBy('username', 'asc')->get()
        ]);
    }

    public function listByEmail()
    {
        return view('users.list', [
            'users' => DB::table('users')->orderBy('email', 'asc')->get()
        ]);
    }

    public function listByType()
    {
        return view('users.list', [
            'users'  => DB::table('users')->orderBy('account_type', 'asc')->get()
        ]);
    }



    public function user(User $user)
    {
        return view('users.user', [
            'user'=>$user
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect('/users/list')
            ->with('message', 'User has been deleted!');
    }

    public function deleteConfirm(User $user)
    {
        return view('users.deleteconfirm', [
            'user'=> $user
        ]);
    }

    public function addForm()
    {
        return view('users.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'account_type'=>'required'
        ]);

        $user = new User();
        $user->username = $attributes['username'];
        $user->password = $attributes['password'];
        $user->first_name = $attributes['first_name'];
        $user->last_name = $attributes['last_name'];
        $user->email = $attributes['email'];
        $user->account_type = $attributes['account_type'];
        $user->save();

        return redirect('/users/list')->with('message','User has been added!');
    }
    
    public function editForm(User $user)
    {
        return view('users.edit', [
            'user'=> $user
        ]);
    }

    public function edit(User $user)
    {
       
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'account_type'=>'required'
        ]);

        $user->username = $attributes['username'];
        $user->password = $attributes['password'];
        $user->first_name = $attributes['first_name'];
        $user->last_name = $attributes['last_name'];
        $user->email = $attributes['email'];
        $user->account_type = $attributes['account_type'];
        $user->save();

        return redirect('/users/list')->with('message','User has been edited!');

    }


    // public function arcade(User $user)
    // {   
    //     return view('arcades.arcade', [
    //         'user'=>$user,
    //         'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('date_obtained', 'desc')->get(),
    //         'games' => Game::all(),
    //         'count' => DB::table('arcades')->where('user_id', $user->id)->count()
    //     ]);
    // }
    
    // public function arcadeAddForm(Game $game)
    // {
    //     dd($game);
    //     return view('arcades.add', [
    //         'users' => User::all(),
    //         'games' => Game::all(),
    //         'game'=>$game
    //     ]);
    // }


}
