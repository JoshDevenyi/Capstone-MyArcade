@extends ('layout.template')

@section('title', "Home")

@section ('content')

<main>

    <div id="indexContent" class="flexContainerCol">
        
        <div id="indexContentDiv">

            <div class="indexHeading flexContainer">
                <h1 id="indexTitle">Welcome to MyArcade</h1>
                <img class="emoji" id="indexEmoji" src="../../images/Smileface.png" alt="Pixel Happy Face Emoji"/>
            </div>

            <div class="flexContainer gameSystems">
                <img class="systemVector imageSpin" src="images/controller.png" alt="A Vector of a Game Controller"/>
                <img class="systemVector imageSpin" src="images/cabinet.png" alt="A Vector of an Arcade Machine">
                <img id="portableSystem" class="systemVector imageSpin" src="images/portable.png" alt="A Vector of an Portable Game Stystem"/>
            </div>

            <div id="featuredGames">

                <h2 id="popularHeading">Discover Popular Titles</h2>
                <ul style="display: none">
                    @foreach ($popgames as $game)
                        <li  class="popGamesData">{"id": {{$game->id}} , "name": "{{$game->name}}" , "cover":"{{$game->cover}}" }</li>
                    @endforeach
                </ul>

                <div class="flexContainer">

                    <div class="arrowBox">
                        <div class="arrowLeft" id="arrowLeft"></div>
                    </div>

                    <div class="gameDiv">
                        <div class="flexContainerCol gameAlign">
                            <div class="boxartBox imageGrow">
                                <a href="/games/game/{{$popgames[0]->id}}" id="popLinkOne">
                                    <img id="popGameOne" class="gameBoxart" src="{{$popgames[0]->cover}}" alt="{{$popgames[0]->name}} Boxart"/>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="gameDiv">
                        <div class="flexContainerCol gameAlign">
                            <div class="boxartBox imageGrow">
                                <a href="/games/game/{{$popgames[1]->id}}" id="popLinkTwo">
                                    <img id="popGameTwo" class="gameBoxart" src="{{$popgames[1]->cover}}" alt="{{$popgames[1]->name}} Boxart"/>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="gameDiv">
                        <div class="flexContainerCol gameAlign">
                            <div class="boxartBox imageGrow">
                                <a href="/games/game/{{$popgames[2]->id}}" id="popLinkThree">
                                    <img id="popGameThree" class="gameBoxart" src="{{$popgames[2]->cover}}" alt="{{$popgames[2]->id}} Boxart"/>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="arrowBox">
                        <div class="arrowRight" id="arrowRight"></div>
                    </div>

                </div>

            </div>

            <div id="indexLinks" class="flexContainer">
                <a href="/games/list" class="pageLink indexLink">
                    Explore More Games!
                </a>

                @if(Auth::check())
                <a href="/arcades/arcade/{{auth()->user()->id}}" class="pageLink indexLink">
                    Explore YourArcade!
                </a>

                @else
                <a href="/users/add" class="pageLink indexLink">
                    Start YourArcade!
                </a>
                @endif

            </div>

        </div>

    </div>
    <script src="{{ url('/js/indexJS.js') }}"></script>
</main>

@stop