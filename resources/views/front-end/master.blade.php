<!DOCTYPE html>
<html>
<head>
    <title>Express News a Entertainment Category Flat Bootstarp responsive Website Template | Home :: w3layouts</title>
    <link href="{{asset('/')}}front-end/assets/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('/')}}front-end/assets/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="{{asset('/')}}front-end/assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Express News Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{asset('/')}}front-end/assets/js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- web-fonts -->
    <link
    href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
    rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="{{asset('/')}}front-end/assets/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <script type="text/javascript" src="{{asset('/')}}front-end/assets/js/move-top.js"></script>
    <script type="text/javascript" src="{{asset('/')}}front-end/assets/js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
            });
        });
    </script>
</head>
<body>
    <!-- header-section-starts-here -->
    <div class="header">
        <div class="header-top">
            <div class="wrap">
                <div class="top-menu">
                    <ul>
                        <li><a href="{{route('/')}}">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="{{route('reporter-login')}}">Reporters</a></li>
                        @if(!Session::get('client_id'))
                        <li><a href="{{route('user-login')}}">User Login</a></li>
                        @else
                        <li><a href="{{route('user-dashboard')}}">Profile</a></li>
                        <li><a href="{{route('user-logout')}}">Logout</a></li>
                        @endif

                    </ul>
                </div>
                <div class="num">
                    <p> Call us : 032 2352 782</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="{{route('user-message-submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <textarea required="" name="message" class="form-control" rows="5"></textarea>
                <br/>
                <input type="file" name="image" >

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<!--             <button type="button" class="btn btn-primary">Save changes</button>
-->            <input class="btn btn-success" type="submit" name="" value="Submit">
</div>
</div>
</form>
</div>
</div>



<div class="header-bottom">
    <h3 class="text-center text-success"> {{Session::get('message')}} </h3> <br>

    <div class="logo text-center">

        <a href="{{route('/')}}"><img src="{{asset('/')}}front-end/assets/images/logo.jpg" alt=""/></a>
    </div>
    <div class="navigation">
        <nav class="navbar navbar-default" role="navigation">
            <div class="wrap">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!--/.navbar-header-->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!--                 <h3 class="text-center text-success"> {{Session::get('message')}} </h3>
-->
<ul class="nav navbar-nav">
    <li><a href="{{route('/')}}">Home</a></li>
    @foreach($newspapers as $newspaper)
    <li>
        {{--                                    <a href="{{route('posts',['id'=>$category->id])}}">{{$newspaper->name}}</a>--}}
        <a href="{{$newspaper->link}}" target="_blank">{{$newspaper->name}}</a>
    </li>
    @endforeach
    <div class="clearfix"></div>
</ul>
{{--<div class="search">
    <!-- start search-->
    <div class="search-box">
        <div id="sb-search" class="sb-search">
            <form>
                <input class="sb-search-input" placeholder="Enter your search term..."
                type="search" name="search" id="search">
                <input class="sb-search-submit" type="submit" value="">
                <span class="sb-icon-search"> </span>
            </form>
        </div>
    </div>
    <!-- search-scripts -->
    <script src="{{asset('/')}}front-end/assets/js/classie.js"></script>
    <script src="{{asset('/')}}front-end/assets/js/uisearch.js"></script>
    <script>
        new UISearch(document.getElementById('sb-search'));
    </script>
    <!-- //search-scripts -->
</div>--}}
<div class="clearfix"></div>
</div>
</div>
<!--/.navbar-collapse-->
<!--/.navbar-->
</nav>
</div>
</nav>
</div>
</div>
<!-- header-section-ends-here -->
<div class="wrap">
    <div class="move-text">
        <div class="breaking_news">
            <h2>Breaking News</h2>
        </div>


        <div class="marquee scrollamount=10">
            @foreach($breakingNews as $news)
            <div class="marquee1"><a class="breaking"
             href="{{route('single-article',['id'=>$news->id])}}">>>{{$news->post_title}}</a>
         </div>
         @endforeach
         {{--<div class="marquee2"><a class="breaking" href="single.html">>>At vero eos et accusamus et iusto qui
         blanditiis praesentium voluptatum deleniti atque..</a></div>--}}
         <div class="clearfix"></div>

     </div>
     <div class="clearfix"></div>


     <script type="text/javascript" src="{{asset('/')}}front-end/assets/js/jquery.marquee.min.js"></script>
     <script>
        $('.marquee').marquee({pauseOnHover: true});
            //@ sourceURL=pen.js
        </script>
    </div>
</div>
<!-- content-section-starts-here -->
@yield('body')
<!-- content-section-ends-here -->
<!-- footer-section-starts-here -->
<div class="footer">
    <div class="footer-top">
        <div class="wrap">
            <div class="col-md-3 col-xs-6 col-sm-4 footer-grid">
                <h4 class="footer-head">About Us</h4>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout.</p>
                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                opposed to using 'Content here.</p>
            </div>
            <div class="col-md-2 col-xs-6 col-sm-2 footer-grid">
                <h4 class="footer-head">Categories</h4>
                <ul class="cat">
                    @foreach($categories as $category)
                    <li><a href="{{route('category-post',['id'=>$category->id])}}">{{$category->category_name}}</a>
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
                <h4 class="footer-head">Flickr Feed</h4>
                <ul class="flickr">
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/bus4.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/bus2.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/bus3.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/tec4.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/tec2.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/tec3.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/bus2.jpg"></a></li>
                    <li><a href="#"><img src="{{asset('/')}}front-end/assets/images/bus3.jpg"></a></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <div class="col-md-3 col-xs-12 footer-grid">
                <h4 class="footer-head">Contact Us</h4>
                <span class="hq">Our headquaters</span>
                <address>
                    <ul class="location">
                        <li><span class="glyphicon glyphicon-map-marker"></span></li>
                        <li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
                        <div class="clearfix"></div>
                    </ul>
                    <ul class="location">
                        <li><span class="glyphicon glyphicon-earphone"></span></li>
                        <li>+0 561 111 235</li>
                        <div class="clearfix"></div>
                    </ul>
                    <ul class="location">
                        <li><span class="glyphicon glyphicon-envelope"></span></li>
                        <li><a href="mailto:info@example.com">mail@example.com</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </address>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap">
            <div class="copyrights col-md-6">
                <p> © 2021 Express News. All Rights Reserved
                </p>
            </div>
            <div class="footer-social-icons col-md-6">
                <ul>
                    <li><a class="facebook" href="#"></a></li>
                    <li><a class="twitter" href="#"></a></li>
                    <li><a class="flickr" href="#"></a></li>
                    <li><a class="googleplus" href="#"></a></li>
                    <li><a class="dribbble" href="#"></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- footer-section-ends-here -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
        wrapID: 'toTop', // fading element id
        wrapHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
        };
        */
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
</body>
</html>
