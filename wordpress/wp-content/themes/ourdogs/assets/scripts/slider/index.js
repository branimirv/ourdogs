import $ from "jquery";
import slick from "slick-carousel";

$(".js-celebrating-dogs").slick({
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 980,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
            },
        },
    ],
});
