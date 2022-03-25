<!DOCTYPE html>
<html lang="en">

    @include('panel.header')

    <body class="sidebar-mini layout-fixed sidebar-collapse">
    @php
          $userlogin = App\Models\User::Where('id', Auth::id())->first();
          @endphp
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
            </div>

            @include('panel.navbar')
            @include('panel.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            

            <!-- Main content -->
            @yield('content')

            <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->
            @include('panel.footer')
             <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                </aside>
        </div>

        <!-- jQuery -->
        @include('panel.script') 
    </body>
</html>   


