<style>
    .self-muted{
        color: #999;
    }
</style>
<section class="bg-white py-5 text-dark footer-widget">
    <div class="container-fluid mx-5">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <div class="col-md-12 col-lg-12">
                <h5>China Wholesale Platform</h1>
                <p class="self-muted">@php
                            echo get_setting('about_us_description');
                        @endphp</p>
            </div>
            <div class="col-md-12 col-lg-12">
                <h5>Community</h1>
                <p class="self-muted"><span>Facebook</span>|<span>Instagram</span>|<span>Pinterest</span>|<span>Twitter</span>|<span>Youtube</span></p>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-2 mr-5">
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <div class="form-row align-items-center">
                                        <label for="myInput">Subscribe for discounts and coupons!</label>
                                        <div class="input-group">
                                            <input type="text" id="myInput" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12">
                                <p>Get DHgate on your Mobile</p>
                                <div class="row">
                                    <div class="col">
                                    <a href="{{ get_setting('app_store_link') }}" target="_blank" class="d-inline-block">
                                <img src="{{ static_asset('assets/img/app.png') }}" class="mx-100 h-40px">
                            </a>
                                    </div>
                                    <div class="col">
                                    <a href="{{ get_setting('play_store_link') }}" target="_blank" class="d-inline-block mr-3 ml-0">
                                <img src="{{ static_asset('assets/img/play.png') }}" class="mx-100 h-40px">
                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-8 ml-5">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-12">
                                        <h5  style="font-size: 12px;">Dispath & Delivery</h5>
                                    </div>
                                    <div class="col-12  self-muted">
                                        <p style="font-size:10px">Delivery Options</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Customes & Import Tax</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Tracking Your Items</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-12">
                                        <h5  style="font-size: 12px;">Refund & Return</h5>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">DHgate Service Pledge</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Refund & Return Process</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">DHgate REsolution Center</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="row">
                                    <div class="col-12">
                                        <h5  style="font-size: 12px;">Customer Service</h5>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Customer Service</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Brand Owner Report</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">US Local Services</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="row">
                                    <div class="col-12">
                                        <h5  style="font-size: 12px;">Payment</h5>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Paymnt Methods</p>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Coupon</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="row">
                                    <div class="col-12">
                                        <h5  style="font-size: 12px;">Partnership</h5>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Affiliate Program</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="row">
                                    <div class="col-12">
                                        <h5  style="font-size: 12px;">Policy</h5>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Managment & Compliance</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="row">
                                    <div class="col-12">
                                        <h5 style="font-size: 12px;">Blog</h5>
                                    </div>
                                    <div class="col-12 self-muted">
                                        <p style="font-size:10px">Shopping Guides & Insights</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-1"></div>
            
            
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-white text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mx-5">
            <hr class="height: 5px;" />
                <div class="row">
                    <div class="col-12">
                        <p><i class="far fa-check-circle mr-2"></i>Any questions or suggestions ? Please let us know.</p>
                    </div>
                    <div class="col-12">
                    <div class="text-center">
                        <ul class="list-inline mb-0">
                            @if ( get_setting('payment_method_images') !=  null )
                                @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                                    <li class="list-inline-item">
                                        <img src="{{ uploaded_asset($value) }}" height="30" class="mw-100 h-auto" style="max-height: 30px">
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-inline my-3 social colored text-center">
                            @if ( get_setting('facebook_link') !=  null )
                            <li class="list-inline-item">
                                <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"><i class="lab la-facebook-f"></i></a>
                            </li>
                            @endif
                            @if ( get_setting('twitter_link') !=  null )
                            <li class="list-inline-item">
                                <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"><i class="lab la-twitter"></i></a>
                            </li>
                            @endif
                            @if ( get_setting('instagram_link') !=  null )
                            <li class="list-inline-item">
                                <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"><i class="lab la-instagram"></i></a>
                            </li>
                            @endif
                            @if ( get_setting('youtube_link') !=  null )
                            <li class="list-inline-item">
                                <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"><i class="lab la-youtube"></i></a>
                            </li>
                            @endif
                            @if ( get_setting('linkedin_link') !=  null )
                            <li class="list-inline-item">
                                <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"><i class="lab la-linkedin-in"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="text-center" current-verison="{{get_setting("current_version")}}">
                            @php
                                echo get_setting('frontend_copyright_text');
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top">
    <div class="d-flex justify-content-around align-items-center">
        <a href="{{ route('home') }}" class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['home'],'bg-soft-primary')}}">
            <i class="las la-home la-2x"></i>
        </a>
        <a href="{{ route('categories.all') }}" class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['categories.all'],'bg-soft-primary')}}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-list-ul la-2x"></i>
            </span>
        </a>
        <a href="{{ route('cart') }}" class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['cart'],'bg-soft-primary')}}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-shopping-cart la-2x"></i>
                @if(Session::has('cart'))
                    <span class="badge badge-circle badge-primary position-absolute absolute-top-right" id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                @else
                    <span class="badge badge-circle badge-primary position-absolute absolute-top-right" id="cart_items_sidenav">0</span>
                @endif
            </span>
        </a>
        @if (Auth::check())
            @if(isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="text-reset flex-grow-1 text-center py-2">
                    <span class="avatar avatar-sm d-block mx-auto">
                        @if(Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                        @endif
                    </span>
                </a>
            @else
                <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-side-nav-thumb" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
                    <span class="avatar avatar-sm d-block mx-auto">
                        @if(Auth::user()->photo != null)
                            <img src="{{ custom_asset(Auth::user()->avatar_original)}}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                        @endif
                    </span>
                </a>
            @endif
        @else
            <a href="{{ route('user.login') }}" class="text-reset flex-grow-1 text-center py-2">
                <span class="avatar avatar-sm d-block mx-auto">
                    <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                </span>
            </a>
        @endif
    </div>
</div>
@if (Auth::check() && !isAdmin())
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            @include('frontend.inc.user_side_nav')
        </div>
    </div>
@endif
