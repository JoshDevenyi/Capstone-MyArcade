<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Models\Arcade;
use App\Models\User;
use App\Models\Game;

class ConsoleController extends Controller
{
    //
    public function index()
    {
        return view('index', [
            'popgames' => DB::table('games')
            ->where("id", "=", "1")
            ->orWhere("id", "=", "2")
            ->orWhere("id", "=", "5")
            ->orWhere("id", "=", "6")
            ->orWhere("id", "=", "8")
            ->orWhere("id", "=", "10")
            ->get(),
        ]);
    }


    public function dashboard()
    {
        return view('console.dashboard');
    }

    public function loginForm()
    {
        return view('console.login');
    }

    public function login()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes) && auth()->user()->account_type=="admin")
        {
            return redirect('/dashboard');
        }
        else
        {
            return redirect('/arcades/arcade/'.auth()->user()->id);
        }

        return back()
            ->withInput()
            ->withErrors(['username' => 'Invalid username/password combination']);

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
