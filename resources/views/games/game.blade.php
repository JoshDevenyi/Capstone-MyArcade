@extends ('layout.template')

@section('title', "$game->name")

@section ('content')

<main>

    <div id="gameContent">

        <h1 class="pageHeading paddingM">{{$game->name}}</h1>

        <div class="flexContainer gameFlex">

            
            <div class="gamePageImageBox">

                <div class="gamePageImageFlex flexContainer">
                    <img class="gamePageBoxart" src="{{$game->cover}}" alt="{{$game->name}} box art"/>
                </div>

            </div>

            <div class="gamePageData">

                <div class="flexContainerCol">

                    <p class="gameData">
                        <span class="dataLabel">Platforms: </span> 
                        {{$game->platforms}}
                    </p>

                    <p class="gameData">
                        <span class="dataLabel">Developer: </span> 
                        {{$game->companies}}
                    </p>

                    <p class="gameData">
                        <span class="dataLabel">Release Date: </span> 
                        {{date('F jS Y', strtotime($game->release_date))}}
                    </p>

                    <p class="gameData">
                        <span class="dataLabel">Genres: </span> 
                        {{$game->genres}}
                    </p>

                    <p class="gameData">
                        <span class="dataLabel">Rating: </span> 
                        <div class="gameRating">
                            @if($game->age_ratings=="RP")
                                <img src="/images/RP.png" class="ratingSymbol" alt="Rating Pending ESRB Logo">
                            @elseif($game->age_ratings=="E")
                                <img src="/images/E.png"  class="ratingSymbol" alt="Everyone ESRB Logo">
                            @elseif($game->age_ratings=="E10")
                                <img src="/images/E10.png" class="ratingSymbol" alt="Everyone 10+ ESRB Logo">
                            @elseif($game->age_ratings=="T")
                                <img src="/images/T.png"  class="ratingSymbol" alt="Teen ESRB Logo">
                            @elseif($game->age_ratings=="M")
                                <img src="/images/M.png"  class="ratingSymbol" alt="Mature ESRB Logo">
                            @elseif($game->age_ratings=="AO")
                                <img src="/images/AO.png" class="ratingSymbol" alt="Adults Only ESRB Logo">
                            @else
                            {{$value->age_ratings}}
                            @endif
                        </div>
                    </p>                    

                    <div class="gameSummary gameData">
                        <p class="dataLabel">Summary:</p>
                        <p >{{$game->summary}}</p>
                    </div>

                </div>

            </div>

        </div>

        <div class="gameButtonBox">
            
            @if(Auth::check())
                <a id="gamePageButton" href = "/arcades/add/{{$game->id}}">
                    <div class="button gameButton">
                        Add to YourArcade
                    </div>
                </a>
            @endif

            @if(Auth::check())
                @if(auth()->user()->account_type === "admin")
                    <div class="flexContainer buttonFlex">

                        <a id="gamePageButton" href = "/games/edit/{{$game->id}}">
                            <div class="button editButton gameButton">
                                Edit
                            </div>
                        </a>

                        <a id="gamePageButton" href = "/games/deleteconfirm/{{$game->id}}">
                            <div class="button deleteButton gameButton">
                                Delete
                            </div>
                        </a>

                    </div>
                @endif
            @endif
            
            <div class="gameReturn">
                <a href="/games/list" class="pageLink returnLink" id="gameReturn">Back to List</a>
            </div>
       
        </div>

    </div>

</main>
    
@stop