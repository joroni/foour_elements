$(document).ready(function () {

    slidify();
   // $('.btn-confirm').hide();
    $('.choice-list-group-item').mouseenter(function () {
        // getSortValue();
    })
    $('.choice-list-group-item').mouseout(function () {
        getSortValue();
        $('.btn-confirm').show();
    })

    $('.btn-confirm').click(function () {
  //      $(this).hide();
    })


    $('.btn-next').click(function () {
        $('form.form-group').addClass("slideRight");
        setTimeout(function () {
            $('form.form-group').removeClass("slideRight");
        }, 2000);


    });


    //some code  
    
    
/*     $('body, html').css('overflow-y', 'hidden');
$('html, body').animate({
    scrollTop:0
}, 0); */
});

document.body.addEventListener('touchmove', function(e){ 
    document.getElementsByTagName('body')[0]. style .height = "100vh";
    document.getElementsByTagName('body')[0]. style. overflow = "hidden";
  });

  
function getSortValue() {
    str = $(".choice-list span").text();
    // let thevalue = parseFloat(str);
    $(".choice-input").val(str);

}

function getSortValue2() {
    str = $(".choice-list span").addClass('coefficient');
}


$('html').click(function () {
    slidify();
   
  /*   if($("textarea").length){
        $('textarea').val($('textarea').val().trim())
    } */
});

function slidify() {
    $(".slider-item").slider({
        ticks: [0, 1, 2, 3, 4],
        ticks_labels: ['0', '1', '2', '3', '4'],
        ticks_snap_bounds: 30,
        value: 0
    });
}



function dragStart(event) {
    event.dataTransfer.setData("Text", event.target.id);
  }
  
  function dragging(event) {
    document.getElementById("demo").innerHTML = "The p element is being dragged";
  }
  
  function allowDrop(event) {
    event.preventDefault();
  }
  
  function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
    event.target.appendChild(document.getElementById(data));
    document.getElementById("demo").innerHTML = "The p element was dropped";
  }