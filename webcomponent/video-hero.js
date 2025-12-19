class VideoHero extends HTMLElement {
  static get observedAttributes() {
    return ["title"];
  }

  connectedCallback() {
    this.render();
  }

  attributeChangedCallback() {
    this.render();
  }

  render() {
    const titleText = this.getAttribute("title") || "SS Tzigane";

    this.innerHTML = `
      <section class="page-title-big-typography bg-dark-gray ipad-top-space-margin position-relative overflow-hidden"
        data-parallax-background-ratio="0.5">

        <!-- Background Video -->
        <video autoplay muted loop playsinline
          class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" style="margin-top:0px">
          <source src="img/SsTziganeIntro.mp4" type="video/mp4">
        </video>

        <!-- Overlay -->
        <div class="opacity-medium bg-dark-slate-blue position-absolute top-0 start-0 w-100 h-100"></div>

        <div class="container position-relative">
          <div class="row align-items-center justify-content-center extra-tovery-small-screen">
            <div class="col-12 position-relative text-center page-title-extra-large">
              <h3 class="m-auto text-white text-shadow-double-large fw-500 ">
                ${titleText}
              </h3>
            </div>

            <div class="down-section text-center"
              data-anime='{
                "translateY":[-15,0],
                "opacity":[0,1],
                "duration":600,
                "delay":0,
                "staggervalue":300,
                "easing":"easeOutQuad"
              }'>
              <a href="#down-section" aria-label="scroll down" class="section-link">
                <div class="d-flex justify-content-center align-items-center mx-auto rounded-circle fs-30 text-white">
                  <i class="feather icon-feather-chevron-down"></i>
                </div>
              </a>
            </div>

          </div>
        </div>
      </section>
    `;
  }
}

customElements.define("video-hero", VideoHero);
