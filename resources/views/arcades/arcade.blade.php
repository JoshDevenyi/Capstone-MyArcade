@extends ('layout.template')

@section('title', "Manage YourArcade")

@section ('content')

    <main>

        <div class="content">

            <h1 class="pageHeading paddingM">YourArcade</h1>

            @if(session()->has('message'))

                <div class="messageBox">
                    <div class="message">
                        {{session()->get('message')}}
                    </div>
                </div>

            @endif


            @if($count == 0)

                <div class="emptyArcade">

                    <div class="emptyMessage">There's nothing here...</div> 

                    <img class="emoji marginM" id="sadEmoji" src="../../images/Sadface.png" alt="Pixel Sad Face Emoji"/>
                    

                    <a href = "/games/list" >
                        <div class="button marginM center">
                            Add the first game!
                        </div>
                    </a>

                    <script src="{{ url('/js/emptyArcadeFace.js') }}"></script>

                </div>

            @else
                <table id="arcadesTable" cellspacing="0">

                    <tr>
                        <th id="arcadeGameHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/games/{{auth()->user()->id}}">
                                    Game
                                </a>
                            </div>
                        </th>
                        <th id="arcadePlatformHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/platform/{{auth()->user()->id}}">
                                    Platform
                                </a>
                            </div>
                        </th>
                        <th id="arcadeLocationHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/location/{{auth()->user()->id}}">
                                    Location
                                </a>
                            </div>
                        </th>
                        <th id="arcadeTimeHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/playtime/{{auth()->user()->id}}">
                                    Playtime
                                </a>
                            </div>
                        </th>
                        <th id="arcadeDateHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/date/{{auth()->user()->id}}">
                                    Acquired
                                </a>
                            </div>
                        </th>
                        <th id="arcadeCompleteHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/completed/{{auth()->user()->id}}">
                                    Completed?
                                </a>
                            </div>
                        </th>
                        <th id="arcadeRatingHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/arcade/rating/{{auth()->user()->id}}">
                                    Rating
                                </a>
                            </div>
                        </th>
                        <th id="arcadeButtonHeading"></th>
                    </tr>

                    @foreach($arcades as $arcadeKey => $arcade)
                        @if($loop->index == $loop->count-1)
                            <tr class="lastArcadeEntry">
                        @else
                            <tr class="arcadeEntry">
                        @endif

                            <?php  $gameInfo = "No Game Found"?>
                            <?php $gameCover = "No Cover Found"?>
                            <?php $gameId = "No ID Found"?>
                            @foreach($games as $gameKey => $game)

                                @if($arcade->game_id === $game->id)
                                    <?php $gameInfo = $game->name ?>
                                    <?php $gameCover = $game->cover ?>
                                    <?php $gameId = $game->id ?>
                                @endif

                            @endforeach

                            <td>
                                <div class="arcadeTextEntry">
                                <a href="/games/game/{{$gameId}}">
                                    @if(substr($gameCover,0,3)=="../")
                                        <img class="gameEntryBoxart imageGrow" src="{{$buffer.$gameCover}}">
                                    @else
                                        <img class="gameEntryBoxart imageGrow" src="{{$gameCover}}">
                                    @endif
                                    <p class="arcadeListGameName">{{$gameInfo}}</p>
                                </a>
                                </div>
                            </td>

                            <td class="arcadePlatformTD">
                                <div class="arcadePlatformData arcadeTextEntry">
                                    {{$arcade->platform}}
                                </div>
                            </td>

                            <td>
                                <div class="arcadeLocationData" >
                                    <div class="arcadeLocationEntry">
                                        {{$arcade->location}}
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="arcadePlaytimeEntry arcadeTextEntry">
                                    {{$arcade->playtime}} Hours
                                </div>
                            </td>


                            <td class="arcadeDateTD">
                                <div class="arcadeDateEntry arcadeTextEntry">
                                    {{date('F jS Y', strtotime($arcade->date_obtained))}}
                                </div>
                            </td>

                            <!-- Turn Boolean to Yes/No -->
                            @if($arcade->completed === 1)
                                <td class="arcadeCompleteTD">
                                    <div class="arcadeTextEntry">
                                        Yes
                                    </div>
                                </td>
                            @else
                                <td class="arcadeCompleteTD">
                                    <div class="arcadeTextEntry">
                                        No
                                    </div>
                                </td>
                            @endif
                            
                            <td class="arcadeTextEntry arcadeRatingTD">
                                <div class="arcadeRatingEntry arcadeTextEntry">
                                    @for($x = 1; $x <= 5; $x++)
                                        @if($x <= $arcade->score)
                                            <span class="iconify star" data-icon="ant-design:star-filled"></span>
                                        @else
                                            <span class="iconify star" data-icon="ant-design:star-outlined"></span>
                                        @endif
                                    @endfor
                                </div>
                            </td>

                            <td>
                                <div class="arcadeButtons">
                                    <a href="/arcades/edit/{{$arcade->id}}">
                                        <div class="arcadeButton arcadeEdit wideButtonArcade">Edit</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonArcade"><span class="iconify buttonIcon" data-icon="clarity:edit-solid"></span></div>
                                    </a>

                                    <a href="/arcades/deleteconfirm/{{$arcade->id}}">
                                        <div class="arcadeButton wideButtonArcade">Remove</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonArcade"><span class="iconify buttonIcon" data-icon="ep:delete-filled"></span></div>
                                    </a>
                                </div>
                            </td>
                                
                        </tr>

                    @endforeach

                </table>
                
                <a href = "/games/list" >
                    <div class="button marginM">
                        Add Arcade Game
                    </div>
                </a>

            @endif
        
        </div>
            
    </main>

@stop