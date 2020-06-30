<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Indie Hackers</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('popper/popper.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
<body style="background-color: #1f364d">
<nav class="navbar navbar-expand-lg" style="padding: 5px!important;box-shadow: 0 2px 4px -1px rgb(31,54,77);padding-top: 0.3rem!important;;padding-bottom: 0.3rem!important; background-color: #1f364d">
    <a class="navbar-brand ml-4" href="{{url('/')}}" ><img style="width: 50px; height: 50px; color: white" src="{{asset('landing-page-styles/images/logo.svg')}}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <h4 class="nav-link" onclick="window.location.href = `{{env('APP_URL')}}`" style="color: white!important;cursor: pointer">Indie Hackers</h4>
            </li>
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item">
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
{{--            <a class="btn-global"--}}
{{--               style="padding-top: 1px!important;padding-bottom: 1px!important; padding-right: 12px!important;padding-left: 12px!important;font-size: medium;"--}}
{{--               onclick="logout()">Logout</a>--}}
            @if(empty(\Illuminate\Support\Facades\Session::get('userId')))
            <button class="btn btn-modern" onclick="location.href = `{{env('APP_URL')}}/login`">
                LOGIN
            </button>
            <button class="btn btn-modern ml-2" onclick="location.href = `{{env('APP_URL')}}/signup`">
                SIGNUP
            </button>
            @else
            <div class="nav-item dropdown" style="padding-right: 20px!important;">
                <div class="dropleft">
                    <img src="{{asset('img/avatar.png')}}" class="top-avatar" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" onclick="window.location.href = `{{env('APP_URL')}}/profile`" href="#">Profile</a>
                        <a class="dropdown-item" href="#" onclick="logout()">Logout</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</nav>
<script>
    function logout() {
        $.ajax({
            url: `{{env('APP_URL')}}/logout`,
            type: 'POST',
            dataType: "JSON",
            data: {"_token": "{{ csrf_token() }}"},
            success: function (result) {
                if (result.status === true) {
                    window.location.href = `{{env('APP_URL')}}`
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'server error! Please try again.',
                    });
                }
            },
        });
    }
</script>
</nav>
</body>
</html>
