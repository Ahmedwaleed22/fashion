<?php 
    use Illuminate\Support\Facades\DB;
    $cities = DB::table('cities')->pluck('name'); 
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.css" integrity="sha512-85w5tjZHguXpvARsBrIg9NWdNy5UBK16rAL8VWgnWXK2vMtcRKCBsHWSUbmMu0qHfXW2FVUDiWr6crA+IFdd1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@if(get_setting('topbar_banner') != null)
<div class="position-relative top-banner removable-session z-1035 d-none" data-key="top-banner" data-value="removed">
    <a href="{{ get_setting('topbar_banner_link') }}" class="d-block text-reset">
        <img src="{{ uploaded_asset(get_setting('topbar_banner')) }}" class="w-100 mw-100 h-50px h-lg-auto img-fit">
    </a>
    <button class="btn text-white absolute-top-right set-session" data-key="top-banner" data-value="removed" data-toggle="remove-parent" data-parent=".top-banner">
        <i class="la la-close la-2x"></i>
    </button>
</div>
@endif
<style>
    .myTest:hover{
        background-color: unset !important;
        color: unset !important;
    }
</style>
<!-- Top Bar -->
<div class="top-navbar bg-white border-bottom border-soft-secondary z-1035">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col">
             
            </div>

            <div class="col-5 text-right d-none d-lg-block">
                <ul class="list-inline mb-0">
                    @auth
                        @if(isAdmin())
                            <li class="list-inline-item mr-3">
                                <a href="{{ route('admin.dashboard') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
                            </li>
                        @else
                            <li class="list-inline-item mr-3">
                                <a href="{{ route('dashboard') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
                            </li>
                        @endif
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Logout')}}</a>
                        </li>
                    @else
                        <li class="list-inline-item mr-3">
                            <a href="{{ route('user.login') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Login')}}</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('user.registration') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Register')}}</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Top Bar -->
