<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="wsBody"> 
    <div class="homeColumn">
        <div>

            <img class="mySlides slide_fade_in" src="../images/Slide0.png" style="width:100%">
            <img class="mySlides slide_fade_in" src="../images/Slide1.png" style="width:100%">
            <img class="mySlides slide_fade_in" src="../images/Slide2.png" style="width:100%">

        </div>
    </div>

</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 10000);    
}
</script>