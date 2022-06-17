@extends ('layout.template')

@section('title', "Log Into MyArcade")

@section ('content')

    <main>
        
        <div class="content">

            <h1 class="pageHeading paddingM"> Log Into MyArcade</h1>

            <div class="flexContainer loginFlex">

                <form id="loginForm" method="post" action="/login" novalidation class="loginForm">
                    {{csrf_field()}}

                    <div class="formFlex flexContainerCol">

                            <div class="inputGroup">
                                <label class="loginLabel" for="username">Username: </label>
                                <input type="text" name="username" id="username" value="<?= old('username')?>"> 

                                @if($errors->first('username'))
                                    <br>
                                    <span class="errorText loginError">{{$errors->first('username')}}</span>
                                @endif

                            </div>

                            <div class="inputGroup">
                                <label class="loginLabel" for="password">Password: </label>
                                <input type="password" name="password" id="password">

                                @if($errors->first('password'))
                                    <br>
                                    <span class="errorText loginError">{{$errors->first('password')}}</span>
                                @endif
                            </div>

                            <div>
                                <div class="flexContainer inputButtonFlex">
                                    <div class="button marginL"><a href="/users/add">Create Account</a></div>

                                    <button class="button marginL" id="loginButton" type="submit">Log In</button>
                                </div>
                            </div>

                    </div>

                </form>

                
                {{-- <div class="imageBox">
                    <img id="loginImg"src="images/arcadeguy.png" alt="A vector of someone playing an arcade cabinet">
                </div> --}}

            </div>

        </div>

    </main>

@stop