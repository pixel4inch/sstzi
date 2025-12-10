class FooterComponent extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
      
         <!-- start footer -->
        <footer class="pt-5 pb-5 sm-pt-40px sm-pb-45px footer-dark bg-extra-medium-slate-blue"> 
            <div class="container">
                <div class="row justify-content-center">
                    <!-- start footer column -->
                    <div class="col-lg-3 col-sm-6 last-paragraph-no-margin order-5 order-sm-4 order-lg-1 text-center">
                        <a href="index.html" class="footer-logo mb-6px d-block d-lg-inline-block"><img src="img/mainlogofooter.png" data-at2x="images/demo-business-logo-white@2x.png" alt=""></a>
                        <p class="w-90 sm-w-100 d-inline-block mb-6px text-left lh-20 fs-14">1#5-22, first floor,<br/> Road No: 2/A, <br/> Near Gokul plots Signal,<br/> KPHB Colony, Hyderabad.500085.</p>
                        
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-5 col-lg-2 col-sm-4 md-mb-50px sm-mb-30px order-1 order-lg-2">
                        <span class="alt-font d-block text-white mb-5px">Company</span>
                        <ul>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="partners.html">Partner</a></li>
                            <li><a href="careers.html">Careers</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->  
                    <!-- start footer column -->
                    <div class="col-7 col-lg-2 col-sm-4 md-mb-50px sm-mb-30px order-2 order-lg-3">
                        <span class="alt-font d-block text-white mb-5px">Services</span>
                        <ul>
                            <li><a href="javascript:valid(0)">Commerical</a></li>
                            <li><a href="javascript:valid(0)">Residential</a></li>
                            <li><a href="javascript:valid(0)">Renewable-Energy</a></li>
                            <li><a href="javascript:valid(0)">Tenants</a></li>
                            <li><a href="javascript:valid(0)">Mining</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-5 col-lg-2 col-sm-4 md-mb-50px sm-mb-30px order-3 order-lg-4">
                        <span class="alt-font d-block text-white mb-5px">Social connect</span>
                        <ul>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-facebook icon-very-small text-white me-9px" style="user-select: auto;"></i> Facebook</a></li>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-linkedin icon-very-small text-white me-9px" style="user-select: auto;"></i> LinkedIn</a></li>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-twitter icon-very-small text-white me-9px" style="user-select: auto;"></i> Twitter</a></li>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-instagram icon-very-small text-white me-9px" style="user-select: auto;"></i> Instagram</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-7 col-lg-3 col-sm-6 xs-mb-30px last-paragraph-no-margin order-4 order-sm-5 order-lg-5"> 
                        <span class="alt-font d-block text-white mb-5px">Location</span>
                        <div class="widget-content">
                      <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3805.394498257088!2d78.37973067578066!3d17.48867179987826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDI5JzE5LjIiTiA3OMKwMjInNTYuMyJF!5e0!3m2!1sen!2sin!4v1741335535345!5m2!1sen!2sin"
                        width="100%"
                        height="100%"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                      ></iframe>
                    </div>
                    </div>
                    <!-- end footer column -->
                </div>
            </div> 
        </footer>
        <!-- end footer -->
        <!-- start sticky column -->
        <div class="sticky-wrap z-index-1 d-none  d-xl-inline-block" data-animation-delay="100" data-shadow-animation="true">
            <span class="fs-15 fw-500"><i class="feather icon-feather-mail icon-small me-10px align-middle"></i>SS TZIGANE INDIA PVT.LTD? — <a href="contact.html" class="text-decoration-line-bottom fw-600">Get started now</a></span>
        </div>
        <!-- end sticky column -->
         <!-- start scroll progress -->
        <div class="scroll-progress  d-xxl-block">
          <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
          </a>
        </div>
        <!-- end scroll progress -->

  
      `;
    }
}

customElements.define('footer-component', FooterComponent);


