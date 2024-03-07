const btnburger=document.querySelector('.btnburger')
const burgerMenu=document.querySelector(".burgerMenu")

const searchbar = document.querySelector(".searchbar");



btnburger.addEventListener("click",()=>{

    burgerMenu.classList.toggle('showBurger');

})