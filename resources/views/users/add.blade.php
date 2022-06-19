@extends ('layout.template')

@section('title', "Add User")

@section ('content')

    <main class="w3-padding">

        <div class="content">

            <h1 class="pageHeading marginM inputPageHeading">Register with MyArcade</h1>

            <form method="post" action="/users/add" novalidate class="w3-margin-bottom">

                {{csrf_field()}}


                <div class="inputGroup">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required value="{{old('username')}}">

                    @if($errors->first('username'))
                        <br>
                        <p class="errorText">{{$errors->first('username')}}</p>
                    @endif

                </div>    

                <div class="inputGroup">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required value="{{old('password')}}">

                    @if($errors->first('password'))
                        <br>
                        <p class="errorText">{{$errors->first('password')}}</p>
                    @endif

                </div>
                
                <div class="inputGroup">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="first_name" id="firstName" required value="{{old('first_name')}}">

                    @if($errors->first('first_name'))
                        <br>
                        <p class="errorText">{{$errors->first('first_name')}}</p>
                    @endif

                </div>

                <div class="inputGroup">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="last_name" id="lastName" required value="{{old('last_name')}}">
                    
                    @if($errors->first('last_name'))
                        <br>
                        <p class="errorText">{{$errors->first('last_name')}}</p>
                    @endif

                </div>          

                <div class="inputGroup">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required value="{{old('email')}}">

                    @if($errors->first('email'))
                        <br>
                        <p class="errorText">{{$errors->first('email')}}</p>
                    @endif

                </div>    
                    
                <div class="inputGroup">
                    <label for="account_type">Account Type:</label>
                    <select name="account_type" id="account_type" value="{{old('account_type')}}">

                        @if(old('account_type')=='standard')
                            <option value="standard" selected="selected">Standard</option>
                        @else
                            <option value="standard">Standard</option>
                        @endif

                        @if(old('account_type')=='admin')
                            <option value="admin" selected="selected">Admin</option>
                        @else
                            <option value="admin">Admin</option>
                        @endif

                    </select>
                </div>

                <button type="submit" class="button marginL">Add User</button>

            </form>

            <div class="returnLink">
                <a href="/users/list" class="pageLink">Back to User List</a>
            </div>

        </div>

    </main>

@stop