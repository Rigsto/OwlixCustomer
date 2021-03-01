<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Owlix | Login</title>

    <link href="{{ asset('img/logo-only.svg') }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body style="background-color: #F7F7F7; background-image: url('{{ asset('img/LoginBackground.svg') }}'); background-repeat: no-repeat; background-size: contain; background-position-y: bottom; background-attachment: fixed;">
<div class="container py-sm-5">
    <div class="row justify-content-center text-center py-5">
        <div class="col-12 col-md-6 col-lg-4 py-sm-5 px-sm-5"  id="LoginForm">
            <div class="w-100 align-center">
                <img class="w-25"src="{{ asset('img/owlLogo.svg') }}" alt="">
                <h3 class="my-4">Login ke Owlix</h3>
            </div>
            @include('inc.alert')
            <form class="mb-3 mt-3" action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-group"><input class="form-control form-control-lg" type="text" placeholder="Email" name="email" required/></div>
                <div class="form-group"><input class="form-control form-control-lg" type="password" placeholder="Password" name="password" required/></div>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
            </form>
            <div class="small mt-6"><a class="weight-500 action-link font-primary" href="{{ route('auth.showRegister') }}"><span>or Register Here</span></a></div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@yield('scripts')
</body>
</html>
