var btnMenu = document.getElementById('btnmenu');
//console.log(btnMenu);
//console.log("Hola");
var menu = document.getElementById('menu');
//console.log(menu);
btnMenu.addEventListener("click", function () {
    "use strict";
    menu.classList.toggle("mostrar");
});