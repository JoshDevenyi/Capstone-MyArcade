@extends ('layout.template')

@section('title', "Add Arcade Game")

@section ('content')

    <main>

        <div class="content">

            <h1 class="pageHeading marginM">Add Game to YourArcade</h1>

            <form method="post" action="/arcades/add" novalidate>

                {{csrf_field()}}

                <div class="inputGroup">

                    <label for="user">User:</label>
                    <input type="text" id="user" class="readOnlyInput" required value="{{" " .auth()->user()->username}}" readonly="readonly">
                    <input type="number" name="user_id" class="readOnlyInput" required value="{{auth()->user()->id}}" readonly="readonly" style="display:none">

                </div> 
                    
                <div class="inputGroup">

                    <label for="gameSelect">Game:</label>
                    <input type="text" id="game" class="readOnlyInput" required value="{{" " .$game->name}}" readonly="readonly">
                    <input type="number" name="game_id" required value="{{$game->id}}" readonly="readonly" style="display:none"> 

                </div>    
                
                <div class="inputGroup">
                    <label for="platform">Platform:</label>

                    <input type="text" id="platform" class="readOnlyInput" required value="{{" " .$game->platforms}}" readonly="readonly">
                    <input type="text" name="platform" required value="{{$game->platforms}}" readonly="readonly" style="display:none"> 

                    @if($errors->first('platform'))
                        <br>
                        <p class="errorText"> {{$errors->first('platform')}} </p>
                    @endif

                </div>

                <div class="inputGroup">
                    <label for="location">Location:</label>
                    <input type="text" name="location" id="location" required value="{{old('location')}}">
                    
                    @if($errors->first('location'))
                        <br>
                        <p class="errorText"> {{$errors->first('location')}} </p>
                    @endif
                </div>          

                <div class="inputGroup">
                    <label for="playtime">Hours Played:</label>
                    <input type="number" name="playtime" id="playtime" required value="{{old('playtime')}}">

                    @if($errors->first('playtime'))
                        <br>
                        <p class="errorText"> {{$errors->first('playtime')}} </p>
                    @endif
                </div>
                
                <div class="inputGroup">
                    <label for="dateObtained">Date Obtained:</label>
                    <input type="date" name="date_obtained" id="dateObtained" required value="{{old('date_obtained')}}">

                    @if($errors->first('date_obtained'))
                        <br>
                        <p class="errorText"> {{$errors->first('date_obtained')}}</p>
                    @endif
                </div>

                <div class="inputGroup">

                    <label for="completed">Was the game completed?</label>

                    <select name="completed" id="completed"">
                
                        @if(old('completed') == 0)
                            <option value=0 selected="selected">No</option>
                        @else
                            <option value=0>No</option>
                        @endif

                        @if(old('completed') == 1)
                            <option value=1 selected="selected">Yes</option>
                        @else
                            <option value=1>Yes</option>
                        @endif

                    </select>            

                </div>    

                <div class="inputGroup">

                    <label for="score">Rating:</label>

                    <input type="number" name="score" id="score" min="1" max="5" required value="{{old('score')}}">

                    @if($errors->first('score'))
                        <br>
                        <p class="errorText"> {{$errors->first('score')}} </p>
                    @endif
                </div>    
                    
                <button type="submit" class="button marginL">Add Game to Arcade</button>

            </form>

            <div class="returnLink">
                <a href="/arcades/arcade/{{auth()->user()->id}}" class="pageLink">Back to YourArcade</a>
            </div>

        </div>

    </main>

@stop