@extends ('layout.template')

@section('title', "Manage Users")

@section ('content')

        <main>

            <div class="content">

                <h1 class="pageHeading paddingM">Manage Users</h1>

                @if(session()->has('message'))

                    <div class="messageBox">
                        <div class="message">
                            {{session()->get('message')}}
                        </div>
                    </div>
    
                 @endif
    

                <table id="usersTable" cellspacing="0">

                    <tr>
                        <th>
                            <a class="listSortLink" href="/users/list">
                                ID
                            </a>
                        </th>
                        <th>
                            <a class="listSortLink" href="/users/list/name">
                                Name
                            </a>
                        </th>
                        <th>
                            <a class="listSortLink" href="/users/list/username">
                                Username
                            </a>
                        </th>
                        <th>
                            <a class="listSortLink" href="/users/list/email">
                                Email Address
                            </a>
                        </th>
                        <th>
                            <a class="listSortLink" href="/users/list/type">
                                Account Type
                            </a>
                        </th>
                        <th></th>
                    </tr>

                    @foreach($users as $key => $value)
                        @if($loop->index == $loop->count-1)
                        <tr class="lastUserEntry">
                        @else
                        <tr class="userEntry">
                        @endif
                            <td class="userTextEntry">{{$value->id}}</td> 
                            <td class="userNameEntry">
                                <a href="/users/user/{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</a>
                            </td>
                            <td class="userTextEntry">{{$value->username}}</td>
                            <td class="userEmailEntry">{{$value->email}}</td>
                            <td class="userTextEntry">{{$value->account_type}}</td>

                            <td class="userButtons">
                                <a href="/users/edit/{{$value->id}}">
                                    <div class="arcadeButton arcadeEdit">Edit</div>
                                </a>
    
                                <a href="/users/deleteconfirm/{{$value->id}}">
                                    <div class="arcadeButton">Delete</div>
                                </a>
                            </td>

                        </tr>
                    @endforeach

                </table>
                
                <a href = "/users/add" class="w3-button w3-green">
                    <div class="button marginM">
                        Add User
                    </div>
                </a>

            </div>

        </main>

    @stop