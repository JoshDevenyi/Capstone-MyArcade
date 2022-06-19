@extends ('layout.template')

@section('title', "Manage Arcade Games")

@section ('content')

    <main>

        <div class="content">

            <h1 class="pageHeading paddingM">Admin Arcade List</h1>

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
                        <th class="arcadeAdminHeading adminUserHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/users">
                                    User
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminGameHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/games">
                                    Game
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminPlatformHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/platform">
                                    Platform
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminLocationHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/location">
                                    Location
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminTimeHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/playtime">
                                    Playtime
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminDateHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/date">
                                    Date
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminCompleteHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/completed">
                                    Completed?
                                </a>
                            </div>
                        </th>
                        <th class="arcadeAdminHeading adminRatingHeading">
                            <div class="linkBox">
                                <a class="listSortLink" href="/arcades/list/rating">
                                    Rating
                                </a>
                            </div>
                        </th>
                        <th></th>
                    </tr>

                    @foreach($arcades as $arcadeKey => $arcade)

                        @if($loop->index == $loop->count-1)
                            <tr class="lastArcadeEntry">
                        @else
                            <tr class="arcadeEntry">
                        @endif
                            <?php $userInfo = "No User Found"?>
                            <?php $userID= "No User ID Found"?>

                            @foreach($users as $userKey => $user)
                                
                                @if($arcade->user_id === $user->id)
                                    <?php $userInfo = $user->username?>
                                    <?php $userID = $user->id?>
                                @endif
                                
                            @endforeach
                            <td>
                                <div class="arcadeAdminUser arcadeTextEntry">
                                    <a class="arcadeAdminLink" href="/users/user/{{$userID}}">{{$userInfo}}</a>
                                </div>
                            </td>

                            <?php $gameInfo = "No Game Found"?>
                            <?php $gameID = "No Game ID Found"?>
                            @foreach($games as $gameKey => $game)

                                @if($arcade->game_id === $game->id)
                                    <?php $gameInfo = $game->name?>
                                    <?php $gameID = $game->id?>
                                @endif

                            @endforeach

                            <td>
                                <div class="arcadeAdminGame arcadeTextEntry">
                                    <a class="arcadeAdminLink"  href="/games/game/{{$gameID}}">{{$gameInfo}}</a>
                                </div>
                            </td>

                            <td id="arcadeAdminPlatformCell">
                                <div class="arcadeAdminPlatform arcadeTextEntry">
                                    {{$arcade->platform}}
                                </div>
                            </td>

                            <td id="arcadeAdminLocationCell">
                                <div class="arcadeAdminLocation" >
                                    <div class="arcadeLocationEntry " >
                                        {{$arcade->location}}
                                    </div>
                                </div>
                            </td>

                            <td id="arcadeAdminDateCell">
                                <div class="arcadeAdminPlaytime arcadeTextEntry">
                                    {{$arcade->playtime}} Hours
                                </div>
                            </td>

                            <td id="arcadeAdminDateCell">
                                <div class="arcadeAdminDate arcadeTextEntry">
                                    {{date('F jS Y', strtotime($arcade->date_obtained))}}
                                </div>
                            </td>

                            <!-- Turn Boolean to Yes/No -->
                            @if($arcade->completed === 1)
                                <td id="arcadeAdminCompleteCell">
                                    <div class="arcadeTextEntry">
                                        Yes
                                    </div>
                                </td>
                            @else
                                <td id="arcadeAdminCompleteCell">
                                    <div class="arcadeTextEntry">
                                        No
                                    </div>
                                </td>
                            @endif
                            
                            <td id="arcadeAdminRatingCell">
                                <div class="arcadeAdminRating arcadeTextEntry">
                                    {{$arcade->score}}
                                </div>
                            </td>

                            <td >
                                <div class="arcadeButtons">
                                    <a href="/arcades/edit/{{$arcade->id}}">
                                        <div class="arcadeButton arcadeEdit wideButtonArcadeAdmin">Edit</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonArcadeAdmin"><span class="iconify buttonIcon" data-icon="clarity:edit-solid"></span></div>
                                    </a>

                                    <a href="/arcades/deleteconfirm/{{$arcade->id}}">
                                        <div class="arcadeButton wideButtonArcadeAdmin">Remove</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonArcadeAdmin"><span class="iconify buttonIcon" data-icon="ep:delete-filled"></span></div>
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