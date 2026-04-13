// //scroll button ------ mybtn
// //Get the Button

// var mybutton = document.getElementById("myBtn");

// //When the user scrolls down 20px from the top of the document, show the button

// window.onscroll = function(){scrollFunction()};

// function scrollFunction(){
//    if(document.documentElement.scrollTop > 20){
//      mybutton.style.display = "block";
//    }
//    else{
//      mybutton.style.display = "none";
//    }
// }

// //WHen the user clicks on the button, scroll to the top of the document



// function topFunction(){
//   document.body.scrollTop = 0; //for safari
//   document.documentElement.scrollTop = 0; //for chrome, forefox, IE and Opera
// }

  

/* javascript code for show/hide multiple divs ---- bca.html */

var divs = ["sem1", "sem2"];
var visibleDivId = null;

function toggleVisibility(divId){
  if(visibleDivId === divId){
    //visibleDivId = null
  } else{
    visibleDivId = divId;
  }

  hideNonVisibleDivs();
}

function hideNonVisibleDivs(){
  var i, divId, div;

  for(i = 0; i< divs.length; i++){
    divId = divs[i];
    div = document.getElementById(divId);

    if(visibleDivId === divId){
      div.style.display = "block";
    }
    else{
      div.style.display = "none";
    }
  }
}









 