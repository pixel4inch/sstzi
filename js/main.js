// Back To Top Button//
const button = document.querySelector('.btn');

const displayButton = () => {
  window.addEventListener('scroll', () => {
    // console.log(window.scrollY);
  
    if (window.scrollY > 100) {
      button.style.display = "block";
    } else {
      button.style.display = "none";
    }
  });
};

const scrollToTop = () => {
  button.addEventListener("click", () => {
    window.scroll({
      top: 0,
      left: 0,
      behavior: 'smooth'
    }); 
    console.log(event);
  });
};

displayButton();
scrollToTop();


// Navbar///


const menu = document.querySelector(".menu");
const menuMain = menu.querySelector(".menu-main");
const goBack = menu.querySelector(".go-back");
const menuTrigger = document.querySelector(".mobile-menu-trigger");
const closeMenu = menu.querySelector(".mobile-menu-close");
let subMenu;
menuMain.addEventListener("click", (e) =>{
  if(!menu.classList.contains("active")){
    return;
  }
  if(e.target.closest(".menu-item-has-children")){
     const hasChildren = e.target.closest(".menu-item-has-children");
     showSubMenu(hasChildren);
  }
});
goBack.addEventListener("click",() =>{
   hideSubMenu();
})
menuTrigger.addEventListener("click",() =>{
   toggleMenu();
})
closeMenu.addEventListener("click",() =>{
   toggleMenu();
})
document.querySelector(".menu-overlay").addEventListener("click",() =>{
  toggleMenu();
})
function toggleMenu(){
  menu.classList.toggle("active");
  document.querySelector(".menu-overlay").classList.toggle("active");
}
function showSubMenu(hasChildren){
   subMenu = hasChildren.querySelector(".sub-menu");
   subMenu.classList.add("active");
   subMenu.style.animation = "slideLeft 0.5s ease forwards";
   const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
   menu.querySelector(".current-menu-title").innerHTML=menuTitle;
   menu.querySelector(".mobile-menu-head").classList.add("active");
}

function  hideSubMenu(){  
   subMenu.style.animation = "slideRight 0.5s ease forwards";
   setTimeout(() =>{
      subMenu.classList.remove("active");	
   },300); 
   menu.querySelector(".current-menu-title").innerHTML="";
   menu.querySelector(".mobile-menu-head").classList.remove("active");
}

window.onresize = function(){
  if(this.innerWidth >991){
    if(menu.classList.contains("active")){
      toggleMenu();
    }

  }
}

 // Tentas///
      $(document).ready(function () {
        $(".my-slider").slick({
          slidesToShow: 5,
          slidesToScroll: 1,
          arrows: true,
          dots: true,
          speed: 300,
          infinite: true,
          autoplaySpeed: 2000,
          autoplay: true,
          responsive: [
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 3,
              },
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
              },
            },
          ],
        });
      });
// Navbar Sticky//
