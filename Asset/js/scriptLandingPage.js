window.onscroll = function () { navscroll() };

let navlist = document.querySelector(".navlist");
let menu = document.querySelector('#menu-icon');
let sticky = navlist.offsetTop;

function navscroll() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('open');
}

