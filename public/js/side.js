//メニュークリックでオープンする
$(function() {
    $('.hamburger').click(function() {
        $(this).toggleClass('open');
        $('.side').toggleClass('open');
    });
});

//メニュークリックで非表示
$(function(){
    $('.hamburger li a').on("click", function(){
        $('.side').removeClass('open');
    });
});