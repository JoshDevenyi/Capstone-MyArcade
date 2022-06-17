<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Models\Arcade;
use App\Models\User;
use App\Models\Game;

class ArcadesController extends Controller
{
    

    //LISTS WITH ALL ARCADES

    public function list()
    {
        return view('arcades.list', [
            'arcades' => Arcade::all(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByUser()
    {   
        return view('arcades.list', [
            'arcades' => DB::table('users')->join('arcades', 'users.id','=','arcades.user_id')->orderBy('users.username', 'asc')->get(),
            'users'=> User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByGames()
    {   
        return view('arcades.list', [
            'arcades' => DB::table('games')->join('arcades', 'games.id','=','arcades.game_id')->orderBy('games.name', 'asc')->get(),
            'users'=> User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByPlatform()
    {
        return view('arcades.list', [
            'arcades' => DB::table('arcades')->orderBy('platform', 'asc')->get(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByLocation()
    {
        return view('arcades.list', [
            'arcades' => DB::table('arcades')->orderBy('location', 'asc')->get(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByPlaytime()
    {
        return view('arcades.list', [
            'arcades' => DB::table('arcades')->orderBy('playtime', 'desc')->get(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByDate()
    {
        return view('arcades.list', [
            'arcades' => DB::table('arcades')->orderBy('date_obtained', 'desc')->get(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByCompleted()
    {
        return view('arcades.list', [
            'arcades' => DB::table('arcades')->orderBy('completed', 'desc')->get(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }

    public function listByRating()
    {
        return view('arcades.list', [
            'arcades' => DB::table('arcades')->orderBy('score', 'desc')->get(),
            'users' => User::all(),
            'games' => Game::all(),
            'count' => Arcade::all()->count()
        ]);
    }


    //PERSONAL ARCADE ENTRIES

    public function arcade(User $user) //By Date Obtained
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => ""
        ]);
    }

    public function arcadeByGames(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('games')->join('arcades', 'games.id','=','arcades.game_id')->where('arcades.user_id', $user->id)->orderBy('games.name', 'asc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"

        ]);
    }
    
    public function arcadeByPlatform(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('platform', 'asc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"
        ]);
    }

    public function arcadeByLocation(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('location', 'asc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"
        ]);
    }

    public function arcadeByPlaytime(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('playtime', 'desc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"
        ]);
    }

    public function arcadeByDate(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('date_obtained', 'desc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"
        ]);
    }

    public function arcadeByCompleted(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('completed', 'desc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"
        ]);
    }

    public function arcadeByRating(User $user)
    {   
        return view('arcades.arcade', [
            'user'=>$user,
            'arcades' => DB::table('arcades')->where('user_id', $user->id)->orderBy('score', 'desc')->get(),
            'games' => Game::all(),
            'count' => DB::table('arcades')->where('user_id', $user->id)->count(),
            'buffer' => "../"
        ]);
    }


    //Other Functions

    public function delete(Arcade $arcade)
    {
        $arcade->delete();
        $user=auth()->user()->id;

        return redirect('/arcades/arcade/'.$user)
            ->with('message', 'Arcade Game has been removed!');
    }

    public function deleteConfirm(Arcade $arcade)
    {
        return view('arcades.deleteconfirm', [
            'users' => User::all(),
            'games' => Game::all(),
            'arcade'=> $arcade
        ]);
    }

    public function addForm(Game $game)
    {
        return view('arcades.add', [
            'users' => User::all(),
            'games' => Game::all(),
            'game'=>$game
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'user_id'=>'required',
            'game_id'=>'required',
            'platform'=>'required',
            'location'=>'required',
            'playtime'=>'required',
            'date_obtained'=>'required',
            'completed'=>'required',
            'score'=>'required',
        ]);

        $user=auth()->user()->id;

        $arcade = new Arcade();
        $arcade->user_id = $attributes['user_id'];
        $arcade->game_id = $attributes['game_id'];
        $arcade->platform = $attributes['platform'];
        $arcade->location = $attributes['location'];
        $arcade->playtime = $attributes['playtime'];
        $arcade->date_obtained = $attributes['date_obtained'];
        $arcade->completed = $attributes['completed'];
        $arcade->score = $attributes['score'];
        $arcade->save();

        return redirect('/arcades/arcade/'.$user)->with('message','A new game has been added to an arcade!');
    }

    public function editForm(Arcade $arcade)
    {
        return view('arcades.edit',[
            'users' => User::all(),
            'games' => Game::all(),
            'arcade' => $arcade
        ]);
    }

    public function edit(Arcade $arcade)
    {
        $attributes = request()->validate([
            'user_id'=>'required',
            'game_id'=>'required',
            'platform'=>'required',
            'location'=>'required',
            'playtime'=>'required',
            'date_obtained'=>'required',
            'completed'=>'required',
            'score'=>'required',
        ]);

        $user=auth()->user()->id;

        $arcade->user_id = $attributes['user_id'];
        $arcade->game_id = $attributes['game_id'];
        $arcade->platform = $attributes['platform'];
        $arcade->location = $attributes['location'];
        $arcade->playtime = $attributes['playtime'];
        $arcade->date_obtained = $attributes['date_obtained'];
        $arcade->completed = $attributes['completed'];
        $arcade->score = $attributes['score'];
        $arcade->save();

        return redirect('/arcades/arcade/'.$user)->with('message','An arcade game has been updated!');
    }

}


