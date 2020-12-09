$(document).ready(function (){

    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    $("#best-selling .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 3
            },
            1000:{
                items: 5
            }
        }
    });

    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    //let $input = $(".qty .qty-input")

    $qty_up.click(function (){
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        if ($input.val() >= 1 && $input.val() <= 9){
           $input.val(function (i,oldval){
               return ++oldval;
           })
        }
    });

    $qty_down.click(function (){
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        if ($input.val() > 1 && $input.val() <= 10){
            $input.val(function (i,oldval){
                return --oldval;
            })
        }
    });
});