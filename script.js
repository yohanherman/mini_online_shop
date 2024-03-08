const btnburger=document.querySelector('.btnburger');
const burgerMenu=document.querySelector(".burgerMenu");


btnburger.addEventListener("click",()=>{
    
    // burgerMenu.classList.toggle('showBurger');
    burgerMenu.classList.add('showBurger');
})


window.onload = function(){
    
    const searchbar = document.querySelector(".searchbar");
    const iconsSearch=document.querySelector(".fa-magnifying-glass");

    const text=document.querySelector(".text");
    
    iconsSearch.addEventListener("click",()=>{
        
        searchbar.classList.add("showsearchBar");
        text.classList.remove("removeText");
        
    })
}


// function seachProduct(){

//     const productNamE = document.querySelector(".searchbar").value


//         var xhttp = new XMLHttpRequest();

//         xhttp.onreadystatechange= function(){
   
//            if(this.readyState == 4 && this.status==200){
   
//                document.getElementById("textHTML").innerHTML= this.responseText;
//            }
//         }

//         xhttp.open("POST","classes/products.class.php",true);

//         xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//         xhttp.send("searchbar="+ productNamE);
        
//     }
























