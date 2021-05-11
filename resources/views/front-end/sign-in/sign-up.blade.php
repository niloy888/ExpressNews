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

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('/')}}admin/assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/assets/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/starlight.css">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><a href="{{route('/')}}">Express <span class="tx-info tx-normal">News</span></a></div>

        <div class="tx-center mg-b-60"></div>
        <form action="{{route('register-process')}}" method="post">
         @csrf

        <div class="form-group">
            <input required type="email" class="form-control" name="email" placeholder="Enter your email">
        </div><!-- form-group -->
        <div class="form-group">
            <input required type="password" name="password" class="form-control" placeholder="Enter your password">
        </div><!-- form-group -->
        <div class="form-group">
            <input required type="text" name="full_name" class="form-control" placeholder="Enter your full name">
        </div><!-- form-group -->
        <div class="form-group">
            <input required type="tel" name="mobile_no" class="form-control" placeholder="Enter your mobile number">
        </div>
        <!-- form-group -->
        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <input type="submit" class="btn btn-info btn-block" value="Sign Up">

        </form>

        <div class="mg-t-40 tx-center">Already have an account? <a href="{{route('user-login')}}" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{asset('/')}}admin/assets/lib/jquery/jquery.js"></script>
<script src="{{asset('/')}}admin/assets/lib/popper.js/popper.js"></script>
<script src="{{asset('/')}}admin/assets/lib/bootstrap/bootstrap.js"></script>
<script src="{{asset('/')}}admin/assets/lib/select2/js/select2.min.js"></script>
<script>
    $(function(){
        'use strict';

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>

</body>
</html>
