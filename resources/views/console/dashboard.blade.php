@extends ('layout.template')

@section('title', "Dashboard")

@section ('content')

    <main>

        <div id="dashboardContent">

            <h1 class="pageHeading paddingM">Admin Dashboard</h1>

            <ul id="dashboardList" class="flexContainer">
                <li class="button adminButton"><a href="/users/list">Manage Users</a></li>
                <li class="button adminButton"><a href="/games/list">Manage Games</a></li>
                <li class="button adminButton"><a href="/arcades/list">Manage Arcades</a></li>
            </ul>

        </div>

    </main>

@stop