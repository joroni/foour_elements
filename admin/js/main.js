

/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  $("#mySidebar").css("width", "250px");
  $("#main").css("margin-left", "250px");
  $(".openbtn").hide();
  $(".closebtn").show();
  //document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  $("#mySidebar").css("width", "0");
  $("#main").css("margin-left", "0");
  $(".openbtn").show();
  $(".closebtn").hide();
  /* 
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0"; */
}

$(document).ready(function() {
    $('input, select, radio').addClass('form-control');
    console.log('dashboard starts');

   


 /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
/* var dropdown = $(".side-nav li a");

 var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown:first.parent().addClass(".active");
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
} */
})





