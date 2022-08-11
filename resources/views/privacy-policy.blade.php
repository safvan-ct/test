@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
    <!-- Start Contact Area -->
    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">

                    <h3>PRIVACY POLICY</h3>
                    <p class="p-b-28"> {!! settings('privacy_policy') !!} </p>
                </div>

            </div>
        </div>
@endsection
