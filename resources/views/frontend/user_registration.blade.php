@extends('frontend.layouts.app')

@section('content')
    <section class="gry-bg py-4">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                        <div class="card">
                            <div class="text-center pt-4">
                                <h1 class="h4 fw-600">
                                    {{ translate('Create an account.')}}
                                </h1>
                            </div>
                            <div class="px-4 py-3 py-lg-4">
                                <div class="">
                                    <form id="reg-form" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Full Name') }}" name="name">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        @if (\App\Addon::where('unique_identifier', 'otp_system')->first() != null && \App\Addon::where('unique_identifier', 'otp_system')->first()->activated)
                                            <div class="form-group phone-form-group mb-1">
                                                <input type="tel" id="phone-code" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="" name="phone" autocomplete="off">
                                            </div>

                                            <input type="hidden" name="country_code" value="">

                                            <div class="form-group email-form-group mb-1 d-none">
                                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email"  autocomplete="off">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group text-right">
                                                <button class="btn btn-link p-0 opacity-50 text-reset" type="button" onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{  translate('Password') }}" name="password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="{{  translate('Confirm Password') }}" name="password_confirmation">
                                        </div>

                                        @if(get_setting('google_recaptcha') == 1)
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="aiz-checkbox">
                                                <input type="checkbox" name="checkbox_example_1" required>
                                                <span class=opacity-60>{{ translate('By signing up you agree to our terms and conditions.')}}</span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>

                                        <div class="mb-1">
                                            <button type="submit" class="btn btn-primary btn-block fw-600">{{  translate('Create Account') }}</button>
                                        </div>
                                        <div class="mb-5">
                                            <button id="regPhone" type="button" class="btn btn-primary btn-block fw-600">{{  translate('Register with phone') }}</button>
                                        </div>
                                    </form>
                                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                                        <div class="separator mb-3">
                                            <span class="bg-white px-3 opacity-60">{{ translate('Or Join With')}}</span>
                                        </div>
                                        <ul class="list-inline social colored text-center mb-5">
                                            @if (get_setting('facebook_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                                        <i class="lab la-facebook-f"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if(get_setting('google_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                                        <i class="lab la-google"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (get_setting('twitter_login') == 1)
                                                <li class="list-inline-item">
                                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                                        <i class="lab la-twitter"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="text-muted mb-0">{{ translate('Already have an account?')}}</p>
                                    <a href="{{ route('user.login') }}">{{ translate('Log In')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="reg-form-phone" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                @csrf     
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Phone OTP</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input id="phonee" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" placeholder="{{  translate('Phone number') }}" name="phonee" pattern="[0-9]+">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <button id="regPhonereg" type="submit" class="btn btn-primary">Send code</button>
                            </div>
                        </div>
                    </div>      
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="reg-form-phone2" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                @csrf     
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Code</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-body">
                                <div class="form-group">
                                <input id="phoneVer" type="text" class="form-control{{ $errors->has('otp') ? ' is-invalid' : '' }}" value="{{ old('otp') }}" placeholder="{{  translate('Verification code') }}" name="phone" pattern="[0-9]+" style="display: none;">
                                    <input type="text" class="form-control{{ $errors->has('otp') ? ' is-invalid' : '' }}" value="{{ old('otp') }}" placeholder="{{  translate('Verification code') }}" name="code" pattern="[0-9]+">
                                    @if ($errors->has('otp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('otp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <button id="regPhonerege" type="submit" class="btn btn-primary">Verify!</button>
                            </div>
                        </div>
                    </div>      
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="reg-form-phone3" class="form-default" role="form" action="{{ route('register') }}" method="POST">
                @csrf     
                    <div class="row">
                        <div class="col-12">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><span style="color:greenyellow;">Verefied!</span> Final Registeration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input id="phoneVer2" type="text" class="form-control{{ $errors->has('otp') ? ' is-invalid' : '' }}" value="{{ old('otp') }}" placeholder="{{  translate('Verification code') }}" name="phone" pattern="[0-9]+" style="display: none;">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="{{  translate('Name') }}" name="name" +">
                                    
                                    @if ($errors->has('otp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('otp') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" placeholder="{{  translate('Password') }}" name="password" ">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="{{  translate('Confirm Password') }}" name="password_confirmation">
                                </div>
                                <div class="mb-3">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" name="checkbox_example_1" required>
                                        <span class=opacity-60>{{ translate('By signing up you agree to our terms and conditions.')}}</span>
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-footer">
                                <button id="regPhonereger" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>      
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @if(get_setting('google_recaptcha') == 1)
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <script type="text/javascript">

        @if(get_setting('google_recaptcha') == 1)
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            // alert('helloman');
            
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are human!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        @endif
        $(document).ready(function(){
            $("#regPhone").on("click",function(e){
                e.preventDefault();

                $('#exampleModal').modal({backdrop: 'static',
            keyboard: false,show:true})
            })
            $("#regPhonereg").on("click",function(e){
                e.preventDefault();

                var phoneNum = $("#phonee").val();
                if(phoneNum.length < 6){
                    alert("invalid phone");
                }else{
                    let data = $('#reg-form-phone').serialize();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{route('registerphone')}}",
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            if(response == '1'){
                                $("#phoneVer").val(phoneNum);
                                $('#exampleModal').modal('toggle')
                                $('#exampleModal2').modal({backdrop: 'static',keyboard: false,show:true})
                            }else{
                                alert('Faced some problem during registration.');
                            }
                        }
                    });
                    
           
                }
            })
            $("#regPhonerege").on("click",function(e){
                e.preventDefault();

                let data = $('#reg-form-phone2').serialize();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('verifyphone')}}",
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        if(response = '1'){
                            $("#phoneVer2").val($("#phoneVer").val());
                            $('#exampleModal2').modal('toggle')
                            $('#exampleModal3').modal({backdrop: 'static',keyboard: false,show:true})
                        }else{
                            alert('Faced some problem during registration.');
                        }
                    }
                });
            })
            
        })
        var isPhoneShown = true,
            countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if(country.iso2 == 'bd'){
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php echo json_encode(\App\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if(selectedCountryData.iso2 == 'bd'){
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            // var currentMask = e.currentTarget.placeholder;

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

        });

        function toggleEmailPhone(el){
            if(isPhoneShown){
                $('.phone-form-group').addClass('d-none');
                $('.email-form-group').removeClass('d-none');
                isPhoneShown = false;
                $(el).html('{{ translate('Use Phone Instead') }}');
            }
            else{
                $('.phone-form-group').removeClass('d-none');
                $('.email-form-group').addClass('d-none');
                isPhoneShown = true;
                $(el).html('{{ translate('Use Email Instead') }}');
            }
        }
    </script>
@endsection
