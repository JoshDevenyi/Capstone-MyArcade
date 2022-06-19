@extends ('layout.template')

@section('title', "Games")

@section ('content')


    <main class="main">
        
        <div class="content">

            <h1 id="gamesListHeading" class="pageHeading paddingM">Video Games on MyArcade</h1>

            @if(session()->has('message'))

                <div class="messageBox">
                    <div class="message">
                        {{session()->get('message')}}
                    </div>
                </div>

            @endif

            <table id="gamesTable" cellspacing="0">

                <tr >
                    <th id="gameNameHeading"></th>
                    <th>
                        <a class="listSortLink" href="/games/list">
                            Name
                        </a>
                    </th>
                    <th id="gamePlatformHeading">
                        <a class="listSortLink" href="/games/list/platform">
                            Platforms
                        </a>
                    </th>
                    <th id="gameGenreHeading">
                        <a class="listSortLink" href="/games/list/genre">
                            Genres
                        </a>
                    </th>
                    <th id="gameReleaseHeading">
                        <a class="listSortLink" href="/games/list/date">
                            Released
                        </a>
                    </th>
                    <th id="gameRatingHeading">
                        <a class="listSortLink" href="/games/list/rating">
                            Rating
                        </a>
                    </th>
                    @if(Auth::check())
                        @if(auth()->user()->account_type === "admin")
                            <th id="gameAdminHeading" ></th>
                        @endif
                    @endif


                </tr>

                @foreach($games as $key => $value)
                    @if($loop->index == $loop->count-1)
                    
                        @if(Auth::check())
                            @if(auth()->user()->account_type === "admin")
                                <tr class="lastGameEntryAdmin">
                            @else
                                <tr class="lastGameEntry">
                            @endif
                        @else
                            <tr class="lastGameEntry">
                        @endif

                    @else
                        <tr class="gameEntry">
                    @endif
                            <td class="gameEntryCover">
                                <a href="/games/game/{{$value->id}}">
                                        <img class="gameEntryBoxart imageGrow" src="{{$value->cover}}">
                                </a>
                            </td>
                            <td class="gameInfoBox gameEntryName">
                                <div class="gameTextBox gameNameData">
                                    <a href="/games/game/{{$value->id}}">{{$value->name}}</a>
                                </div>
                            </td>
                            <td class="gameInfoBox gamePlatformCell">
                                <div class="gameTextBox gamePlaformData">
                                {{$value->platforms}}
                                </div>
                            </td>
                            <td class="gameInfoBox gameGenreCell">
                                <div class="gameTextBox gameGenreData">
                                    {{$value->genres}}
                                </div>
                            </td>
                            <td class="gameInfoBox gameReleaseCell">
                                <div class="gameTextBox gameDateData">
                                    {{date('F jS Y', strtotime($value->release_date))}}
                                <div>
                            </td>

                            <td class="gameEntryRating">
                                @if($value->age_ratings=="RP")
                                    <img src="/images/RP.png" class="ratingSymbol" alt="Rating Pending ESRB Logo">
                                @elseif($value->age_ratings=="E")
                                    <img src="/images/E.png"  class="ratingSymbol" alt="Everyone ESRB Logo">
                                @elseif($value->age_ratings=="E10")
                                    <img src="/images/E10.png" class="ratingSymbol" alt="Everyone 10+ ESRB Logo">
                                @elseif($value->age_ratings=="T")
                                    <img src="/images/T.png"  class="ratingSymbol" alt="Teen ESRB Logo">
                                @elseif($value->age_ratings=="M")
                                    <img src="/images/M.png"  class="ratingSymbol" alt="Mature ESRB Logo">
                                @elseif($value->age_ratings=="AO")
                                    <img src="/images/AO.png" class="ratingSymbol" alt="Adults Only ESRB Logo">
                                @else
                                {{$value->age_ratings}}
                                @endif
                            </td>
                            @if(Auth::check())
                            @if(auth()->user()->account_type === "admin")
                                <td class="udButtons gameEntryButtons">      
                                
                                    <a href="/games/edit/{{$value->id}}">
                                        <div class="udButton udButtonEdit wideButtonGame">Edit</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonGame"><span class="iconify buttonIcon" data-icon="clarity:edit-solid"></span></div>
                                    </a>
        
                                    <a href="/games/deleteconfirm/{{$value->id}}">
                                        <div class="udButton wideButtonGame">Delete</div>
                                        <div class="udButton udButtonIcon narrowButtonGame"><span class="iconify buttonIcon" data-icon="ep:delete-filled"></span></div>
                                    </a>

                                </td>
                            @endif
                        @endif
                        </tr>
                @endforeach

            </table>


            @if(Auth::check())
                @if(auth()->user()->account_type === "admin")
                    <a id="gameListButton" href = "/games/add" class="w3-button w3-green">
                        <div class="button marginM">
                            Add Game
                        </div>
                    </a>
                @endif
            @endif
        
        </div>

    </main>

@stop