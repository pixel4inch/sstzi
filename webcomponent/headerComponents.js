class HeaderComponent extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
            <header> 
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg header-transparent  bg-white  header-reverse" data-header-hover="light">
                <div class="container-fluid">
                    <div class="col-auto col-xxl-3 col-lg-3 me-lg-0 me-auto">
                        <a class="navbar-brand" href="index.html">
                            <img src="img/logo_main.png" data-at2x="img/logo_main.png" alt="" class="default-logo">
                            <img src="img/logo_main.png" data-at2x="img/logo_main.png" alt="" class="alt-logo">
                            <img src="img/logo_main.png" data-at2x="img/logo_main.png" alt="" class="mobile-logo"> 
                        </a>
                    </div>
                    <div class="col-auto menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav"> 
                            <ul class="navbar-nav alt-font"> 
                                <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                                <li class="nav-item dropdown dropdown-with-icon-style02">
                                    <a href="javascript:valid(0)" class="nav-link">Projects</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle text-dark" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                        <li><a href="javascrip:valid(0)">Project-1</a></li>
                                        <li><a href="javascrip:valid(0)">Project-2</a></li>
                                        <li><a href="javascrip:valid(0)">Project-3</a></li>
                                        <li><a href="javascrip:valid(0)">Project-4</a></li>
                                        <li><a href="javascrip:valid(0)">Project-5</a></li>
                                        <li><a href="javascrip:valid(0)">Project-6</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown dropdown-with-icon-style02">
                                    <a href="service.html" class="nav-link">Service</a>
                                    <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                                        <li><a href="javascrip:valid(0)">Service-1</a></li>
                                        <li><a href="javascrip:valid(0)">Service-2</a></li>
                                        <li><a href="javascrip:valid(0)">Service-3</a></li>
                                        <li><a href="javascrip:valid(0)">Service-4</a></li>
                                        <li><a href="javascrip:valid(0)">Service-5</a></li>
                                        <li><a href="javascrip:valid(0)">Service-6</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="profile.html" class="nav-link">Profile</a></li>
                                <li class="nav-item"><a href="careers.html" class="nav-link">Careers</a></li>
                                <li class="nav-item"><a href="contact.html" class="nav-link">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-xxl-2 col-lg-3 text-end d-none d-sm-flex">
                        <div class="header-icon">
                            <div class="d-none d-xxl-inline-block me-25px xxl-me-10px"><div class="alt-font fs-15 xl-fs-13 widget-text fw-500"></div></div>
                            <div class="header-button"><a href="getquote.html" class="btn btn-small btn-rounded btn-base-color btn-box-shadow me-15px">Get a quote</a></div>
                        </div>  
                    </div>
                </div>
            </nav>
            <!-- end navigation -->
        </header>
        `;
    
    }

}

customElements.define("header-component", HeaderComponent);










