@extends ('layout.template')

@section('title', "Add Game")

@section ('content')

    <main class="main">

        <div class="content">

            <h1 class="pageHeading marginM inputPageHeading">Add New Game</h1>

            <form method="post" action="/games/add" novalidate class="inputForm">

                {{csrf_field()}}

                <div class="inputGroup">
                    <label for="name">Game Title:</label>
                    <input type="text" name="name" id="name" required value="{{old('name')}}">
                    @if($errors->first('name'))
                        <br>
                        <p class="errorText">{{$errors->first('name')}}</p>
                    @endif

                </div>    

                <div class="inputGroup">
                    <label for="platforms">Platforms:</label>
                    <input type="text" name="platforms" id="platforms" required value="{{old('platforms')}}">

                    @if($errors->first('platforms'))
                        <br>
                        <p class="errorText">{{$errors->first('platforms')}}</p>
                    @endif

                </div>
                
                <div class="inputGroup">
                    <label for="genres">Genres:</label>
                    <input type="text" name="genres" id="genres" required value="{{old('genres')}}">

                    @if($errors->first('genres'))
                        <br>
                        <p class="errorText">{{$errors->first('genres')}}</p>
                    @endif

                </div>

                <div class="inputGroup">
                    <label for="age_ratings">Age Rating:</label>
                    <select name="age_ratings" id="age_ratings" value="{{old('age_ratings')}}">

                        @if(old('age_ratings')=='RP')
                            <option value="RP" selected="selected">RP (Rating Pending)</option>
                        @else
                            <option value="RP">RP (Rating Pending)</option>
                        @endif

                        @if(old('age_ratings')=='E')
                            <option value="E" selected="selected">E (Everyone)</option>
                        @else
                            <option value="E">E (Everyone)</option>
                        @endif

                        @if(old('age_ratings')=='E10')
                            <option value="E10" selected="selected">E10+ (Everyone 10+)</option>
                        @else
                            <option value="E10">E10+ (Everyone 10+)</option>
                        @endif
                        
                        @if(old('age_ratings')=='T')
                            <option value="T" selected="selected">T (Teen)</option>
                        @else
                            <option value="T">T (Teen)</option>
                        @endif

                        @if(old('age_ratings')=='M')
                            <option value="M" selected="selected">M (Mature)</option>
                        @else
                            <option value="M">M (Mature)</option>
                        @endif

                        @if(old('age_ratings')=='AO')
                            <option value="AO" selected="selected">A0 (Adults Only)</option>
                        @else
                            <option value="AO">AO (Adults Only)</option>
                        @endif

                    </select>

                </div>

                <div class="inputGroup">
                    <label for="releaseDate">Release Date:</label>
                    <input type="date" name="release_date" id="releaseDate" required value="{{old('release_date')}}">
                    
                    @if($errors->first('release_date'))
                        <br>
                        <p class="errorText">{{$errors->first('release_date')}}</p>
                    @endif

                </div>   

                <div class="inputGroup">
                    <label for="companies">Developer:</label>
                    <input type="text" name="companies" id="companies" required value="{{old('companies')}}">

                    @if($errors->first('companies'))
                        <br>
                        <p class="errorText">{{$errors->first('companies')}}</p>
                    @endif
                </div>    

                <div class="inputGroup">
                    <label for="cover">Box Art URL:</label>
                    <input type="text" name="cover" id="cover" required value="{{old('cover')}}">

                    @if($errors->first('cover'))
                        <br>
                        <p class="errorText">{{$errors->first('cover')}}</p>
                    @endif
                </div>    

                <div class="inputGroup">
                    <label for="summary">Summary:</label>
                    <br>
                    <textarea name="summary" id="summary" class="summaryTextarea" required>{{old('summary')}}</textarea>
                    {{-- <input type="text" name="summary" id="summary" required value="{{old('summary')}}"> --}}
                    @if($errors->first('summary'))
                        <br>
                        <p class="errorText">{{$errors->first('summary')}}</p>
                    @endif
                </div>    

                <button type="submit" class="button marginL">Add Game</button>

            </form>

            <div class="returnLink">
                <a class="pageLink" href="/games/list">Back to Game List</a>
            </div>

        </div>

    </main>

    @stop