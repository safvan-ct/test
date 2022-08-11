@extends('layouts.app')

@section('title', 'About')

@section('content')
    <section class="page-title-area page-title-bg1">
        <div class="container">
            <div class="page-title-content">
                <center>
                    <h1 title="Blog Details" style="padding:30px">{{ $blog->title }}</h1>
                </center>
            </div>
        </div>
    </section>

    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{ asset('/storage/uploads/blog/' . $blog->image) }}" alt="image">
                        </div>
                        <div class="article-content">
                            <h3>{{ $blog->title }}</h3>
                            <p style="text-align:justify;color:white;">{!! $blog->description !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <aside class="widget-area">
                        <section class="widget widget_zelda_posts_thumb">
                            <h3 class="widget-title"> Recent Posts</h3>
                            @foreach ($blogs as $blog)
                                <article class="item">
                                    <a href="{{ route('new_detail', $blog->id) }}" class="thumb">
                                        <span class="fullimage cover"
                                            style="background-image: url('{{ asset('/storage/uploads/blog/' . $blog->image) }}');"
                                            role="img"></span>
                                    </a>
                                    <div class="info">
                                        <!--<span>June 10, 2020</span>-->
                                        <h4 class="title usmall">
                                            <a href="{{ route('new_detail', $blog->id) }}">{{ $blog->title }}</a>
                                        </h4>
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
@endsection
