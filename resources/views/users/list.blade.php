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
                                Type
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
                            <td id="userIDCell" class="userTextEntry">
                                <div class="userCellData">
                                    {{$value->id}}
                                </div>
                            </td>

                            <td id="userNameCell"class="userNameEntry">
                                <div class="userCellData">
                                    <a href="/users/user/{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</a>
                                </div>
                            </td>
                            
                            <td id="userUsernameCell" class="userTextEntry">
                                <div class="userCellData">
                                    {{$value->username}}
                                </div>
                            </td>
                            
                            <td id="userEmailCell" class="userEmailEntry">
                                <div class="userCellData">
                                    {{$value->email}}
                                </div>
                            </td>
                            
                            <td class="userTextEntry" id="userTypeCell">
                                <div class="userCellData">
                                    {{$value->account_type}}
                                </div>
                            </td>

                            <td class="userButtons">
                                <div class="userCellData">
                                    <a href="/users/edit/{{$value->id}}">
                                        <div class="arcadeButton arcadeEdit wideButtonUser">Edit</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonUser"><span class="iconify buttonIcon" data-icon="clarity:edit-solid"></span></div>
                                    </a>
        
                                    <a href="/users/deleteconfirm/{{$value->id}}">
                                        <div class="arcadeButton wideButtonUser">Delete</div>
                                        <div class="udButton udButtonIcon udButtonEdit narrowButtonUser"><span class="iconify buttonIcon" data-icon="ep:delete-filled"></span></div>
                                    </a>
                                </div>
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