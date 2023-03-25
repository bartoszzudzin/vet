const barBtn = document.getElementById("menuBtn");
const sideMenu = document.querySelector(".side-menu");
const curtain = document.querySelector(".curtain");

barBtn.addEventListener("click", function(){
    sideMenu.classList.toggle("active");
    curtain.classList.toggle("active");
    barBtn.classList.toggle("active");
})
curtain.addEventListener("click", function(){
    sideMenu.classList.toggle("active");
    curtain.classList.toggle("active");
    barBtn.classList.toggle("active");
})

