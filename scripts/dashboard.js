const triangle = document.querySelector(".triangle");
const addArticle = document.getElementById("add-article-btn");
const editArticle = document.getElementById("edit-article-btn");

const backBtn = document.getElementById("back-btn");
const backBtn2 = document.querySelector(".back-btn-second");

const buttonsSection = document.querySelector(".buttons");
const addArticleSection = document.getElementById("add-article");
const editArticleSection = document.querySelector(".edit-article");

let path = window.location.pathname;

switch(path){
    case "/cms/kontakt":
        triangle.style.top = "0%";
        break;
    case "/cms/o-nas":
        triangle.style.top = "10%";
        break;
    case "/cms/dyzury":
        triangle.style.top = "25%";
        break;
    case "/cms/blog":
        triangle.style.top = "200px";
        break;
    case "/cms/zmiana_hasla":
        triangle.style.top = "55%";
        break
    case "/cms/dashboard":
        triangle.style.top = "65%";
        break
}

addArticle.addEventListener("click", function(){
    buttonsSection.classList.add("disable");
    buttonsSection.classList.remove("active");
    addArticleSection.classList.add("active");
    addArticleSection.classList.remove("disable");
})

backBtn.addEventListener("click", function(){
    buttonsSection.classList.add("active");
    buttonsSection.classList.remove("disable");
    addArticleSection.classList.add("disable");
    addArticleSection.classList.remove("active");
})

editArticle.addEventListener("click", function(){
    buttonsSection.classList.add("disable");
    buttonsSection.classList.remove("active");
    editArticleSection.classList.add("active");
    editArticleSection.classList.remove("disable");
})

backBtn2.addEventListener("click", function(){
    buttonsSection.classList.add("active");
    buttonsSection.classList.remove("disable");
    editArticleSection.classList.add("disable");
    editArticleSection.classList.remove("active");
})