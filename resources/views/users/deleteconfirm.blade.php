@extends ('layout.template')

@section('title', "Delete User")

@section ('content')

<main>

    <div class="deleteContent">

        <h2 class="pageHeading deleteUserHeading marginM">Delete {{$user->username}}?</h2>

        <img class="emojiBig marginM" id="deleteEmoji" src="../../images/Cryface.png" alt="Pixel Sad Face Emoji"/>
    
        <div class="flexContainer deleteGroups">
            <div class="deleteGroup">
                <a class="button deleteButton" href="/users/delete/{{$user->id}}">Delete</a>
            </div>

            <div class="deleteGroup">
                <a class="button cancelButton" href="/users/list">Cancel</a>
            </div>
    </div>

    </div>
    <script src="{{ url('/js/deleteUserFace.js') }}"></script>
</main>

@stop