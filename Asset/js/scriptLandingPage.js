const togglebtn = document.getElementById("toggle");
const menudropdown = document.getElementsByClassName("menudropdown");
let click = 0;
function matchmedia() {
    if (windows.matches) {
        togglebtn.onclick = function () {
            if (click == 0) {
                togglebtn.className = "fa-solid fa-x fa-xl";
                menudropdown[0].style.display = 'flex';
                click = 1;
            } else {
                togglebtn.className = "fa-solid fa-bars fa-xl";
                menudropdown[0].style.display = 'none';
                click = 0;
            }
        }
    } else {
        togglebtn.className = "fa-solid fa-bars fa-xl";
        menudropdown[0].style.display = 'none';
        click = 0;
    }
}
let windows = window.matchMedia("(max-width: 1100px)")
matchmedia(windows);
windows.addListener(matchmedia)