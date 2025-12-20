class FooterComponent extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
      
         <!-- start footer -->
        <footer class="pt-2 pb-2 sm-pt-10px sm-pb-10px footer-dark bg-extra-medium-slate-blue"> 
            <div class="container">
                <div class="row justify-content-center">
                    <!-- start footer column -->
                    <div class="col-lg-3 col-sm-6 last-paragraph-no-margin order-5 order-sm-4 order-lg-1 text-center">
                        <a href="index.html" class="footer-logo mb-6px d-block d-lg-inline-block"><img src="img/mainlogofooter.png" data-at2x="img/mainlogofooter.png" alt=""></a>
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
                            <li><a href="commerical.html">Commerical</a></li>
                            <li><a href="residential.html">Residential</a></li>
                            <li><a href="renewable.html">Renewable-Energy</a></li>
                           <li><a href="mining.html">Mining</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-5 col-lg-2 col-sm-4 md-mb-50px sm-mb-30px order-3 order-lg-4">
                        <span class="alt-font d-block text-white mb-5px">Social connect</span>
                        <ul>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-facebook icon-very-small text-white me-12px" "></i> Facebook</a></li>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-linkedin icon-very-small text-white me-12px" "></i> LinkedIn</a></li>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-twitter icon-very-small text-white me-12px" "></i> Twitter</a></li>
                            <li><a href="javascript:valid(0)" target="_blank"><i class="feather icon-feather-instagram icon-very-small text-white me-12px" "></i> Instagram</a></li>
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

            <div class="border-top border-color-transparent-white-light pt-35px pb-35px text-center mt-5">
                    <span class="fs-15 w-60 lg-w-70 md-w-100 d-block mx-auto lh-22">Copyright © 2025 | Powered by SSTzigane</span>
            </div>
        </footer>
        <!-- end footer -->
        <!-- start sticky column -->
        <!---div class="sticky-wrap z-index-1 d-none  d-xl-inline-block" data-animation-delay="100" data-shadow-animation="true">
            <span class="fs-15 fw-500">SS TZIGANE INDIA PVT.LTD? — <i class="feather icon-feather-file icon-small me-10px align-middle"></i><a href="./img/SStzigane.pdf" class="text-decoration-line-bottom fw-600">Download 
Brochure</a></span>
        </div-->
        <!-- end sticky column -->
         <!-- start scroll progress -->
        <div class="scroll-progress  d-xxl-block">
          <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
          </a>
        </div>
        <!-- end scroll progress -->

        <a id="wa-fab" href="#" aria-label="Chat on WhatsApp" target="_blank" rel="noopener noreferrer">
             <i class="fab fa-whatsapp"></i>
        </a>        

<div id="wa-tooltip" role="status" aria-hidden="true">Chat with us on WhatsApp</div>
  
      `;
    }
}

customElements.define('footer-component', FooterComponent);



  (function(){
    const phone = "918885333539"; // international format without +
    const text  = "Hello%20I%20want%20to%20know%20more"; // URL-encoded
    const fab = document.getElementById("wa-fab");
    const tip = document.getElementById("wa-tooltip");

    // Detect mobile
    const isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    // Choose appropriate link
    const url = isMobile
      ? `whatsapp://send?phone=${phone}&text=${text}`       // opens WhatsApp mobile app
      : `https://web.whatsapp.com/send?phone=${phone}&text=${text}`; // opens WhatsApp Web

    fab.setAttribute("href", url);

    // Show tooltip on hover for desktop
    fab.addEventListener("mouseenter", () => { if(!isMobile) tip.style.display = "block"; });
    fab.addEventListener("mouseleave", () => { if(!isMobile) tip.style.display = "none"; });

    // On mobile, fallback to wa.me if whatsapp:// can't open
    fab.addEventListener("click", (e) => {
      if(isMobile){
        // Some mobile browsers disallow whatsapp:// — ensure fallback after short delay
        setTimeout(()=> {
          // If page not hidden (meaning app didn't open), fallback to wa.me
          if (!document.hidden) {
            window.location.href = `https://wa.me/${phone}?text=${text}`;
          }
        }, 800);
      }
    });
  })();