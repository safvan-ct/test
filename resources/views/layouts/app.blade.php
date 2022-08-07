<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <x-meta route-name="{{ Route::currentRouteName() }}" item-id="{{ Request::segment(2) }}" />
    
     <script src="assets/plugins/jquery.min.js"></script>
    <script src="assets/plugins/nouislider/nouislider.min.js"></script>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="assets/plugins/masonry.pkgd.min.js"></script>
    <script src="assets/plugins/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/jquery.matchHeight-min.js"></script>
    <script src="assets/plugins/slick/slick/slick.min.js"></script>
    <script src="assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="assets/plugins/slick-animation.min.js"></script>
    <script src="assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js"></script>
    <script src="assets/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/plugins/gmap3.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery-master/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/autopart.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
       
     <script>
     
         $(".update-cart").change(function (e) {
             alert("hi");
    
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
        
       function data(val,id) {
       

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: val
            },
            success: function (response) {
               window.location.reload();
            }
        });
      }                                

                                                      
       </script>

{{--

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">--}}

	<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script> 
	
     <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
     <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <style class="u-style">.u-section-2 {
  background-image: none;
}
.u-section-2 .u-sheet-1 {
  min-height: 570px;
}
p{
    font-family: "roboto";
    font-size: 15px;
}
.u-section-2 .u-text-1 {
  width: 626px;
  font-weight: 700;
  text-transform: none;
  margin: 60px auto 0;
}
.u-section-2 .u-line-1 {
  width: 100px;
  height: 3px;
  margin: 30px auto 0;
}
.u-section-2 .u-accordion-1 {
  width: 992px;
  margin: 30px auto 60px;
}
.u-section-2 .u-accordion-link-1 {
  letter-spacing: 0px;
  font-weight: 600;
  font-size: 1.125rem;
  padding: 25px 20px;
}
.u-section-2 .u-icon-1 {
  height: 15px;
  width: 15px;
  background-image: none;
}
.u-section-2 .u-accordion-pane-1 {
  min-height: 150px;
  background-image: none;

}
.u-section-2 .u-container-layout-1 {
  padding: 30px;
    backgroud-color:lightgrey;
}
.u-section-2 .u-accordion-link-2 {
  letter-spacing: 0px;
  font-weight: 600;
  font-size: 1.125rem;
  padding: 25px 20px;
}
.u-section-2 .u-icon-2 {
  height: 15px;
  width: 15px;
  background-image: none;
}
.u-section-2 .u-accordion-pane-2 {
  min-height: 150px;
  background-image: none;
}
.u-section-2 .u-container-layout-2 {
  padding: 30px;
}
.u-section-2 .u-accordion-link-3 {
  letter-spacing: 0px;
  font-weight: 600;
  font-size: 1.125rem;
  padding: 25px 20px;
}
.u-section-2 .u-icon-3 {
  height: 15px;
  width: 15px;
  background-image: none;
}
.u-section-2 .u-accordion-pane-3 {
  min-height: 150px;
  background-image: none;
}
.u-section-2 .u-container-layout-3 {
  padding: 30px;
}
.u-section-2 .u-accordion-link-4 {
  letter-spacing: 0px;
  font-weight: 600;
  font-size: 1.125rem;
  padding: 25px 20px;
}
.u-section-2 .u-icon-4 {
  height: 15px;
  width: 15px;
  background-image: none;
}
.u-section-2 .u-accordion-pane-4 {
  min-height: 150px;
  background-image: none;
}
.u-section-2 .u-container-layout-4 {
  padding: 30px;
}
@media (max-width: 1199px) {
  .u-section-2 .u-accordion-1 {
    width: 940px;
  }
}
@media (max-width: 991px) {
  .u-section-2 .u-accordion-1 {
    width: 720px;
  }
}
@media (max-width: 767px) {
  .u-section-2 .u-text-1 {
    width: 540px;
  }
  .u-section-2 .u-accordion-1 {
    width: 540px;
  }
}
@media (max-width: 575px) {
  .u-section-2 .u-text-1 {
    width: 340px;
  }
  .u-section-2 .u-accordion-1 {
    width: 340px;
  }
}
.submenu-2{
        display: none;
        width:242px;
        padding: 15px 30px 10px;
        flex-flow: row nowrap;
        justify-content: space-between;
        
    }
    .hover-me:hover .submenu-2{
        position:absolute;
        display: block;
        margin-top: -40px;
        margin-left: 150px;
        background: black;
    }
     
        * {
          box-sizing: border-box;
        }
        
        .zoom {
          padding: 50px;
         /* background-color: bisque; */
          transition: transform .2s;
          width: 300px;
          height: 300px;
          margin: 0 auto;
        }
        
        .zoom:hover {
          -ms-transform: scale(1.5); /* IE 9 */
          -webkit-transform: scale(1.5); /* Safari 3-8 */
          transform: scale(1.5); 
        }
        </style>
        <style>
    
    .sticky-container{
    padding:0px;
    margin:0px;
    position:fixed;
    right:-130px;
    top:230px;
    width:210px;
    z-index: 1100;
}
.sticky li{
    list-style-type:none;
    /*background-color:#fff;*/
    color:#efefef;
    height:43px;
    padding:0px;
    margin:0px 0px 1px 0px;
    -webkit-transition:all 0.25s ease-in-out;
    -moz-transition:all 0.25s ease-in-out;
    -o-transition:all 0.25s ease-in-out;
    transition:all 0.25s ease-in-out;
    cursor:pointer;
}
.sticky li:hover{
    margin-left:-115px;
}
.sticky li img{
    float:left;
    margin:5px 4px;
    margin-right:5px;
}
.sticky li p{
    padding-top:5px;
    margin:0px;
    line-height:16px;
    font-size:11px;
}
.sticky li p a{
    text-decoration:none;
    color:#2C3539;
}
.sticky li p a:hover{
    text-decoration:underline;
}

 .ps-tab-list{
     font-size:24px;
     margin-left:-167px;
     margin-right:-125px;
 }
 @media(max-width:497px){
    .ps-tab-list {
        margin-left: 69px;
    margin-right: 44px;
    }
   form.ps-form--account.ps-tab-root {
    width: 58%;
}
    .col-md-6-col  a{
        top:-87px;
    }
    .ps-form__content{
        margin-top:-81px;
    }
}
  ps-product--detail ps-product--fullwidth.ps-product__header.ps-product__info{
        margin-top: -262px;
    /* margin-right: -108px; */
    margin-left: 465px;
    }
 

    body {
        margin:0;
        font-family:'roboto';
        
    }

    .icon-bar {
      position: fixed;
      top: 50%;
      right: 0%;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
    }
    .menuColor{
            color: white;
    }
    .icon-bar a {
      display: block;
      text-align: center;
      padding: 16px;
      transition: all 0.3s ease;
      color: white;
      font-size: 20px;
    }
    .header__extra a.fa:hover{
        color:yellow;
    }

    .icon-bar a:hover {
      background-color: #000;
    }

    .facebook {
      background: #3B5998;
      color: white;
    }

    .twitter {
      background: #55ACEE;
      color: white;
    }

    .google {
      background: #dd4b39;
      color: white;
    }

    .linkedin {
      background: #007bb5;
      color: white;
    }

    .youtube {
      background: #bb0000;
      color: white;
    }

    .content {
      margin-left: 75px;
      font-size: 30px;
    }
    .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
    }
    .ps-block__banner{
  position: relative;
  text-align: center;
  color: white;
  font-size:54px;
}
.submenu-2{
        display: none;
        width:242px;
        padding: 15px 30px 10px;
        flex-flow: row nowrap;
        justify-content: space-between;

    }
    .hover-me:hover .submenu-2{
        position:absolute;
        display: block;
        margin-top: -40px;
        margin-left: 150px;
        background: black;
    }
    @media only screen and (max-width:650px){
        .ps-block__navigation{
            /*padding-left:192px;*/
            float:right;
            right:0px;
            display:none;
        }
        .ps-block__content{
            display:block;
        }
    }
     @media only screen and (max-width:650px){
         .ps-block__content {
             padding-left:28px;
         }
     }
     @media only screen and (max-width:650px){
        .ps-layout__right{
            display:block;
            width:100%;
        }

     }


    @media only screen and (max-width:650px) {
    .sticky-container {
        float: none;
        text-align: right;
        margin-right:2px;
        right:0px;
    }
    @media only screen and (max-width:650px) {
    .sticky{
       float:right
     }
}
}
@media only screen and (max-width: 767px) {
.ps-banner--autopart{

	 background-image: url(img/slider/autopart/1.jpg);

background-position: center center;

 background-repeat: no-repeat;

 background-attachment: absolute;

 background-size: cover;


}


}

.content_new{

  background-image: url(img/images/face1.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: absolute;
  background-size: cover;
  background-color:#464646;

}

@media only screen and (max-width: 767px) {
  .content{

    background-image: url(img/images/face1.jpg);
  }
	}

	.icon-chevron-left::before {
  content: "\e93b";
  color: black;
}
.icon-chevron-right::before {
  content: "\e93c";
  color: black;
}

form {
  width: 300px;
  margin: 0 auto;
  text-align: center;
  padding-top: 50px;
}

.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 44px;
  text-align: center;
  vertical-align: middle;
  padding: 11px 0;
  background: #eee;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}

form #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}

form #input-wrap {
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
    </style>
</head>

  <script>
		$(document).ready(function(){
			$(".fa-search").click(function(){
			   $(".icon").toggleClass("active");
			   $("input[type='text']").toggleClass("active");
			});
		});
	</script>

<body>
    
  <script>
		$(document).ready(function(){
			$(".fa-search").click(function(){
			   $(".icon").toggleClass("active");
			   $("input[type='text']").toggleClass("active");
			});
		});
	</script>
    <script>
  function increaseValue() {
      
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
   id= document.getElementById('id').value ;
  
  document.getElementById(id'number').value = value;
 
      $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: value
            },
            success: function (response) {
               window.location.reload();
            }
        });
  
  
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  id= document.getElementById('id').value ;
  
  document.getElementById(id'number').value = value;
  
  id= document.getElementById('id').value ;
  
      $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: value
            },
            success: function (response) {
               window.location.reload();
            }
        });
}
    </script>
    
       <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "https://website265734.nicepage.io/Page-1.html",
		"logo": "//capp.nicepage.com/f63a4d4d4fcddfba370b934dca6c153b2f6471e2/images/default-logo.png"
}</script>

     <script type="text/javascript" >
        var EhAPI = EhAPI || {}; EhAPI.after_load = function(){
        EhAPI.set_account('h3rubt19mm3fnpv8kq8qd4f6ok', 'mindbare');
        EhAPI.execute('rules');};(function(d,s,f) {
        var sc=document.createElement(s);sc.type='text/javascript';
        sc.async=true;sc.src=f;var m=document.getElementsByTagName(s)[0];
        m.parentNode.insertBefore(sc,m);
        })(document, 'script', '//d2p078bqz5urf7.cloudfront.net/jsapi/ehform.js');
        </script> 

    <div class="sticky-container">
    <ul class="sticky">
          @foreach ($socialmedia as $social)
                            
         
        <li>
            <a href={{ $social->link }} target="_blank">
            <img src="{{ asset('/storage/' . $social->image) }}" alt="{{ $social->alt}}" width="32" height="32">
            </a>
        </li>
        
        @endforeach
        
        
        <!--<li>-->
        <!--    <img src="{{asset('/storage/images/twitter1.png')}}" width="32" height="32">-->
        <!--    <p><a href="https://twitter.com/codexworldblog" target="_blank"></a></p>-->
        <!--</li>-->
        <!--<li>-->
        <!--    <img src="{{asset('/storage/images/instagram2.png')}}" width="32" height="32">-->
        <!--    <p><a href="https://plus.instagram.com/codexworld" target="_blank"></a></p>-->
        <!--</li>-->
        <!--<li>-->
        <!--    <img src="{{asset('/storage/images/linkedin1.png')}}" width="32" height="32">-->
        <!--    <p><a href="https://www.linkedin.com/company/codexworld" target="_blank"></a></p>-->
        <!--</li>-->
        <!--<li>-->
        <!--    <img src="{{asset('/storage/images/youtube1.png')}}" width="32" height="32">-->
        <!--    <p><a href="http://www.youtube.com/codexworld" target="_blank"></a></p>-->
        <!--</li>-->

    </ul>
