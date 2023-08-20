<header id="header" class="site-header">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6 col-8">
                <div class="site">

                    <div class="site__menu">
                        <a href="#" class="site__menu__icon">
                            <i class="las la-bars la-24-black"></i>
                        </a>

                        <div class="popup-background"></div>

                        <div class="popup popup--left">
                            <a href="#" class="popup__close">
                                <i class="las la-times la-24-black"></i>
                            </a><!-- .popup__close -->

                            <div class="popup__content">
                                @guest
                                <div class="popup__user popup__box open-form">
                                    <a href="#" class="open-login">{{ __('Login') }}</a>
                                    <a href="#" class="open-signup">{{ __('Sign Up') }}</a>
                                </div>
                                @else
                                <div class="account">
                                    <a href="#">
                                        <img src="#" alt="{{ __('Profile image') }}">
                                        <span>
                                            {{ auth()->user()->name }}
                                            <i class="la la-angle-down la-12"></i>
                                        </span>
                                    </a>
                                    <div class="account-sub">
                                        <ul>
                                            <li class="active"><a href="#">{{ __('Profile') }}</a></li>
                                            <li><a href="#">{{ __('My Places') }}</a></li>
                                            <li><a href="#">{{ __('Wishlist') }}</a></li>
                                            <li>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                <form id="logout-form" class="d-none" action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .account -->
                                @endguest
                                <div class="popup__destinations popup__box">
                                    <ul class="menu-arrow">
                                        <li>
                                            <a href="#">{{ __('Destinations') }}</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">{{ __('San Diego') }}</a></li>
                                                <li><a href="#">{{ __('New York') }}</a></li>
                                                <li><a href="#">{{ __('Los Angeles') }}</a></li>
                                                <li><a href="#">{{ __('Chicago') }}</a></li>
                                                <li><a href="#">{{ __('San Francisco') }}</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div><!-- .popup__destinations -->

                                <div class="popup__menu popup__box">
                                    <ul class="menu-arrow">
                                        <li>
                                            <a href="#">{{ __('Demo') }}</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">{{ __('Restaurant') }}</a></li>
                                                <li><a href="#">{{ __('Business Listing') }}</a></li>
                                                <li><a href="#">{{ __('City Guide') }}</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('Place detail') }}</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">{{ __('Booking form') }}</a></li>
                                                <li><a href="#">{{ __('Affiliate Book Buttons') }}</a></li>
                                                <li><a href="#">{{ __('Affiliate Banner Ads') }}</a></li>
                                                <li><a href="#">{{ __('Enquiry Form') }}</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('Page') }}</a>
                                            <ul class="sub-menu">
                                                <li><a href="#">{{ __('About') }}</a></li>
                                                <li><a href="#">{{ __('404') }}</a></li>
                                                <li><a href="#">{{ __('Faqs') }}</a></li>
                                                <li><a href="#">{{ __('App Landing') }}</a></li>
                                                <li><a href="#">{{ __('Construction') }}</a></li>
                                                <li><a href="#">{{ __('Coming Soon') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">{{ __('Blog') }}</a></li>
                                        <li><a href="#">{{ __('Contact') }}</a></li>
                                    </ul>
                                </div><!-- .popup__menu -->

                            </div><!-- .popup__content -->

                            <div class="popup__button popup__box">
                                <a class="btn" href="#">
                                    <i class="la la-plus la-24"></i>
                                    <span>{{ __('Add place') }}</span>
                                </a>
                            </div><!-- .popup__button -->

                        </div><!-- .popup -->

                    </div><!-- .site__menu -->

                    <div class="site__brand">
                        <a href="#" class="site__brand__logo">
                            <img src="http://localhost/golo/public/assets/images/assets/logo.png" alt="{{ __('Logo') }}">
                        </a>
                    </div><!-- .site__brand -->

                    <div class="site__search layout-02">

                        <a href="#" class="search__close">
                            <i class="la la-times"></i>
                        </a><!-- .search__close -->

                        <form action="#" class="site-banner__search layout-02">

                            <div class="field-input">
                                <label for="input_search">{{ __('Find') }}</label>
                                <input class="site-banner__search__input open-suggestion" id="input_search" type="text" name="keyword" placeholder="{{ __('Ex: fastfood, beer') }}" autocomplete="off">
                                <input type="hidden" name="category[]" id="category_id">
                                <div class="search-suggestions category-suggestion">
                                    <ul>
                                        <li><a href="#"><span>{{ __('Loading...') }}</span></a></li>
                                    </ul>
                                </div>
                            </div><!-- .site-banner__search__input -->

                            <div class="field-input">
                                <label for="location_search">{{ __('Where') }}</label>
                                <input class="site-banner__search__input open-suggestion" id="location_search" type="text" name="city_name" placeholder="{{ __('Your city') }}" autocomplete="off">
                                <input type="hidden" id="city_id">
                                <div class="search-suggestions location-suggestion">
                                    <ul>
                                        <li><a href="#"><span>{{ __('Loading...') }}</span></a></li>
                                    </ul>
                                </div>
                            </div><!-- .site-banner__search__input -->

                            <div class="field-submit">
                                <button><i class="las la-search la-24-black"></i></button>
                            </div>

                        </form><!-- .site-banner__search -->

                    </div>

                </div><!-- .site -->

            </div><!-- .col-md-6 -->

            <div class="col-md-6 col-4">
                <div class="right-header align-right">

                    <div class="right-header__languages">
                        <a href="#">
                            <img src="http://localhost/golo/public/assets/images/flags/en.png">
                            <i class="las la-angle-down la-12-black"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="http://localhost/golo/public/language/fr">
                                    <img src="http://localhost/golo/public/assets/images/flags/fr.png">{{ __('French') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="right-header__destinations">
                        <a href="#">
                            {{ __('Destinations') }}
                            <i class="las la-angle-down la-12-black"></i>
                        </a>
                        <ul>
                            <li><a href="#">{{ __('San Diego') }}</a></li>
                            <li><a href="#">{{ __('New York') }}</a></li>
                            <li><a href="#">{{ __('Los Angeles') }}</a></li>
                            <li><a href="#">{{ __('Chicago') }}</a></li>
                            <li><a href="#">{{ __('San Francisco') }}</a></li>
                        </ul>
                    </div><!-- .right-header__destinations -->

                    @guest
                    <div class="right-header__login">
                        <a class="open-login" href="#">{{ __('Login') }}</a>
                    </div><!-- .right-header__login -->

                    <div class="popup popup-form">

                        <a href="#" class="popup__close">
                            <i class="las la-times la-24-black"></i>
                        </a><!-- .popup__close -->

                        <ul class="choose-form">
                            <li class="nav-login"><a href="#login">{{ __('Login') }}</a></li>
                            <li class="nav-signup"><a href="#register">{{ __('Sign Up') }}</a></li>
                        </ul>

                        <p class="choose-more">
                            {{ __('Continue with') }} <a class="fb" href="#">{{ __('Facebook') }}</a> {{ __('or') }} <a class="gg" href="#">{{ __('Google') }}</a>
                        </p>

                        <p class="choose-or"><span>{{ __('Or') }}</span></p>

                        <div class="popup-content">

                            <form id="login" class="form-log form-content" action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="field-input">
                                    <input class="is-invalid" type="text" id="email" name="email" placeholder="{{ __('Email Address') }}" required>
                                </div>

                                <div class="field-input">
                                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}" required>
                                </div>

                                <div class="choose-form mb-0">
                                    <a class="forgot_pass" href="#forgot_password">{{ __('Forgot password') }}</a>
                                </div>

                                <button type="submit" class="gl-button btn button w-100" id="submit_login">{{ __('Login') }}</button>
                            </form>

                            <form id="register" class="form-sign form-content" action="{{ route('register') }}" method="POST">
                                @csrf

                                <small class="form-text text-danger golo-d-none" id="register_error">{{ __('error!') }}</small>

                                <div class="field-input">
                                    <input type="text" id="register_name" name="name" placeholder="{{ __('Full Name') }}" required>
                                </div>

                                <div class="field-input">
                                    <input type="email" id="register_email" name="email" placeholder="{{ __('Email') }}" required>
                                </div>

                                <div class="field-input">
                                    <input type="password" id="register_password" name="password" placeholder="{{ __('Password') }}" required>
                                </div>

                                <div class="field-input">
                                    <input type="password" id="register_password_confirmation" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                </div>

                                <div class="field-check">
                                    <label for="accept">
                                        <input type="checkbox" id="accept" checked required>
                                        {{ __('Accept the') }} <a href="#">{{ __('Terms') }}</a> {{ __('and') }} <a
                                            href="#">{{ __('Privacy Policy') }}</a>
                                        <span class="checkmark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="6" viewBox="0 0 8 6">
                                                <path fill="#FFF" fill-rule="nonzero" d="M2.166 4.444L.768 3.047 0 3.815 1.844 5.66l.002-.002.337.337L7.389.788 6.605.005z" />
                                            </svg>
                                        </span>
                                    </label>
                                </div>

                                <button type="submit" class="gl-button btn button w-100" id="submit_register">{{ __('Signup') }}</button>
                            </form>

                            <form id="forgot_password" class="form-forgotpass form-content" action="#" method="POST">
                                @csrf

                                <p class="choose-or"><span>{{ __('Lost your password? Please enter your email address. You will receive a link to create a new password via email.') }}</span></p>
                                <small class="form-text text-danger golo-d-none" id="fp_error">{{ __('error!') }}</small>
                                <small class="form-text text-success golo-d-none" id="fp_success">{{ __('error!') }}</small>
                                <div class="field-input">
                                    <input type="text" id="email" name="email" placeholder="{{ __('Email Address') }}" required>
                                </div>
                                <button type="submit" class="gl-button btn button w-100" id="submit_forgot_password">{{ __('Forgot password') }}</button>
                            </form>

                        </div>
                    </div><!-- .popup-form -->
                    @else
                    <div class="account">
                        <a href="#">
                            <img src="#" alt="{{ auth()->user()->name }}">
                            <span>
                                {{ auth()->user()->name }}
                                <i class="la la-angle-down la-12"></i>
                            </span>
                        </a>
                        <div class="account-sub">
                            <ul>
                                <li class="active"><a href="#" target="_blank" rel="nofollow">{{ __('Dashboard') }}</a></li>
                                <li><a href="#">{{ __('Profile') }}</a></li>
                                <li><a href="#">{{ __('My Places') }}</a></li>
                                <li><a href="#">{{ __('Wishlist') }}</a></li>
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" class="d-none" action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .account -->
                    @endguest
                    <div class="right-header__search">
                        <a href="#" class="search-open">
                            <i class="las la-search la-24-black"></i>
                        </a>
                    </div>
                    <div class="right-header__button btn">
                        <a href="#">
                            <i class="las la-plus la-24-white"></i>
                            <span>{{ __('Add place') }}</span>
                        </a>
                    </div><!-- .right-header__button -->
                </div><!-- .right-header -->
            </div><!-- .col-md-6 -->

        </div><!-- .row -->
    </div><!-- .container-fluid -->
</header><!-- .site-header -->
