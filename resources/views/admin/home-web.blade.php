@extends('admin.layouts.app')

@section('title', 'Website Management')

@section('content')

    <div class="main-container">

        <div class="row mb-3">
            <div class="col-md-1">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row gutters mt-3">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('seo.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>SEO</h3><p>Website SEO</p></div>
                    </div>
                </a>
            </div>

             <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('slider.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Slider</h3><p>Website Slider</p></div>
                    </div>
                </a>
            </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('bestsaleslider.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Image Slider</h3><p>Website Product Detail Page</p></div>
                    </div>
                </a>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('flash.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Flash News</h3><p>Website Flash new</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('news.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Blog</h3><p>Website Blog</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('adv.index') }}">

                    <div class="info-stats2">

                        <div class="info-icon danger"><i class="icon-layers2"></i></div>

                        <div class="sale-num"><h3>Offer</h3><p>Website Offer Banner </p></div>

                    </div>

                </a>

            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('homeabout.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Home About</h3><p>Website Home about</p></div>
                    </div>
                </a>
            </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('homecat1.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Home Category1 </h3><p>Website Home category1</p></div>
                    </div>
                </a>
            </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('homecat2.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Home Category2</h3><p>Website Home category2</p></div>
                    </div>
                </a>
            </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('homesubcat1.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Home SubCategory</h3><p>Website Home Subcategory</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('aboutus.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>About Us</h3><p>Website About Us</p></div>
                    </div>
                </a>
            </div>
            
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('awardimage.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Award Images</h3><p>Website Award Images</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('homequiz.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Home Quiz</h3><p>Website Home Quiz</p></div>
                    </div>
                </a>
            </div>


              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('testimonial.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Testimonials</h3><p>Website Testimonials</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('privacy.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Privacy Policy</h3><p>Website Privacy Policy</p></div>
                    </div>
                </a>
            </div>
            
              <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('socialmedia.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Social Media</h3><p>Website Social Media</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('refund.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Refund Policy</h3><p>Website Refund Policy</p></div>
                    </div>
                </a>
            </div>

       <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('deliverys.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Delivery Policy</h3><p>Website Delivery Policy</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('terms.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Terms Of Use </h3><p>Terms Of Use </p></div>
                    </div>
                </a>
            </div>

        </div>
    </div>

@endsection
