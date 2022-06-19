@extends ('layout.template')

@section('title', "Edit Arcade Game")
 
@section ('content')

    <main>

        <div class="content">

            <h1 class="pageHeading marginM inputPageHeading">Edit Arcade Game</h1>

            <form method="post" action="/arcades/edit/{{$arcade->id}}" novalidate class="w3-margin-bottom">

                {{csrf_field()}}

                <div class="inputGroup">

                    <label for="userSelect">User:</label>
                    <input type="text" id="user" class="readOnlyInput" required value="{{" " .auth()->user()->username}}" readonly="readonly">
                    <input type="number" name="user_id" class="readOnlyInput" required value="{{old('user_id', $arcade -> user_id)}}" readonly="readonly" style="display:none">

                    {{-- <select name="user_id" id="userSelect">

                        @foreach($users as $userKey => $user)

                            @if(old('user_id', $arcade->user_id)==$user->id)
                                <option value={{$user->id}} selected="selected">{{$user->username}}</option>
                            @else
                                <option value={{$user->id}}>{{$user->username}}</option>
                            @endif

                        @endforeach

                    </select> --}}

                </div>    

                <div class="inputGroup">

                    <label for="gameSelect">Game:</label>
                    <input type="number" name="game_id" required value="{{old('user_id', $arcade -> game_id)}}" readonly="readonly" style="display:none"> 

                    @foreach($games as $gameKey => $game)
                        @if($arcade->game_id === $game->id)
                            <input type="text" id="game" class="readOnlyInput" required value="{{" " .$game->name}}" readonly="readonly">
                        @endif
                    @endforeach
                   
                </div>    
                
                <div class="inputGroup">
                    <label for="platform">Platform:</label>
                    <input type="text" id="platform" class="readOnlyInput" required value="{{" " .$arcade->platform}}" readonly="readonly">
                    <input type="text" name="platform" required value="{{$arcade->platform}}" readonly="readonly" style="display:none"> 


                    @if($errors->first('platform'))
                        <br>
                        <p class="errorText"> {{$errors->first('platform')}} </p>
                    @endif

                </div>

                <div class="inputGroup">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" required value="{{old('location', $arcade -> location)}}">
                    
                    @if($errors->first('location'))
                        <br>
                        <p class="errorText"> {{$errors->first('location')}} </p>
                    @endif
                </div>          

                <div class="inputGroup">
                    <label for="playtime">Hours Played:</label>
                    <input type="number" name="playtime" id="playtime" required value="{{old('playtime', $arcade -> playtime)}}">

                    @if($errors->first('playtime'))
                        <br>
                        <p class="errorText"> {{$errors->first('playtime')}} </p>
                    @endif
                </div>    
                
                <div class="inputGroup">
                    <label for="dateObtained">Date Obtained:</label>
                    <input type="date" name="date_obtained" id="dateObtained" required value="{{old('date_obtained', $arcade -> date_obtained)}}">

                    @if($errors->first('date_obtained'))
                        <br>
                        <p class="errorText"> {{$errors->first('date_obtained')}}</p>
                    @endif
                </div>    

                <div class="inputGroup">
                    <label for="completed">Was the game completed?</label>

                    <select name="completed" id="completed">
                
                        @if(old('completed', $arcade -> completed)=== 0)
                            <option value= 0 selected="selected">No</option>
                        @else
                            <option value= 0>No</option>
                        @endif

                        @if(old('completed', $arcade -> completed)=== 1)
                            <option value=1 selected="selected">Yes</option>
                        @else
                            <option value=1>Yes</option>
                        @endif

                    </select>        

                </div>    

                <div class="inputGroup">
                    <label for="score">Rating:</label>
                    <input type="number" name="score" id="score" min="1" max="5" required value="{{old('score', $arcade -> score)}}">
                    
                    @if($errors->first('score'))
                        <br>
                        <p class="errorText"> {{$errors->first('score')}} </p>
                    @endif

                </div>    
                    
                <button type="submit" class="button marginL">Edit Arcade Game</button>

            </form>

            <div class="returnLink">
                <a href="/arcades/arcade/{{auth()->user()->id}}" class="pageLink">Back to YourArcade</a>
            </div>

        </div>

    </main>

@stop