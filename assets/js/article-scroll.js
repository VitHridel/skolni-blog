window.onscroll = function() {scroll()};

var articleMenu = document.getElementById("article-menu");
var sticky = articleMenu.offsetTop;

function scroll() {
  if (window.pageYOffset > sticky) {
    articleMenu.classList.add("sticky");
  } else {
    articleMenu.classList.remove("sticky");
  }
}

var articleMenuItems = document.querySelectorAll('.menu-section')

function scrollOn() {
    let select = document.getElementById(this.id).id
    let section = document.getElementById('scroll-'+select)
    if (select === 'IT') {
        section.scrollIntoView({behavior: "smooth", block: "end"})
    } else {
    section.scrollIntoView({behavior: "smooth", block: "start"})
    }
}

articleMenuItems.forEach(item => {
    item.addEventListener('click', scrollOn)
})