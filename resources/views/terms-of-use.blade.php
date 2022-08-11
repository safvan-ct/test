@extends('layouts.app')

@section('title', 'Terms of Use')

@section('content')
    <!-- Start Contact Area -->
    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    <h4></h4>
                    <h3>TERMS AND CONDITION</h3>
                    <p class="p-b-28">{!! settings('terms_of_use') !!} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
