<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyArcade - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/styles.css') }}">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/b536528e9f.js" crossorigin="anonymous"></script>
    {{-- <script src="{{ url('/js/indexJS.js') }}"></script> --}}

</head>

<body id="myArcade">

        <header>
            <div class="flexContainer" id="headerContent">
                <a href="/">
                    <div id="siteLogo"> 
                        <div class="flexContainer" id="logoFlex">
                            <div id="logoText">
                                <h2 >MyArcade</h2>
                                <p>Your Video Game Record Keeper</p>
                            </div>
                            <div class="joystickHop">
                                <i class="iconify" id="logoIcon" data-icon="fluent:joystick-20-filled"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <div id="siteMenu">

                    <ul id="headerLinks" class="flexContainer">


                        @if(Auth::check())

                            <li class="headerLink">
                                <a href="/users/user/{{auth()->user()->id}}">{{auth()->user()->username}}</a>
                            </li>

                            <li class="headerLink">
                                <a href="/arcades/arcade/{{auth()->user()->id}}">YourArcade</a>
                            </li>

                            <li class="headerLink">
                                <a href="/games/list">All Games</a>
                            </li>

                            @if(auth()->user()->account_type === "admin")
                                <li class="headerLink">
                                    <a href="/dashboard">Admin Dashboard</a>
                                </li>
                            @endif

                            <li class="headerLink">
                                <a href="/logout/">Log Out</a>
                            </li>

                        @else

                            <li class="headerLink">
                                <a href="/games/list">All Games</a>
                            </li>

                            <li class="headerLink">
                                <a href="/login/">Log In</a>
                            </li>

                        @endif
                        
                    </ul>
                </div>

            </div>
        </header>


    @yield ('content')
    

    <footer class="w3-padding">
        <p>©Josh Devenyi, 2022</p>
    </footer>


</body>

</html>