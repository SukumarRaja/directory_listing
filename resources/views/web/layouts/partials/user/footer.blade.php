<footer id="footer" class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="row">

                <div class="col-lg-5">
                    <div class="footer__top__info">
                        <a title="{{ __('logo') }}" href="#" class="footer__top__info__logo"><img src="http://localhost/golo/public/assets/images/assets/logo.png" alt="{{ __('logo') }}"></a>
                        <p class="footer__top__info__desc">{{ __('Discover amazing things to do everywhere you go.') }}</p>
                        <div class="footer__top__info__app">
                            <a title="{{ __('App Store') }}" href="#" class="banner-apps__download__iphone"><img src="http://localhost/golo/public/assets/images/app-store.png" alt="{{ __('App Store') }}"></a>
                            <a title="{{ __('Google Play Store') }}" href="#" class="banner-apps__download__android"><img src="http://localhost/golo/public/assets/images/google-play.png" alt="{{ __('Google Play Store') }}"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <aside class="footer__top__nav">
                        <h3>{{ __('Company') }}</h3>
                        <ul>
                            <li><a href="#">{{ __('About Us') }}</a></li>
                            <li><a href="#">{{ __('Blog') }}</a></li>
                            <li><a href="#">{{ __('Faqs') }}</a></li>
                            <li><a href="#">{{ __('Contact') }}</a></li>
                        </ul>
                    </aside>
                </div>

                <div class="col-lg-2">
                    <aside class="footer__top__nav">
                        <h3>{{ __('Support') }}</h3>
                        <ul>
                            <li><a href="#">{{ __('Get in Touch') }}</a></li>
                            <li><a href="#">{{ __('Help Center') }}</a></li>
                            <li><a href="#">{{ __('Live chat') }}</a></li>
                            <li><a href="#">{{ __('How it works') }}</a></li>
                        </ul>
                    </aside>
                </div>

                <div class="col-lg-3">
                    <aside class="footer__top__nav footer__top__nav--contact">
                        <h3>{{ __('Contact Us') }}</h3>
                        <p>{{ __('Email: support@domain.com') }}</p>
                        <p>{{ __('Phone: 1 (00) 832 2342') }}</p>
                        <ul>
                            <li class="facebook">
                                <a title="{{ __('Facebook') }}" href="#">
                                    <i class="la la-facebook-f"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a title="{{ __('Twitter') }}" href="#">
                                    <i class="la la-twitter"></i>
                                </a>
                            </li>
                            <li class="youtube">
                                <a title="{{ __('Youtube') }}" href="#">
                                    <i class="la la-youtube"></i>
                                </a>
                            </li>
                            <li class="instagram">
                                <a title="{{ __('Instagram') }}" href="#">
                                    <i class="la la-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>

            </div>
        </div><!-- .top-footer -->

        <div class="footer__bottom">
            <p class="footer__bottom__copyright">{{ now()->year }} &copy; <a href="#" target="_blank">{{ __('UxPer') }}</a>. {{ __('All rights reserved.') }}</p>
        </div><!-- .top-footer -->
    </div><!-- .container -->
</footer><!-- site-footer -->
</div>