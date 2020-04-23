<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">About Life Saving Foundation</h6>
                    <p>
                        {{ substr(array_key_exists('about', $about) ? $about['about'] : '', 0, 200) }}...
                    </p>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Newsletter</h6>
                    <p>Stay updated with our latest trends</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="#"
                         method="get" class="subscribe_form relative">
                            <div class="input-group d-flex flex-row">
                                <input name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
                                 required="" type="email">
                                <button class="btn sub-btn">
                                    <span class="lnr lnr-arrow-right"></span>
                                </button>
                            </div>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                {{-- <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title">Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="f_social">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-dribbble"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-behance"></i>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="/">{{ config('app.name') }}</a> All rights reserved | <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
<!--================ End Footer Area  =================-->



<!-- Optional JavaScript -->
@include('layouts.js')
