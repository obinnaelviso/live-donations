<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.js"></script>
<script src="/js/bootstrap.min.js"></script>
<!-- <script src="vendors/lightbox/simpleLightbox.min.js"></script> -->
<script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<!-- <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script> -->
<script src="/vendors/isotope/isotope-min.js"></script>
<script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/js/jquery.ajaxchimp.min.js"></script>
<!-- <script src="vendors/counter-up/jquery.waypoints.min.js"></script> -->
<!-- <script src="vendors/flipclock/timer.js"></script> -->
<!-- <script src="vendors/counter-up/jquery.counterup.js"></script> -->
<script src="/js/mail-script.js"></script>
<script src="/js/custom.js"></script>
<script type="module" src="/vendors/countUp/countUp.min.js"></script>
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '53523ae3e060943d82a185a41d7ba73b17565a09';
    window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
</script>
@yield('moreJS')
