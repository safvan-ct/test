@extends('layouts.app')

@section('title', 'Blog')

@section('content')
    <div class="ps-blog" style="padding-left: 15px;padding-right: 15px;padding-top: 20px;">
        <div class="ps-blog__header">
            <h4 style="text-align: center;font-size: 27px;">OUR ARTICLE</h4>
        </div>
        <div class="ps-blog__content">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                        <div class="ps-post">
                            <div class="ps-post__thumbnail"><a class="ps-post__overlay"
                                    href="{{ route('new_detail', $blog->id) }}"></a><img
                                    src="{{ asset('/storage/uploads/blog/' . $blog->image) }}" alt="{{ $blog->alt }}">
                                {{-- <div class="ps-post__badge"><i class="icon-volume-high"></i></div> --}}
                            </div>
                            <div class="ps-post__content">
                                <!--<div class="ps-post__meta"><a href="#">Entertaiment</a><a href="#">Technology</a>-->
                            </div><a class="ps-post__title"
                                href="{{ route('new_detail', $blog->id) }}">{{ $blog->title }}</a>
                            <p>{{ date('y- M d', strtotime($blog->updated_at)) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
