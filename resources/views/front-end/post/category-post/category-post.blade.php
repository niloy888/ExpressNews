@extends('front-end.master')

@section('body')
<div class="main-body">
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Sports</li>
        </ol>
        <div class="col-md-12 content-left">
            <div class="articles sports">
                <header>
                    <h3 class="title-head">{{$category->category_name}}</h3>
                </header>

                @foreach($posts as $post)
                <div class="article">
                    <div class="article-left">
                        <a href="{{route('single-article',['id'=>$post->id])}}"><img src="{{asset($post->image)}}" height="250"></a>
                    </div>
                    <div class="article-right">
                        <div class="article-title">
                            <p>On {{$post->updated_at}}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>104 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
                            <a class="title" href="{{route('single-article',['id'=>$post->id])}}"> {{$post->post_title}}</a>
                        </div>
                        <div class="article-text">
                            <p>{{$post->post_short_description}}...</p>
                            <a href="{{route('single-article',['id'=>$post->id])}}"><img src="images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endforeach

            </div>

            {{--<div class="sports-top">
                --}}{{--<div class="s-grid-left">
                    <div class="cricket">
                        <header>
                            <h3 class="title-head">Cricket</h3>
                        </header>

                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="single.html"><img src="images/crt2.jpg" alt="" /></a>
                            </div>
                            <div class="sc-text">
                                <h6>cricket</h6>
                                <a class="power" href="single.html">international Cricket Council President Walks out</a>
                                <p class="date">On Apr 11, 2015</p>
                                <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="single.html"><img src="images/crt3.jpg" alt="" /></a>
                            </div>
                            <div class="sc-text">
                                <h6>cricket</h6>
                                <a class="power" href="single.html">international Cricket World Cup Final After Trophy Snub</a>
                                <p class="date">On Apr 05, 2015</p>
                                <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        @foreach($categories as $category)
                            @foreach($category->posts as $post)
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="single.html"><img src="{{asset($post->image)}}" alt="" /></a>
                            </div>
                            <div class="sc-text">
                                <h6>cricket</h6>
                                <a class="power" href="single.html">{{$post->post_title}}</a>
                                <p class="date">On Apr 05, 2015</p>
                                <a class="reu" href="single.html"><img src="images/more.png" alt="" /></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                                @endforeach
                        @endforeach
                    </div>
                </div>--}}{{--

                @foreach($categories as $category)
                <div class="s-grid">
                    <div class="cricket">
                        <header>
                            <h3 class="title-head">{{$category->category_name}}</h3>
                        </header>

                        @foreach($category->posts as $post)
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="{{route('single-article',['id'=>$post->id])}}"><img src="{{asset($post->image)}}" alt="" /></a>
                            </div>
                            <div class="sc-text">
                                <a class="power" href="{{route('single-article',['id'=>$post->id])}}">{{$post->post_title}}</a>
                                <p class="date">On {{$post->updated_at}}</p>
                                <a class="reu" href="{{route('single-article',['id'=>$post->id])}}"><img src="images/more.png" alt="" /></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>--}}

            <div class="photos">
                <header>
                    <h3 class="title-head">Photos</h3>
                </header>
                <div class="course_demo1">
                    <ul id="flexiselDemo">

                        @foreach($photoPosts as $photoPost)
                        <li>
                            <a href="{{route('single-article',['id'=>$photoPost->id])}}"><img src="{{asset($photoPost->image)}}" alt="" height="200"/></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <link rel="stylesheet" href="{{asset('/')}}front-end/assets/css/flexslider.css" type="text/css" media="screen" />
                <script type="text/javascript">
                    $(window).load(function() {
                        $("#flexiselDemo").flexisel({
                            visibleItems: 4,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint:480,
                                    visibleItems: 2
                                },
                                landscape: {
                                    changePoint:640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });

                    });
                </script>
                <script type="text/javascript" src="{{asset('/')}}front-end/assets/js/jquery.flexisel.js"></script>
            </div>

        </div>

        {{--<div class="col-md-4 side-bar">
            <div class="first_half">
                <div class="newsletter">
                    <h1 class="side-title-head">Newsletter</h1>
                    <p class="sign">Sign up to receive our free newsletters!</p>
                    <form>
                        <input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
                        <input type="submit" value="submit">
                    </form>
                </div>
                <div class="list_vertical">
                    <section class="accordation_menu">
                        <div>
                            <input id="label-1" name="lida" type="radio" checked/>
                            <label for="label-1" id="item1"><i class="ferme"> </i>Popular Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                            <div class="content" id="a1">
                                <div class="scrollbar" id="style-2">
                                    <div class="force-overflow">
                                        <div class="popular-post-grids">

                                            @foreach($popularArticles as $popularArticle)
                                                <div class="popular-post-grid">
                                                    <div class="post-img">
                                                        <a href="{{route('single-article',['id'=>$popularArticle->id])}}"><img src="{{asset($popularArticle->image)}}" height="50" alt="" /></a>
                                                    </div>
                                                    <div class="post-text">
                                                        <a class="pp-title" href="{{route('single-article',['id'=>$popularArticle->id])}}"> {{$popularArticle->post_title}}</a>
                                                        <p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input id="label-2" name="lida" type="radio"/>
                            <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Recent Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                            <div class="content" id="a2">
                                <div class="scrollbar" id="style-2">
                                    <div class="force-overflow">
                                        <div class="popular-post-grids">
                                            @foreach($recentPosts as $recentPost)
                                                <div class="popular-post-grid">
                                                    <div class="post-img">
                                                        <a href="{{route('single-article',['id'=>$recentPost->id])}}"><img src="{{asset($recentPost->image)}}" alt="" /></a>
                                                    </div>
                                                    <div class="post-text">
                                                        <a class="pp-title" href="{{route('single-article',['id'=>$recentPost->id])}}"> {{$recentPost->post_title}}</a>
                                                        <p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>

            </div>
            <div class="secound_half">
                --}}{{--<div class="tags">
                    <header>
                        <h3 class="title-head">Tags</h3>
                    </header>
                    <p>
                        <a class="tag1" href="single.html">At vero eos</a>
                        <a class="tag2" href="single.html">doloremque</a>
                        <a class="tag3" href="single.html">On the other</a>
                        <a class="tag4" href="single.html">pain was</a>
                        <a class="tag5" href="single.html">rationally encounter</a>
                        <a class="tag6" href="single.html">praesentium voluptatum</a>
                        <a class="tag7" href="single.html">est, omnis</a>
                        <a class="tag8" href="single.html">who are so beguiled</a>
                        <a class="tag9" href="single.html">when nothing</a>
                        <a class="tag10" href="single.html">owing to the</a>
                        <a class="tag11" href="single.html">pains to avoid</a>
                        <a class="tag12" href="single.html">tempora incidunt</a>
                        <a class="tag13" href="single.html">pursues or desires</a>
                        <a class="tag14" href="single.html">Bonorum et</a>
                        <a class="tag15" href="single.html">written by Cicero</a>
                        <a class="tag16" href="single.html">Ipsum passage</a>
                        <a class="tag17" href="single.html">exercitationem ullam</a>
                        <a class="tag18" href="single.html">mistaken idea</a>
                        <a class="tag19" href="single.html">ducimus qui</a>
                        <a class="tag20" href="single.html">holds in these</a>
                    </p>
                </div>--}}{{--

            </div>
            <div class="clearfix"></div>
        </div>--}}


        <div class="clearfix"></div>
    </div>
</div>
@endsection
