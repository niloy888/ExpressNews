<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Login</title>

    <!-- vendor css -->
    <link href="{{asset('/')}}reporter/assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('/')}}reporter/assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('/')}}reporter/assets/css/starlight.css">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><a href="{{route('/')}}">Express <span class="tx-info tx-normal">News</span></a></div>
        <div class="tx-center mg-b-60">

        </div>

        <h6 class="text-center text-danger">{{Session::get('message')}}</h6>



        <form action="{{route('reporter-login-process')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" name="reporter_email" class="form-control" placeholder="Enter your email">
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                {{--                <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>--}}
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="{{route('reporter-register')}}" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{asset('/')}}reporter/assets/lib/jquery/jquery.js"></script>
<script src="{{asset('/')}}reporter/assets/lib/popper.js/popper.js"></script>
<script src="{{asset('/')}}reporter/assets/lib/bootstrap/bootstrap.js"></script>

</body>
</html>
