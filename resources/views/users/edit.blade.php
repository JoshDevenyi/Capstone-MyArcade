@extends ('layout.template')

@section('title', "Edit User")

@section ('content')

    <main class="w3-padding">

        <div class="content">

            <h1 class="pageHeading marginM editAddHeading inputPageHeading">
                Edit User:
                <br/>    
                <span class="editOldName">{{$user -> username}}</span>
            </h1>

            <form method="post" action="/users/edit/{{$user->id}}" novalidate class="w3-margin-bottom">

            {{csrf_field()}}

                <div class="inputGroup">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required value="{{old('username', $user->username)}}">

                    @if($errors->first('username'))
                        <br>
                        <p class="errorText">{{$errors->first('username')}}</p>
                    @endif

                </div>    

                <div class="inputGroup">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required value="{{old('password', $user->password)}}">

                    @if($errors->first('password'))
                        <br>
                        <p class="errorText">{{$errors->first('password')}}</p>
                    @endif

                </div>
                
                <div class="inputGroup">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="first_name" id="firstName" required value="{{old('first_name', $user->first_name)}}">

                    @if($errors->first('first_name'))
                        <br>
                        <p class="errorText">{{$errors->first('first_name')}}</p>
                    @endif

                </div>

                <div class="inputGroup">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="last_name" id="lastName" required value="{{old('last_name', $user->last_name)}}">
                    
                    @if($errors->first('last_name'))
                        <br>
                        <p class="errorText">{{$errors->first('last_name')}}</p>
                    @endif

                </div>          

                <div class="inputGroup">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required value="{{old('email', $user->email)}}">

                    @if($errors->first('email'))
                        <br>
                        <p class="errorText">{{$errors->first('email')}}</p>
                    @endif
                </div>    
                    
                <div class="inputGroup">
                    <label for="email">Account Type:</label>
                    <select name="account_type" id="account_type">

                        @if(old('account_type', $user->account_type)==='standard')
                            <option value="standard" selected="selected">Standard</option>
                        @else
                            <option value="standard">Standard</option>
                        @endif
                        
                        @if(old('account_type', $user->account_type)==='admin')
                            <option value="admin" selected="selected">Admin</option>
                        @else
                            <option value="admin">Admin</option>
                        @endif
                        
                    </select>
                </div>

                <button type="submit" class="button marginL">Edit User</button>

            </form>

            <div class="returnLink">
                <a href="/users/list" class="pageLink">Back to User List</a>
            </div>
            
        </div>

    </main>

@stop