</div>

      <div class="header__top" style="background-color:rgb(244 170 18);height:30px;width:100%;">
        <marquee behavior="alternate" style="color: black;font-size:large"><a href="{{ $flash->link }}">{{ $flash->title }}</a></marquee>
    </div>


    <header class="header header--standard header--autopart" data-sticky="true" style="background-color: black;">

        <div class="header__content"  style="background-color:black;">
            <div class="container">
                <div class="header__content-left">

                </div>
                <div class="header__content-center">
                    <a  href="{{ route('index') }}" style="padding-left: 169px;"><img src="{{ asset('storage/images/logo_goldnew.png') }}" alt="" style="width: 214px;"></a>

                </div>
                
                 <script>
		$(document).ready(function(){
			$(".fa-search").click(function(){
			   $(".icon").toggleClass("active");
			   $("input[type='text']").toggleClass("active");
			});
		});
	</script>
    <!--            <div class="header__content-right" style="color: white;position: relative;">-->
    <!--                <div class="header__actions">-->
    <!--                  <div class="ps-cart--mini">-->
    <!--                    <div class="searchbar" style="bottom:19px">-->
    <!--                         <form action="{{ route('search')}}" method="post">-->
    <!--                              @csrf-->
    <!--                         <input type="text" placeholder="search" name="search" class="active">-->
    <!--                          <div class="icon active " style="height:40px">-->
    <!--                              <button type="submit" style=" color: #f4aa12;-->
    <!--border: none;" ><i class="fa fa-search" style="font-size:23px;color:white"></i></button>-->
                            
    <!--                            <i class="fa fa-search" style="font-size:23px;color:white"></i>-->
    <!--                         </div>-->
    <!--                          </form>-->
    <!--                         </div>-->
    <!--                    </div>-->
                      
                      
                       <div class="header__content-right" style="color: white;position: relative;">
                    <div class="header__actions">
                        <div class="ps-cart--mini">
                        <div class="searchbar" style="bottom:19px">
                             <form action="{{ route('search')}}" method="post">
                                  @csrf
                             <input type="text" placeholder="search" name="search" >
                              <div class="icon  " style="height:40px">
                                  <button type="submit" style=" color: #f4aa12;
    border: none;" ><i class="fa fa-search" style="font-size:23px;color:white"></i></button>
                             </form>
                                <i class="fa fa-search" style="font-size:23px;color:white"></i>
                             </div>
                             
                             </div>
                        </div>
                         
                 
                        
                        <!--<div class="ps-cart--mini">-->
                        <!--<div class="searchbar">-->
                        <!--     <input type="text" placeholder="search">-->
                        <!--     <div class="icon">-->
                        <!--        <i class="fa fa-search" style="font-size:23px;color:white"></i>-->
                        <!--     </div>-->
                        <!--     </div>-->
                        <!--</div> -->
                        <!--<div class="ps-block--header-hotline">-->
                        <!--    <div class="ps-block__left"><i class="icon-telephone" style="color:white"></i></div>-->
                        <!--    <div class="ps-block__right">-->
                        <!--        <p style="color: white;">Hotline<strong style="color: white;">1-800-891-8906</strong></p>-->
                        <!--    </div>-->
                        <!--</div>-->


                        <div class="ps-block--user-header">
                            <a href="{{ route('login') }}"><div class="ps-block__left"><i class="icon-user"></i></div></a>

                        </div>
                         @auth
                        <div class="ps-block--user-header">
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 24px;" ></i></a>

                        </div>
                        {{-- <li class="nav-item">
                        </li> --}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <div class="ps-cart--mini" ><a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2" style="color: white"></i><span><i>[{{ count((array) session('cart')) }}]</i></span></a>
                        </div>

                        @endauth
                        @guest
                        <div class="ps-cart--mini" ><a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2" style="color: white"></i><span><i>[{{ count((array) session('cart')) }}]</i></span></a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
             <nav class="navigation" style="background-color: black;
    border: 1px solid black;">
            <div class="container" style="padding-top:10px;" >
                <ul class="menu menu--furniture">
                    <li><a  href="{{ route('index') }}" style="color:white">HOME</a><span class="sub-toggle"></span>
                        <!-- <ul class="sub-menu">
                            <li><a href="{{ route('index') }}">Marketplace Full Width</a>
                            </li>
                            <li><a href="homepage-2.html">Home Auto Parts</a>
                            </li>
                            <li><a href="homepage-10.html">Home Technology</a>
                            </li>

                        </ul> -->
                    </li>
                    
                   <li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">ALL PRODUCTS</a><span class="sub-toggle"></span>
                        <div class="mega-menu">
                            <div class="mega-menu__column">
                                <ul class="mega-menu__list">
                                      @foreach ( $catss as $cat)
                                    <li class="hover-me" ><a href="{{ route('shop',$cat->id) }}">{{$cat->title}}</a>
                                        <div class="submenu-2">
                                            <ul>
                                                  @if ($subcategorys !="")
                                    @foreach ( $subcategorys as $subcategory)
                                    @if ($subcategory->game ==$cat->id)
                                    <li><a href="{{ route('shopcat',$subcategory->id) }}">{{$subcategory->title}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                              
                                            </ul>
                                        </div>

                                    </li>
                                       @endforeach
                                </ul>
                            </div>

                        </div>
                    </li>
                    
                    

                         @foreach ( $catss as $cat)
                    <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',$cat->id) }}" style="color:white">{{$cat->title}}</a><span class="sub-toggle"></span>

                        <div class="mega-menu">
                            <div class="mega-menu__column">

                                <ul class="mega-menu__list">
                                    @if ($subcategorys !="")
                                    @foreach ( $subcategorys as $subcategory)
                                    @if ($subcategory->game ==$cat->id)
                                    <li><a href="{{ route('shopcat',$subcategory->id) }}">{{$subcategory->title}}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </li>
                       @endforeach
                       
                        <li><a  href="" style="color:white">COMBO</a><span class="sub-toggle"></span>
                        <!--<li><a  href="" style="color:white">PROMO CODE</a><span class="sub-toggle"></span>-->
                       
                       

                    <!--<li class="menu-item-has-children has-mega-menu"><a href="face_ care.html" style="color:white">FACE</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="face_wash.html">Face Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Serum</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Mask</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Sunskreen</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Under Eye Oil</a>-->
                    <!--                </li>-->
                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">HAIR</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">Hair Shampoo</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Conditioner</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Mask</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Serum</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Oil</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Spa</a>-->
                    <!--                </li>-->
                    <!--            </ul>-->
                    <!--        </div>-->


                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">SKIN</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">ShowerGel/Body Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Body Scrubs</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Body Lotions</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Body Creams</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Foot Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Scar Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Home Body Spa</a>-->
                    <!--                </li>-->
                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">WOMEN</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">VT Gel</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Intimate Wash/Hygine Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">BT Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Buttocks Cream</a>-->
                    <!--                </li>-->

                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">MEN</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">Face Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Bread Oil</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Scrub</a>-->
                    <!--                </li>-->

                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li><a href="#" style="color:white">COMBO</a><span class="sub-toggle"></span>-->

                    </li>


                </ul>

            </div>
        </nav>
        </div>

    </header>

 {{-- <header class="header header--standard header--autopart" data-sticky="true" style="background-color: black;">

        <div class="header__content"  style="background-color:black;">
            <div class="container">
                <div class="header__content-left">

                </div>
                <div class="header__content-center">
                    <a  href="{{ route('index') }}" style="padding-left: 169px;"><img src="{{ asset('storage/images/logo_goldnew.png') }}" alt="" style="width: 214px;"></a>

                </div>
                <div class="header__content-right" style="color: white;position: relative;">
                    <div class="header__actions">
                      <div class="ps-cart--mini">
                        <div class="searchbar">
                             <input type="text" placeholder="search" name="search">
                             <div class="icon">
                                <i class="fa fa-search" style="font-size:23px;color:white"></i>
                             </div>
                             </div>
                        </div>
                        <!--<div class="ps-block--header-hotline">-->
                        <!--    <div class="ps-block__left"><i class="icon-telephone" style="color:white"></i></div>-->
                        <!--    <div class="ps-block__right">-->
                        <!--        <p style="color: white;">Hotline<strong style="color: white;">1-800-891-8906</strong></p>-->
                        <!--    </div>-->
                        <!--</div>-->


                        <div class="ps-block--user-header">
                            <a href=""><div class="ps-block__left"><i class="icon-user"></i></div></a>

                        </div>
                        @auth
                        <div class="ps-cart--mini" ><a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2" style="color: white"></i><span><i>[{{ count((array) session('cart')) }}]</i></span></a>
                        </div>
                        @endauth
                        @guest
                        <div class="ps-cart--mini" ><a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2" style="color: white"></i><span><i>[{{ count((array) session('cart')) }}]</i></span></a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
             <nav class="navigation" style="background-color: black;
    border: 1px solid black;">
            <div class="container" style="padding-top:10px;" >
                <ul class="menu menu--furniture">
                    <li><a  href="{{ route('index') }}" style="color:white">HOME</a><span class="sub-toggle"></span>
                        <!-- <ul class="sub-menu">
                            <li><a href="{{ route('index') }}">Marketplace Full Width</a>
                            </li>
                            <li><a href="homepage-2.html">Home Auto Parts</a>
                            </li>
                            <li><a href="homepage-10.html">Home Technology</a>
                            </li>

                        </ul> -->
                    </li>
                    <!-- <li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">ALL PRODUCTS</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->
                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li class="hover-me" ><a href="face_ care.html">Face</a>-->
                    <!--                    <div class="submenu-2">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="face_wash.html">Face Wash</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Face Serum</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Face Cream</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Face Mask</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Sunskreen</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Under Eye Oil</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->

                    <!--                </li>-->
                    <!--                <li class="hover-me"><a href="#">Skin</a>-->
                    <!--                    <div class="submenu-2">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="#">ShowerGel/Body Wash</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Body Scrubs</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Body Lotions</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Body Creams</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Foot Cream</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Scar Cream</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Home Body Spa</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!--                </li>-->
                    <!--                <li class="hover-me"><a href="#">Hair</a>-->
                    <!--                    <div class="submenu-2">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="#">Hair Shampoo</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Hair Conditioner</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Hair Mask</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Hair Serum</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Hair Oil</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Hair Spa</a>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!--                </li>-->
                    <!--                <li class="hover-me"><a href="#">Women</a>-->
                    <!--                    <div class="submenu-2">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="#">VT Gel</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Intimate Wash/Hygine Wash</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">BT Cream</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Buttocks Cream</a>-->
                    <!--                            </li>-->

                    <!--                        </ul>-->

                    <!--                    </div>-->
                    <!--                </li>-->
                    <!--                <li class="hover-me"><a href="#">Men</a>-->
                    <!--                    <div class="submenu-2">-->
                    <!--                        <ul>-->
                    <!--                            <li><a href="#">Face Wash</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Bread Oil</a>-->
                    <!--                            </li>-->
                    <!--                            <li><a href="#">Face Scrub</a>-->
                    <!--                            </li>-->

                    <!--                        </ul>-->

                    <!--                    </div>-->
                    <!--                </li>-->

                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu"><a href="face_ care.html" style="color:white">FACE</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="face_wash.html">Face Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Serum</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Mask</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Sunskreen</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Under Eye Oil</a>-->
                    <!--                </li>-->
                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">HAIR</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">Hair Shampoo</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Conditioner</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Mask</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Serum</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Oil</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Hair Spa</a>-->
                    <!--                </li>-->
                    <!--            </ul>-->
                    <!--        </div>-->


                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">SKIN</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">ShowerGel/Body Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Body Scrubs</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Body Lotions</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Body Creams</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Foot Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Scar Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Home Body Spa</a>-->
                    <!--                </li>-->
                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">WOMEN</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">VT Gel</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Intimate Wash/Hygine Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">BT Cream</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Buttocks Cream</a>-->
                    <!--                </li>-->

                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu" ><a href="#" style="color:white">MEN</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->

                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li><a href="#">Face Wash</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Bread Oil</a>-->
                    <!--                </li>-->
                    <!--                <li><a href="#">Face Scrub</a>-->
                    <!--                </li>-->

                    <!--            </ul>-->
                    <!--        </div>-->

                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li><a href="#" style="color:white">COMBO</a><span class="sub-toggle"></span>-->

                    </li>


                </ul>

            </div>
        </nav>
        </div>

    </header> --}}
    <header class="header header--mobile autopart" data-sticky="true">
        <div class="header__top">
            <div class="header__left">
                <p>Welcome to Amigo Online Shopping Store !</p>
            </div>
            <div class="header__right">
                <ul class="navigation__extra">
                    <li><a href="#">Tract your order</a></li>
                </ul>
            </div>
        </div>
        <div class="navigation--mobile" style="background-color:black;">
            <div class="navigation__left"><a class="ps-logo" href="{{ route('index') }}"><img src="{{ asset('storage/images/logo_goldnew.png') }}" alt="" style="width: 145px;"></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                     <div class="ps-block--user-header" style="padding-right: 27px;color: white;">
                            <a href="{{ route('login') }}"><div class="ps-block__left"><i class="icon-user"></i></div></a>

                        </div>
                         @auth
                        <div class="ps-block--user-header">
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 24px;" ></i></a>

                        </div>
                        {{-- <li class="nav-item">
                        </li> --}}
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <div class="ps-cart--mini" ><a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2" style="color: white"></i><span><i>[{{ count((array) session('cart')) }}]</i></span></a>
                        </div>

                        @endauth
                        @guest
                        <div class="ps-cart--mini" ><a class="header__extra" href="{{ route('cart') }}"><i class="icon-bag2" style="color: white"></i><span><i>[{{ count((array) session('cart')) }}]</i></span></a>
                        </div>
                        @endguest
                
                    <!--<div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2" style="color:white;"></i><span><i>0</i></span></a>-->

                    <!--</div>-->
                    <!--<div class="ps-cart--mini"><a class="header__extra" href=""><i class="fa fa-search" aria-hidden="true" style="color:white;"></i></a></div>-->
                    <!--<div class="ps-block--user-header">-->
                    <!--    <div class="ps-block__left"><i class="icon-user" style="color: white;"></i></div>-->
                    <!--    <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>

    </header>
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content">
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="#"><img src="https://lesenorita.com/amigohosting/storage/uploads/account/1657598773.png" alt=""></a></div>
                        <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Glutathione Foaming Face Wash</a>
                            <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x ₹497.99</small>
                        </div>
                    </div>
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>₹497.99</strong></h3>
                    <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>Categories</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                 <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',6) }}">FACE</a><span class="sub-toggle"></span>
                     <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Foaming Face Wash</h4>
                        <h4>Face Wash</h4>
                        <h4>Face Serum</h4>
                        <h4>Face Cream</h4>
                        <h4>Face Mask</h4>
                        <h4>Sunskreen</h4>
                        <h4>Under Eye Oil</h4>


                    </div>
                    </div>



                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',5) }}">HAIR</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Hair Shampoo</h4>
                        <h4>Hair Conditioner</h4>
                        <h4>Hair Mask</h4>
                        <h4>Hair Serum</h4>
                        <h4>Hair Oil</h4>
                        <h4>Hair Spa</h4>


                    </div>
                    </div>

                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',4) }}">SKIN</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>Shower Gel/Body Wash</h4>
                        <h4>Body Scrubs</h4>
                        <h4>Body Lotions</h4>
                        <h4>Body Creams</h4>
                        <h4>Foot Cream</h4>
                        <h4>Scar Cream</h4>
                        <h4>Home Body Spa</h4>


                    </div>
                   </div>
                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',2) }}">WOMEN</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                    <div class="mega-menu__column">
                        <h4>VT Gel</h4>
                        <h4>Intimate Wash/Hygine Wash</h4>
                        <h4>BT Cream</h4>
                        <h4>Buttocks Cream</h4>



                    </div>
                    </div>

                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',1) }}">MEN</a><span class="sub-toggle"></span>
                <div class="mega-menu">
                    
                    <div class="mega-menu__column">
                        <h4>Face Wash</h4>
                        <h4>Face Scrub</h4>
                        <h4>Bread Oil</h4>



                    </div>
                    </div>



                </li>

                <!--<li><a href="#">Hot Promotions</a>-->
                <!--</li>-->
                <!--<li class="menu-item-has-children has-mega-menu"><a href="#">Consumer Electronic</a><span class="sub-toggle"></span>-->
                <!--    <div class="mega-menu">-->
                <!--        <div class="mega-menu__column">-->
                <!--            <h4>Electronic<span class="sub-toggle"></span></h4>-->
                <!--            <ul class="mega-menu__list">-->
                <!--                <li><a href="#">Termo Meter &amp; Temperature Finder</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">TV &amp; Videos</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Camera, Photos &amp; Videos</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Cellphones &amp; Accessories</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Headphones</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Videosgames</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Wireless Speakers</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Office Electronic</a>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--        <div class="mega-menu__column">-->
                <!--            <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>-->
                <!--            <ul class="mega-menu__list">-->
                <!--                <li><a href="#">Digital Cables</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Audio &amp; Video Cables</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Batteries</a>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</li>-->
                <!--<li><a href="#">Clothing &amp; Apparel</a>-->
                <!--</li>-->
                <!--<li><a href="#">Home, Garden &amp; Kitchen</a>-->
                <!--</li>-->
                <!--<li><a href="#">Health &amp; Beauty</a>-->
                <!--</li>-->
                <!--<li><a href="#">Yewelry &amp; Watches</a>-->
                <!--</li>-->
                <!--<li class="menu-item-has-children has-mega-menu"><a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>-->
                <!--    <div class="mega-menu">-->
                <!--        <div class="mega-menu__column">-->
                <!--            <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>-->
                <!--            <ul class="mega-menu__list">-->
                <!--                <li><a href="#">Computer &amp; Tablets</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Laptop</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Monitors</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Networking</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Drive &amp; Storages</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Computer Components</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Security &amp; Protection</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Gaming Laptop</a>-->
                <!--                </li>-->
                <!--                <li><a href="#">Accessories</a>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</li>-->
                <!--<li><a href="#">Babies &amp; Moms</a>-->
                <!--</li>-->
                <!--<li><a href="#">Sport &amp; Outdoor</a>-->
                <!--</li>-->
                <!--<li><a href="#">Phones &amp; Accessories</a>-->
                <!--</li>-->
                <!--<li><a href="#">Books &amp; Office</a>-->
                <!--</li>-->
                <!--<li><a href="#">Cars &amp; Motocycles</a>-->
                <!--</li>-->
                <!--<li><a href="#">Home Improments</a>-->
                <!--</li>-->
                <!--<li><a href="#">Vouchers &amp; Services</a>-->
                <!--</li>-->
            </ul>
        </div>
    </div>
    <div class="navigation--list">
        <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a>
        <!--<a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a>-->
        </div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="{{ route('search') }}" method="post">
                @csrf
                <div class="form-group--nest" style="margin-top:-41px">
                    <input class="form-control" type="text" name="search" placeholder="Search something...">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content"></div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children"><a href="{{ route('index') }}">HOME</a>

                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',6) }}">FACE</a>
                    <!-- <div class="mega-menu">-->
                    <!--<div class="mega-menu__column">-->
                    <!--    <h4>Face Wash</h4>-->
                    <!--    <h4>Face Serum</h4>-->
                    <!--    <h4>Face Cream</h4>-->
                    <!--    <h4>Face Mask</h4>-->
                    <!--    <h4>Sunskreen</h4>-->
                    <!--    <h4>Under Eye Oil</h4>-->


                    <!--</div>-->
                    <!--</div>-->



                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',5) }}">HAIR</a>
                    <!--<div class="mega-menu">-->
                    <!--<div class="mega-menu__column">-->
                    <!--    <h4>Hair Shampoo</h4>-->
                    <!--    <h4>Hair Conditioner</h4>-->
                    <!--    <h4>Hair Mask</h4>-->
                    <!--    <h4>Hair Serum</h4>-->
                    <!--    <h4>Hair Oil</h4>-->
                    <!--    <h4>Hair Spa</h4>-->


                    <!--</div>-->
                    <!--</div>-->

                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',4) }}">SKIN</a>
                   <!-- <div class="mega-menu">-->
                   <!-- <div class="mega-menu__column">-->
                   <!--     <h4>Shower Gel/Body Wash</h4>-->
                   <!--     <h4>Body Scrubs</h4>-->
                   <!--     <h4>Body Lotions</h4>-->
                   <!--     <h4>Body Creams</h4>-->
                   <!--     <h4>Foot Cream</h4>-->
                   <!--     <h4>Scar Cream</h4>-->
                   <!--     <h4>Home Body Spa</h4>-->


                   <!-- </div>-->
                   <!--</div>-->
                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',2) }}">WOMEN</a>
                    <!--<div class="mega-menu">-->
                    <!--<div class="mega-menu__column">-->
                    <!--    <h4>VT Gel</h4>-->
                    <!--    <h4>Intimate Wash/Hygine Wash</h4>-->
                    <!--    <h4>BT Cream</h4>-->
                    <!--    <h4>Buttocks Cream</h4>-->



                    <!--</div>-->
                    <!--</div>-->

                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="{{ route('shop',1) }}">MEN</a>
                <!--<div class="mega-menu">-->
                    
                <!--    <div class="mega-menu__column">-->
                <!--        <h4>Face Wash</h4>-->
                <!--        <h4>Face Scrub</h4>-->
                <!--        <h4>Bread Oil</h4>-->



                <!--    </div>-->
                <!--    </div>-->



                </li>
                                  <li><a  href="" style="color:white">COMBO</a><span class="sub-toggle"></span>
                  </li>
                <!--<li class="menu-item-has-children has-mega-menu"><a href="#">GIft PACKS</a><span class="sub-toggle"></span>-->



                <!--</li>-->
            </ul>
        </div>
    </div>

    @include('layouts.alert')
    @yield('content')



    <footer class="ps-footer ps-footer--2" style="background-color:black">
        <div class="container">
            <div class="ps-footer__content">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer">
                            <h4 class="widget-title" style="color:white">Quick links</h4>
                            <ul class="ps-list--link">
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                                <li><a href="{{ route('refund') }}">Refund Policy</a></li>
                                 <li><a href="{{ route('delivery') }}">Shipping and Delivery policy</a></li>
                               
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer">
                            <h4 class="widget-title" style="color:white">Company</h4>
                            <ul class="ps-list--link">
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('news')}}">Blogs</a></li>
                                <!--<li><a href="">Career</a></li>-->
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                        <aside class="widget widget_footer">
                            <h4 class="widget-title" style="color:white">Bussiness</h4>
                            <ul class="ps-list--link">
                                <!--<li><a href="blog-grid.html">Our Press</a></li>-->
                                <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                <li><a href="{{ route('myaccount') }}">My account</a></li>
                                <li><a href="{{ route('shop',6) }}">Shop</a></li>
                                 
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 ">
                        <aside class="widget widget_newletters">
                            <h4 class="widget-title" style="color:white">Newsletter</h4>
                            <form class="ps-form--newletter" action="{{route('subscribe')}}" method="post">
                                @csrf
                                <div class="form-group--nest" style="margin-top:-32px">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email">
                                    <button class="ps-btn">Subscribe</button>
                                </div>
                                <!--<ul class="ps-list--social">-->
                                <!--    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
                                <!--    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
                                <!--    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>-->
                                <!--    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>-->
                                <!--</ul>-->
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="ps-footer__copyright">
                <p>© 2018 Amigo. All Rights Reserved</p>
                <p><span>We Using Safe Payment For:</span><a href="#"><img src="img/payment-method/1.jpg" alt=""></a><a href="#"><img src="img/payment-method/2.jpg" alt=""></a><a href="#"><img src="img/payment-method/3.jpg" alt=""></a><a href="#"><img src="img/payment-method/4.jpg" alt=""></a><a href="#"><img src="img/payment-method/5.jpg" alt=""></a></p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/gmap3.min.js') }}"></script>
    <!-- custom scripts-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
