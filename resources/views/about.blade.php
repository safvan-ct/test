@extends('layouts.app')

@section('title', 'About')

@section('content')


    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    <h2>{!! settings('about_heading') !!} </h2>
                    <h4>{{ settings('about_title') }} </h4>
                    <p>{!! settings('about_description') !!}</p>
                </div>
            </div>
        </div>
        <div class="ps-about-awards">
            <div class="container">
                <div class="ps-section__header">
                    <h4>{!! settings('award_heading') !!}</h4>
                    <p>{!! settings('award_description') !!}</p>
                </div>
                <div class="ps-section__content">
                    <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0"
                        data-owl-nav="false" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="3"
                        data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1500"
                        data-owl-mousedrag="off">
                        @foreach ($awards as $data)
                            <a href="#">
                                <img src="{{ asset('/storage/uploads/award/' . $data->image) }}" style="width: 100px; height: 50px"
                                    alt={{ $data->alt }}>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
