@extends ('layout.template')

@section('title', "Delete Game")

@section ('content')

<main>

    <div class="deleteContent">

        <h1 class="pageHeading paddingM">Delete {{$game->name}}?</h1>

        <div class="flexContainer deleteGroups">
  
            <div class="deleteGroup"> 
                <a class="button deleteButton" href="/games/delete/{{$game->id}}">Delete</a>
            </div>

            <div class="deleteGroup">
                <a class="button" href="/games/list">Cancel</a>
            </div>

        </div>

    </div>

</main>

@stop