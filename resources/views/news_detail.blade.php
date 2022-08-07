@extends('layouts.app')

@section('title', 'About')

@section('content')

@foreach ($newss as $news)

@endforeach


  <!--<div class="ps-page--blog">-->
  <!--      <div class="container">-->
  <!--          <div class="ps-blog--sidebar">-->
  <!--              <div class="ps-blog__left">-->
                    <!--<div class="embed-responsive embed-responsive-16by9 mb-90">-->
                    <!--    <iframe scrolling="no" frameborder="no" src="https://player.vimeo.com/video/10920432?dnt=1&amp;app_id=122963" id="fitvid0"></iframe>-->
                    <!--</div>-->
  <!--                  <div class="ps-post--detail sidebar">-->
  <!--                      <div class="ps-post__header">-->
  <!--                          <h1>{{$news->title}}</h1>-->
  <!--                        </div>-->
  <!--                      <div class="ps-post__content">-->
  <!--                          {!! $news->description !!}-->
  <!--                       </div>-->
                         
  <!--                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><img class="mb-30" src="{{ asset('/storage/' . $news->image) }}" alt="{{ $news->alt }}">-->
  <!--                              </div>-->
                        
  <!--                  </div>-->
  <!--              </div>-->
                <!--<div class="ps-blog__right">-->
                <!--    <aside class="widget widget--blog widget--search">-->
                <!--        <form class="ps-form--widget-search" action="http://nouthemes.net/html/martfury/do_action" method="get">-->
                <!--            <input class="form-control" type="text" placeholder="Search...">-->
                <!--            <button><i class="icon-magnifier"></i></button>-->
                <!--        </form>-->
                <!--    </aside>-->
                <!--    <aside class="widget widget--blog widget--categories">-->
                <!--        <h3 class="widget__title">Categories</h3>-->
                <!--        <div class="widget__content">-->
                <!--            <ul>-->
                <!--                <li><a href="blog-grid.html">Business</a></li>-->
                <!--                <li><a href="blog-grid.html">Entertaiment</a></li>-->
                <!--                <li><a href="blog-grid.html">Fashion</a></li>-->
                <!--                <li><a href="blog-grid.html">Life style</a></li>-->
                <!--                <li><a href="blog-grid.html">Others</a></li>-->
                <!--                <li><a href="blog-grid.html">Technology</a></li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--    </aside>-->
                <!--    <aside class="widget widget--blog widget--recent-post">-->
                <!--        <h3 class="widget__title">Recent Posts</h3>-->
                <!--        <div class="widget__content"><a href="blog-detail.html">Harman Kadon Onyx Studio Mini, Reviews & Experiences</a><a href="blog-detail.html">Experience Great Sound With Beats’s Headphone</a><a href="blog-detail.html">Products Necessery For Mom</a><a href="blog-detail.html">Home Interior: Modern Style 2017</a><a href="blog-detail.html">DeerCo – A New Look About Startup In Product Manufacture Field</a></div>-->
                <!--    </aside>-->
                <!--    <aside class="widget widget--blog widget--recent-comments">-->
                <!--        <h3 class="widget__title">Recent Comments</h3>-->
                <!--        <div class="widget__content">-->
                <!--            <p><a class="author" href="#">drfurion</a> on<a href="#"> Dashboard</a></p>-->
                <!--            <p><a class="author" href="#">logan</a> on<a href="#"> Rayban Rounded Sunglass Brown Color</a></p>-->
                <!--            <p><a class="author" href="#">logan</a> on<a href="#"> Sound Intone I65 Earphone White Version</a></p>-->
                <!--            <p><a class="author" href="#">logan</a> on<a href="#"> Sleeve Linen Blend Caro Pane Shirt</a></p>-->
                <!--        </div>-->
                <!--    </aside>-->
                <!--    <aside class="widget widget--blog widget--tags">-->
                <!--        <h3 class="widget__title">Popular Tags</h3>-->
                <!--        <div class="widget__content"><a href="#">Business</a><a href="#">Clothing</a><a href="#">Design</a><a href="#">Entertaiment</a><a href="#">Fashion</a><a href="#">Internet</a><a href="#">Life Style</a><a href="#">Marketing</a><a href="#">Music</a></div>-->
                <!--    </aside>-->
                <!--</div>-->
  <!--          </div>-->
  <!--      </div>-->
  <!--  </div>-->
   
        <!-- Start Page Title Area -->
        <section class="page-title-area page-title-bg1">
            <div class="container">
                <div class="page-title-content">
                    <center><h1 title="Blog Details" style="padding:30px">{{$news->title}}</h1></center>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Blog Details Area -->



        <section class="blog-details-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog-details-desc">

                            <div class="article-image">
                                <img src="{{ asset('/storage/' . $news->image) }}" alt="image">
                            </div>

                            <div class="article-content">


                                <h3>{{$news->title}}</h3>

                                <p style="text-align:justify;color:white;">{!!$news->description!!}</p>

                             </div>





                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <aside class="widget-area">


                            <section class="widget widget_zelda_posts_thumb">
                                <h3 class="widget-title"> Recent Posts</h3>
                                @foreach ($items as $item)

                                <article class="item">
                                    <a href="{{ route('new_detail',$item->id) }}" class="thumb">
                                        <span class="fullimage cover " style="background-image: url('{{ asset('/storage/' . $item->image) }}');" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <!--<span>June 10, 2020</span>-->
                                        <h4 class="title usmall"><a href="{{ route('new_detail',$item->id) }}">{{ $item->title}}</a></h4>
                                    </div>

                                    <div class="clear"></div>
                                </article>

                                @endforeach

                            </section>


                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Details Area -->
@endsection
