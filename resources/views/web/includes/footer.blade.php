<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="index.html">
                    <img src="{{ asset($mediumlogo) }}" alt="Footer logo" class="footer_logo">
                </a>
                <p class="footer_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="social_link">
                        <img src="assets/web/images/icon_fb.png" alt="social icons" class="img-icon">
                    </a>
                    <a href="#" class="social_link">
                        <img src="assets/web/images/icon_tw.png" alt="social icons" class="img-icon">
                    </a>
                    <a href="#" class="social_link">
                        <img src="assets/web/images/icon_li.png" alt="social icons" class="img-icon">
                    </a>
                    <a href="#" class="social_link">
                        <img src="assets/web/images/icon_ig.png" alt="social icons" class="img-icon">
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-lg-5">
                <div class="ms-lg-5">
                    <div class="footer_heading">main links</div>
                    <div class="footer_links">
                        <a href="index.html" class="footer_link">home</a>
                        <a href="#" class="footer_link">membership</a>
                        <a href="#" class="footer_link">volunteers</a>
                        <a href="#" class="footer_link">sectors</a>
                        <a href="#" class="footer_link">impact page</a>
                        <a href="#" class="footer_link">financial support</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-lg-5">
                <div class="footer_heading">contact</div>
                <div class="footer_links">
                    <div class="contact_media">
                        <div class="icon">
                            <img src="assets/web/images/icon_phone.png" alt="phone" class="img-fluid">
                        </div>
                        <div class="text">
                            <a href="tel:4065550120">(406) 555-0120</a>
                        </div>
                    </div>
                    <div class="contact_media">
                        <div class="icon">
                            <img src="assets/web/images/icon_email.png" alt="phone" class="img-fluid">
                        </div>
                        <div class="text">
                            <a href="mailto:castnetdummy@gmail.com">castnetdummy@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact_media">
                        <div class="icon">
                            <img src="assets/web/images/icon_map.png" alt="phone" class="img-fluid">
                        </div>
                        <div class="text">11580 State Route 44 #1016 Mantua, OH 44255 United States</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mt-lg-5">
                <div class="footer_heading text-uppercase">our newsletter</div>
                <form action="#">
                    <input type="text" class="form-control" placeholder="Your Email Address">
                    <button type="submit" class="btn btn-submit">subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="text-center text-lg-start fw-light fs-5">&copy; Copyright 2023 international chamber of Commerce. All rights reserved</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-center text-lg-end fw-light fs-5">Designed &amp; Developed by <a href="https://leadconcept.com/" target="_blank">LEADconcept</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Modal Start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row gx-4">
                    <div class="col-lg-5 text-center text-lg-start">
                        <img src="{{ asset($largelogo) }}" alt="logo" class="img-logo">
                    </div>
                    <div class="col-lg-7">
                        <h2 class="modal-title">castnet purpose</h2>
                        <p class="modal-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <p class="modal-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span>get started</span>
                            <img src="assets/web/images/icon_arrow_alt.png" alt="arrow">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->
<!-- REQUIRED SCRIPTS -->

@include('web.includes.script')
