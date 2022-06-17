@extends ('layout.template')

@section('title', "$user->username Details")

@section ('content')

<main>
    
    <div id="userContent">

        <h1 class="pageHeading paddingM">{{$user->username}} Details</h1>

        <p class="userData">
            <span class="dataLabel">Name: </span> 
            {{$user->first_name}} {{$user->last_name}}
        </p>

        {{-- <p class="userData">
            <span class="dataLabel">Username: </span> 
            {{$user->username}}
        </p> --}}

        <p class="userData">
            <span class="dataLabel">Email: </span> 
            {{$user->email}}
        </p>

        <p class="userData">
            <span class="dataLabel">Account Type: </span> 
            {{ucfirst($user->account_type)}}
        </p>

        <div class="userButtonBox">

            @if(Auth::check())
                <div class="flexContainer buttonFlex">

                    <a id="gamePageButton" href = "/users/edit/{{$user->id}}">
                        <div class="button editButton">
                            Edit
                        </div>
                    </a>

                    <a id="gamePageButton" href = "/users/deleteconfirm/{{$user->id}}">
                        <div class="button deleteButton">
                            Delete
                        </div>
                    </a>

                </div>
            @endif

        </div>

        <div class="returnLink">
            <a href="/users/list" class="pageLink ">Back to List</a>
        </div>

    </div>

</main>

@stop