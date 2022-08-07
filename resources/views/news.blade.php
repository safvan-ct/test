@extends('layouts.app')

@section('title', 'Blog')

@section('content')

  <div class="ps-blog" style="padding-left: 15px;padding-right: 15px;padding-top: 20px;">
                <div class="ps-blog__header">
                <h4 style="text-align: center;font-size: 27px;">OUR ARTICLE</h4>
                </div>
                <div class="ps-blog__content">
                    <div class="row">
            @foreach ($newss as $news)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ route('new_detail',$news->id) }}"></a><img src="{{ asset('/storage/' . $news->image) }}" alt="{{$news->alt}}">
                                    {{-- <div class="ps-post__badge"><i class="icon-volume-high"></i></div> --}}
                                </div>
                                <div class="ps-post__content">
                                    <!--<div class="ps-post__meta"><a href="#">Entertaiment</a><a href="#">Technology</a>-->
                                    </div><a class="ps-post__title" href="{{ route('new_detail',$news->id) }}">{{$news->title}}</a>
                                    <p>{{ date('y- M d', strtotime($news->updated_at)) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>


 <!-- Start Page Title Area -->
<!-- <section class="page-title-area page-title-bg1">-->
<!--    <div class="container">-->
<!--        <div class="page-title-content">-->
<!--            <h1 title="Blog">Blog</h1>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- End Page Title Area -->

        <!-- Start Blog Area -->
<!--        <section class="blog-area pb-100">-->
<!--            <div class="container">-->
<!--                <div class="section-title">-->
<!--                    <span class="sub-title">Blog</span>-->
<!--                    <h2>Blogs</h2>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="container-fluid">-->
<!--                <div class="blog-slides owl-carousel owl-theme">-->

<!--                @foreach ($newss as $news )-->

<!--                    <div class="single-blog-post-item">-->
<!--                        <div class="row m-0">-->
<!--                            <div class="col-lg-6 p-0">-->
<!--                                <div class="post-image" style="background-image: url('{{ asset('/storage/' . $news->image) }}');">-->


<!--                                    <img src="{{ asset('/storage/' . $news->image) }}" alt="image">-->

<!--                                    <a href="{{ route('new_detail',$news->id) }}" class="link-btn"></a>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="col-lg-6 p-0">-->
<!--                                <div class="post-content">-->
                                   <!-- <span class="sub-title">Release Note</span>-->
<!--                                   <center> <h3><a href="{{ route('new_detail',$news->id) }}"> {{$news->title}}</a></h3></center>-->
<!--                                    <a href="{{ route('new_detail',$news->id) }}" class="default-btn">Learn More</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                @endforeach-->

<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
        <!-- End Blog Area -->


@endsection