<header class="@if(get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white border-bottom shadow-sm">
    <div class="position-relative logo-bar-area z-1">
        <div class="container">
            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="{{ route('home') }}">
                        @php
                            $header_logo = get_setting('header_logo');
                        @endphp
                        @if($header_logo != null)
                            <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40">
                        @else
                            <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40">
                        @endif
                    </a>

                    @if(Route::currentRouteName() != 'home')
                        <div class="d-none d-xl-block align-self-stretch category-menu-icon-box ml-auto mr-0">
                            <div class="h-100 d-flex align-items-center" id="category-menu-icon">
                                <div class="dropdown-toggle navbar-light bg-light h-40px w-50px pl-2 rounded border c-pointer">
                                    <span class="navbar-toggler-icon"></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-auto d-flex align-items-center dropdown" id="dropHandel">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"  aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                        <span id="locName">Select location</span>
                    </button>
                    <div class="dropdown-menu container-fluid" id="dropHandeler" aria-labelledby="dropdownMenuButton" style="width: 450px !important; max-width: 500px !important;">
                        <div class="card dropdown-item myTest">
                            <h5 class="card-header"> <span>Welcome to<span class="text-danger"> Digi Indias</span><span></h5>
                            <div class="card-body">
                                    <h5 class="card-title" id="locCard"><i class="fas fa-map-marker-alt mr-2"></i></h5>
                                    <p class="card-text hideAdd">Please provide your location to see products at nearby store</p>
                                    <div class="d-flex flex-md-row justify-content-around hideAdd" id="hideMehAdd">
                                        <div class="p-2"><a id="getLoc" href="" class="btn btn-primary">Detect Location</a></div>
                                        <div class="p-2 align-self-center"><p class="align-self-center">- OR -</p></div>
                                        <div class="p-2">
                                            <div class="input-group">
                                                <div id="selectContainer">
                                                </div>
                                                <input type="text" class="form-control" placeholder="Type to search" aria-label="Username" aria-describedby="basic-addon1" style="display: none;">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle" data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="q" placeholder="{{translate('Search for Products...')}}" autocomplete="off">
                                    <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100" style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader"><div></div><div></div><div></div></div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="compare">
                        @include('frontend.partials.compare')
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="wishlist">
                        @include('frontend.partials.wishlist')
                    </div>
                </div>

                <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        @include('frontend.partials.cart')
                    </div>
                </div>

            </div>
        </div>
        @if(Route::currentRouteName() != 'home')
        <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3" id="hover-category-menu">
            <div class="container">
                <div class="row gutters-10 position-relative">
                    <div class="col-lg-3 position-static">
                        @include('frontend.partials.category_menu')
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @if ( get_setting('header_menu_labels') !=  null )
        <div class="bg-white border-top border-gray-200 py-1">
            <div class="container">
                <ul class="list-inline mb-0 pl-0 mobile-hor-swipe text-center">
                    @foreach (json_decode( get_setting('header_menu_labels'), true) as $key => $value)
                    <li class="list-inline-item mr-0">
                        <a href="{{ json_decode( get_setting('header_menu_links'), true)[$key] }}" class="opacity-60 fs-14 px-3 py-2 d-inline-block fw-600 hov-opacity-100 text-reset">
                            {{ translate($value) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</header>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.css" integrity="sha512-85w5tjZHguXpvARsBrIg9NWdNy5UBK16rAL8VWgnWXK2vMtcRKCBsHWSUbmMu0qHfXW2FVUDiWr6crA+IFdd1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sifter/0.5.4/sifter.js" integrity="sha512-5nTN1ckgN3ul7NZ6WqsHqvraBTjnUZ6Y8kzX6jr0p5yqXTiz/wQE+wM8tXLGJxnZ98qABARpRdZVBJ5iYhHHmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/microplugin/0.0.3/microplugin.js" integrity="sha512-IGkpKApwIHDYxPMj2y0hX8dZsPslpdO8Bi12c2aNvLKsF8YjnwJHtjx0NvrTXBm8R9Qq+Nn0Sf/Hf+InGpmBeA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/selectize.js" integrity="sha512-C0BjK7lFIReZXZeIPdlW5lV1926j4hons+B5UQhSqWee3cCNx/AB0jUC+v3XGMRucvipU4LrO6n7j1SujSQKYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 -->
<script>
    //https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=37.42159&longitude=-122.0837&localityLanguage=en
    var cityList = [];
    @foreach ($cities as $city)
        cityList.push({"name":"{{ $city }}"})
    @endforeach    
    $(document).ready(function () { 
        $('#dropdownMenuButton').on('click', function (event) {
            $(this).parent().dropdown('toggle');
        });
        $('body').on('click', function (e) {
            if (!$('#dropHandel').is(e.target) 
                && $('#dropHandel').has(e.target).length === 0 
                && $('#dropHandeler').has(e.target).length === 0
            ) {
                $('#dropHandeler').removeClass('show');
            }
        });
        $(function() {
        let citySelect = $("#selectContainer").selectize({
            maxOptions: 5,
            maxItems: 1,
            hideSelected: true,
            closeAfterSelect: true,
            placeholder:"Type to search",
            labelField: "name",
            valueField:"name",
            searchField:"name",
            options: cityList
        });
        var selectize = citySelect[0].selectize;
        selectize.on("change",function(value){
            $('#locName').html(value)
                                $('#locCard').html('<i class="fas fa-map-marker-alt mr-2"></i>'+value)
                                $( ".hideAdd" ).each(function( index ) {
                                    $( this ).attr("style","display:none !important")
                                });
                                $("#hideMehAdd").attr("style","display:none !important")
        })
    })
        /* if ("geolocation" in navigator){ 
                navigator.geolocation.getCurrentPosition(function(position){ 
                        $.ajax({
                            url: "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=" + position.coords.latitude + "&longitude=" + position.coords.longitude + "&localityLanguage=en",
                            success: function(data){
                                $('#locName').html(data.city)
                                $('#locCard').html('<i class="fas fa-map-marker-alt mr-2"></i>'+data.city)
                                $( ".hideAdd" ).each(function( index ) {
                                    $( this ).attr("style","display:none !important")
                                });
                                $("#hideMehAdd").attr("style","display:none !important")
                            }
                        });
                    });
            } */
        $('#getLoc').on('click',function(e){
            e.preventDefault();
            if ("geolocation" in navigator){ 
                navigator.geolocation.getCurrentPosition(function(position){ 
                        $.ajax({
                            url: "https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=" + position.coords.latitude + "&longitude=" + position.coords.longitude + "&localityLanguage=en",
                            success: function(data){
                                $('#locName').html(data.city)
                                $('#locCard').html('<i class="fas fa-map-marker-alt mr-2"></i>'+data.city)
                                $( ".hideAdd" ).each(function( index ) {
                                    $( this ).attr("style","display:none !important")
                                });
                                $("#hideMehAdd").attr("style","display:none !important")
                            }
                        });
                    });
            }else{
                console.log("Browser doesn't support geolocation!");
            }
        })
    })
</script>