@extends('layouts.app')

@section('title', 'Refund Policy')

@section('content')
    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    <h3>REFUND POLICY</h3>
                    <p class="p-b-28">{!! settings('refund_policy') !!} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
