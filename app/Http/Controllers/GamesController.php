<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Models\Game;
use App\Models\User;
use App\Models\Arcade;

$response = Http::get('https://www.giantbomb.com/api/game/3030-21373/?api_key=00d6b5a393527056b1b51b74c3f85ab7c5445e45&format=json&field_list=name,releases,original_game_rating,developers,images,platforms,publishers');

class GamesController extends Controller
{

    // LISTS
    public function list()
    {
        return view('games.list', [
            'games' => DB::table('games')->orderBy('name', 'asc')->get()
        ]);
    }

    public function listByPlatform()
    {
        return view('games.list', [
            'games' => DB::table('games')->orderBy('platforms', 'asc')->get()
        ]);
    }

    public function listByGenre()
    {
        return view('games.list', [
            'games' => DB::table('games')->orderBy('genres', 'asc')->get()
        ]);
    }

    public function listByDate()
    {
        return view('games.list', [
            'games' => DB::table('games')->orderBy('release_date', 'asc')->get()
        ]);
    }

    public function listByRating()
    {
        return view('games.list', [
            'games' => DB::table('games')->orderBy('age_ratings', 'asc')->get()
        ]);
    }

    public function adminlist()
    {
        return view('games.adminlist', [
            'games' => DB::table('games')->orderBy('name', 'asc')->get()
        ]);
    }



    
    public function game(Game $game)
    {        return view('games.game', [
            'game'=> $game
        ]);
    }

    public function delete(Game $game)
    {
        $game->delete();

        return redirect('/games/list')
            ->with('message', 'Game has been deleted!');
    }

    public function deleteConfirm(Game $game)
    {
        return view('games.deleteconfirm', [
            'game'=> $game
        ]);
    }

    public function addForm()
    {
        return view('games.add');
    }

    public function arcadeAddForm(Game $game)
    {
        dd($game->id);
        return view('arcades.add', [
            'users' => User::all(),
            'games' => Game::all(),
            'game'=>$game->id
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'name'=>'required',
            'platforms'=>'required',
            'genres'=>'required',
            'release_date'=>'required',
            'companies'=>'required',
            'cover'=>'required',
            'summary'=>'required',
            'age_ratings'=>'required',
        ]);

        $game = new Game();
        $game->name = $attributes['name'];
        $game->platforms = $attributes['platforms'];
        $game->genres = $attributes['genres'];
        $game->release_date = $attributes['release_date'];
        $game->companies = $attributes['companies'];
        $game->cover = $attributes['cover'];
        $game->summary = $attributes['summary'];
        $game->age_ratings = $attributes['age_ratings'];
        $game->save();

        return redirect('/games/list')->with('message','A new game has been added!');
    }

    public function editForm(Game $game)
    {
        return view('games.edit',[
            'game' => $game
        ]);
    }

    public function edit(Game $game){

        $attributes = request()->validate([
            'name'=>'required',
            'platforms'=>'required',
            'genres'=>'required',
            'release_date'=>'required',
            'companies'=>'required',
            'cover'=>'required',
            'summary'=>'required',
            'age_ratings'=>'required'
        ]);

        $game->name = $attributes['name'];
        $game->platforms = $attributes['platforms'];
        $game->genres = $attributes['genres'];
        $game->release_date = $attributes['release_date'];
        $game->companies = $attributes['companies'];
        $game->cover = $attributes['cover'];
        $game->summary = $attributes['summary'];
        $game->age_ratings = $attributes['age_ratings'];
        $game->save();

        return redirect('/games/list')->with('message','A game has been updated!');

    }

}
