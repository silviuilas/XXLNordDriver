AOS.init();

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (!(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50)) {
    document.getElementsByClassName("desktop-nav")[0].style.backgroundColor = "rgba(0,0,0,0)";
    document.getElementsByClassName("desktop-nav")[0].getElementsByTagName("img")[0].style.opacity = "0%";
    document.getElementsByClassName("mobile-nav-head")[0].style.backgroundColor = "rgba(0,0,0,0)";
    document.getElementsByClassName("mobile-nav-head")[0].getElementsByTagName("img")[0].style.opacity = "0%";
  } else {
    document.getElementsByClassName("desktop-nav")[0].style.backgroundColor = "white";
    document.getElementsByClassName("desktop-nav")[0].getElementsByTagName("img")[0].style.opacity = "100%";
    document.getElementsByClassName("mobile-nav-head")[0].style.backgroundColor = "white";
    document.getElementsByClassName("mobile-nav-head")[0].style.filter = "brightness(100%)";
    document.getElementsByClassName("mobile-nav-head")[0].getElementsByTagName("img")[0].style.opacity = "100%";
  }
}

scrollFunction();
