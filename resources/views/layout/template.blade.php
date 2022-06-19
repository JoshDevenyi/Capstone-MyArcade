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
    <script src="{{ url('/js/MenuOnOff.js') }}"></script> 
    <script src="{{ url('/js/template.js') }}"></script>
    
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

                    <div class="menuIcon">
                        <span id="headerIcon" class="iconify" data-icon="heroicons-outline:menu"></span>
                    </div>

                </div>

            </div>

        </header>

        <div id="siteMenuBelowHeader">

            <div>


                @if(Auth::check())

                    <a href="/users/user/{{auth()->user()->id}}">
                        <p class="belowHeaderLink">{{auth()->user()->username}}</p>
                    </a>

                    <a href="/arcades/arcade/{{auth()->user()->id}}"">
                        <p class="belowHeaderLink" >YourArcade</p>
                    </a>

                    <a href="/games/list">
                        <p class="belowHeaderLink">All Games</p>
                    </a>

                    @if(auth()->user()->account_type === "admin")
                        <a  href="/dashboard">
                            <p class="belowHeaderLink">Admin Dashboard</p>
                        </a>
                    @endif

                    <a href="/logout/"><p class="belowHeaderLink belowHeaderLinkBottom">Log Out</p></a>

                @else

                    <a href="/games/list">
                        <p class="belowHeaderLink">All Games</p>
                    </a>

                    <a href="/login/">
                        <p class="belowHeaderLink belowHeaderLinkBottom">Log In</p>
                    </a>

                @endif
                
                </div>

        </div>



    @yield ('content')
    

    <footer>
        <p>©Josh Devenyi, 2022</p>
    </footer>


</body>

</html>