<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owlix | Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
            <form class="mb-3 mt-5" action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-group"><input class="form-control form-control-lg" type="text" placeholder="Email" name="email"/></div>
                <div class="form-group"><input class="form-control form-control-lg" type="password" placeholder="Password" name="password"/></div>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
            </form>
            <div class="small mt-6"><a class="weight-500 action-link" href=""><span>or Sign In with Facebook</span></a></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
