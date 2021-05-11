@extends('front-end.master')

@section('body')

    <div class="main-body">
        <div class="wrap">
            <ol class="breadcrumb">
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">Article</li>
            </ol>
            <div class="single-page">
                <div class="col-md-2 share_grid">
                    <h3>SHARE</h3>
                    <ul>
                        <li>
                            <a href="#">
                                <i class="facebook"></i>
                                <div class="views">
                                    <span>SHARE</span>
                                    <label>180</label>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="twitter"></i>
                                <div class="views">
                                    <span>TWEET</span>
                                    <label>355</label>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="linkedin"></i>
                                <div class="views">
                                    <span>SHARES</span>
                                    <label>28</label>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="pinterest"></i>
                                <div class="views">
                                    <span>PIN</span>
                                    <label>16</label>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="email"></i>
                                <div class="views">
                                    <span>Email</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 content-left single-post">
                    <div class="blog-posts">
                        <h3 class="post">{{$post->post_title}}</h3>
                        <div class="last-article">

                            <p class="artext">{!! $post->post_long_description !!}</p>
                            {{--<h3>Donald Trump News - Donald Trump Special Reports</h3>--}}
                            <br>
                            <br>
                            <a href="{{$post->video}}"><iframe src="https://www.youtube.com/embed/mbDg4OG7z4Y" frameborder="0" allowfullscreen=""></iframe></a>


                            <ul class="categories">
                                @foreach($categories as $category)
                                <li><a href="{{route('category-post',['id'=>$category->id])}}">{{$category->category_name}}</a></li>
                                @endforeach

                            </ul>
                            <div class="clearfix"></div>


                            <div class="response">
                                <h3>Responses</h3>

                                @if($comments->isEmpty())
                                    <h5>No comments found</h5>
                                @endif

                                @foreach($comments as $comment)



                                    <div class="media response-info">
                                        <div class="media-left response-text-left">
                                            <a href="#">
                                                <img class="media-object" src="{{asset('/')}}front-end/assets/images/icon1.png" alt=""/>
                                            </a>
                                            <h5><a href="#">{{$comment->full_name}}</a></h5>
                                        </div>
                                        <div class="media-body response-text-right">
                                            <p>{{$comment->comment}}</p>
                                            <ul>
                                                <li>{{$comment->created_at}}</li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                @endforeach


                            </div>
                            <div class="coment-form">
                                <h4>Leave your comment</h4>
                                <form action="{{route('comment-submit')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="hidden" name="client_id" value="{{Session::get('client_id')}}">
                                    <textarea required name="comment" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}"></textarea>
                                    @if(Session::get('client_id'))
                                        <input type="submit" value="Submit Comment" >
                                    @else
                                        <p class="text-danger"><a class="text-danger" href="{{route('user-login')}}">Login into your account to write comment</a></p>
                                    @endif
                                </form>
                            </div>


                            <!--related-posts-->
                            <div class="row related-posts">
                                <h4>Articles You May Like</h4>
                                @foreach($otherArticles as $article)
                                <div class="col-xs-6 col-md-3 related-grids">
                                    <a href="{{route('single-article',['id'=>$article->id])}}" class="thumbnail">
                                        <img src="{{asset($article->image)}}" alt=""/>
                                    </a>
                                    <h5><a href="{{route('single-article',['id'=>$article->id])}}">{{$article->post_title}}</a></h5>
                                </div>
                                    @endforeach

                            </div>
                            <!--//related-posts-->




                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                {{--<div class="col-md-4 side-bar">
                    <div class="first_half">
                        <div class="categories">
                            <header>
                                <h3 class="side-title-head">Categories</h3>
                            </header>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{route('category-post',['id'=>$category->id])}}">{{$category->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
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
                                                                <a href="single.html"><img src="{{asset($popularArticle->image)}}" height="50" alt="" /></a>
                                                            </div>
                                                            <div class="post-text">
                                                                <a class="pp-title" href="single.html"> {{$popularArticle->post_title}}</a>
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
                                                                <a href="single.html"><img src="{{asset($recentPost->image)}}" alt="" /></a>
                                                            </div>
                                                            <div class="post-text">
                                                                <a class="pp-title" href="single.html"> {{$recentPost->post_title}}</a>
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
                        <div class="side-bar-articles">

                            @foreach($randomPosts as $randomPost)
                                <div class="side-bar-article">
                                    <a href="{{route('single-article',['id'=>$randomPost->id])}}"><img src="{{asset($randomPost->image)}}" height="150" width="100" alt="" /></a>
                                    <div class="side-bar-article-title">
                                        <a href="{{route('single-article',['id'=>$randomPost->id])}}">{{$randomPost->post_title}}</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                    </div>
                    <div class="secound_half">
                        <div class="tags">
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
                        </div>
                        <div class="popular-news">
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
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
