//CARROUSEL ACCUEIL

$(function () {
    $('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4500,
        infinite: true,
        speed: 1600
    });
});