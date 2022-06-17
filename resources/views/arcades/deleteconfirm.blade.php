@extends ('layout.template')

@section('title', "Remove Game from Arcade")

@section ('content')

<main>
    
    <?php $userName = "Temp"?>
    <?php $gameName = "Temp"?>

    @foreach($users as $userKey => $user)

        @if( $user->id == $arcade->user_id)
            <?php $userName = $user->username?>
        @endif

    @endforeach

    @foreach($games as $gameKey => $game)

        @if( $game->id == $arcade->game_id)
            <?php $gameName = $game->name?>
        @endif

    @endforeach

    <div class="deleteContent">

        <h1 class="pageHeading paddingM">Remove {{$gameName}} from {{$userName}}'s arcade?</h1>

            <div class="flexContainer deleteGroups">

            <div class="deleteGroup">
                <a class="button deleteButton" href="/arcades/delete/{{$arcade->id}}">Remove</a>
            </div>

            <div class="deleteGroup">
                <a class="button" href="/arcades/list">Cancel</a>
            </div>
            
        </div>

    </div>

</main>

@stop