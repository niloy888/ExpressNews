@extends('front-end.master')

@section('body')
    <div class="main-body">
        <div class="wrap">
            <div class="col-md-8 content-left">
                <div class="slider">
                    <div class="callbacks_wrap">
                        <ul class="rslides" id="slider">

                            @foreach($breakingArticles as $breakingArticle)
                            <li>
                                <a href="{{route('single-article',['id'=>$breakingArticle->id])}}"><img src="{{asset($breakingArticle->image)}}"  alt="" style="display:block; margin-left: 30%; height:300px ; width:300px; "></a>
                                <div class="caption text-center" style="margin-left: 15%">
                                    <a href="{{route('single-article',['id'=>$breakingArticle->id])}}">{{$breakingArticle->post_title}}</a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="articles">
                    <header>
                        <h3 class="title-head">All around the world</h3>
                    </header>

                    @foreach($posts as $post)
                    <div class="article">
                        <div class="article-left">
                            <a href="{{route('single-article',['id'=>$post->id])}}"><img src="{{asset($post->image)}}" height="200" width="50"></a>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>On {{$post->updated_at}} <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>104 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
                                <a class="title" href="{{route('single-article',['id'=>$post->id])}}">{{$post->post_title}}</a>
                            </div>
                            <div class="article-text">
                                <p>{{$post->post_short_description}}...</p>
                                <a href="{{route('single-article',['id'=>$post->id])}}"><img src="{{asset('/')}}front-end/assets/images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach


                </div>

                {{--@foreach($categories as $category)
                <div class="life-style">

                    <header>
                        <h3 class="title-head">{{$category->category_name}}</h3>
                    </header>


                    <div class="life-style-grids">

                        @foreach($category->posts as $post)
                        <div class="life-style">
                            <a href="{{route('single-article',['id'=>$post->id])}}"><img src="{{asset($post->image)}}" alt="" width="300" /></a>
                            <br>
                            <br>
                            <a class="title" href="{{route('single-article',['id'=>$post->id])}}">{{$post->post_title}}</a>
                        </div>
                            <br>
                            <br>
                            <hr>
                        @endforeach

                        <div class="clearfix"></div>
                    </div>

                </div>
                    <br>
                    <br>
                @endforeach--}}


                {{--<div class="sports-top">
                    @foreach($categories as $category)
                        <div class="s-grid">
                            <div class="cricket">
                                <header>
                                    <h3 class="title-head">{{$category->category_name}}</h3>
                                </header>

                                @foreach($category->posts as $post)
                                    @if($post->publication_status == 1)
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

                                        break;

                                    @endif
                                @endforeach


                            </div>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>--}}



            </div>
            <div class="col-md-4 side-bar">
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


                    {{--<div class="side-bar-articles">

                        @foreach($randomPosts as $randomPost)
                        <div class="side-bar-article">
                            <a href="{{route('single-article',['id'=>$randomPost->id])}}"><img src="{{asset($randomPost->image)}}" height="150" width="100" alt="" /></a>
                            <div class="side-bar-article-title">
                                <a href="{{route('single-article',['id'=>$randomPost->id])}}">{{$randomPost->post_title}}</a>
                            </div>
                        </div>
                        @endforeach

                    </div>--}}
                </div>
                <br>
                <br>
                <div class="secound_half">

                    {{--<div class="popular-news">
                        <header>
                            <h3 class="title-popular">popular News</h3>
                        </header>
                        <div class="popular-grids">

                            @foreach($popularArticles as $popularArticle)
                            <div class="popular-grid">
                                <a href="{{route('single-article',['id'=>$popularArticle->id])}}"><img src="{{asset($popularArticle->image)}}" width="100" height="150" alt="" /></a>
                                <a class="title" href="{{route('single-article',['id'=>$popularArticle->id])}}">{{$popularArticle->post_title}}</a>
                                <p>On {{$popularArticle->updated_at}}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
                            </div>
                            @endforeach

                        </div>
                    </div>--}}

                    {{--<div class="popular-news">
                        <header>
                            <h3 class="title-popular">Latest News</h3>
                        </header>
                        <div class="popular-grids">

                            @foreach($popularArticles as $popularArticle)
                                <div class="popular-grid">
                                    <a href="{{route('single-article',['id'=>$popularArticle->id])}}"><img src="{{asset($popularArticle->image)}}" width="100" height="150" alt="" /></a>
                                    <a class="title" href="{{route('single-article',['id'=>$popularArticle->id])}}">{{$popularArticle->post_title}}</a>
                                    <p>On {{$popularArticle->updated_at}}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
                                </div>
                            @endforeach

                        </div>
                    </div>--}}

                    @foreach($categories as $category)
                        @if(count($category->posts)!=0)
                    <div class="popular-news">
                        <header>

                            <h3 class="title-popular"><a href="{{route('category-post',['id'=>$category->id])}}">{{$category->category_name}}</a></h3>
                        </header>
                        <div class="popular-grids">

                            @foreach($category->posts as $post)
                                @if($post->publication_status == 1)
                                <div class="popular-grid">
                                    <a href="{{route('single-article',['id'=>$post->id])}}"><img src="{{asset($post->image)}}" width="100" height="150" alt="" /></a>
                                    <a class="title" href="{{route('single-article',['id'=>$post->id])}}">{{$post->post_title}}</a>
                                    <p>On {{$post->updated_at}}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
                                </div>
                                    <?php

                                    break;

                                    ?>
                                @endif
                            @endforeach

                        </div>
                    </div>
                        @endif
                        @endforeach

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>


    </div>
@endsection
