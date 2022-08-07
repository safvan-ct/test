@extends('layouts.app')

@section('content')


 <div class="ps-page--single">
        
        <div class="ps-faqs">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Frequently Asked Questions</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--faqs">
                            <tbody>
                                 @foreach ($faqs as $faq)
                                <tr>
                                    <!--<td class="heading" rowspan="3">-->
                                    <!--    <h4>SHIPPING</h4>-->
                                    <!--</td>-->
                                    <td class="question"> {!! $faq->question !!}</td>
                                    <td>{!! $faq->answer !!}</td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-call-to-action">
            <div class="container">
                <h3>We’re Here to Help !<a href="{{ route('contact') }}"> Contact us</a></h3>
            </div>
        </div>
    </div>
    <div class="ps-newsletter">
       

@endsection