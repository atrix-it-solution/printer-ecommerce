/* <![CDATA[ */

jQuery(document).ready(function() {
    jQuery(".offer_slider").slick({
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
    
    jQuery(".hero_slider").slick({
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 50000,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 700,
                settings: {
                    arrows: false,
                }
            }
        ]
    });
    
    jQuery(".new_arrival_slider").slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    jQuery(".best_seller_slider").slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
    
    
    jQuery(".testimonial_slider").slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true,
                    autoplaySpeed: 8000,
                }
            }
        ]
    });

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Change tab on hover instead of click
    document.querySelectorAll('#pills-tab [data-bs-toggle="pill"]').forEach(tab => {
        tab.addEventListener('mouseenter', function () {
        let tabTrigger = new bootstrap.Tab(this);
        tabTrigger.show();
        });
    });

    

    $(".search-trigger").click(function() {
        $('#searchbar').addClass("active");
    });
    $("#closeSearch").click(function() {
        $('#searchbar').removeClass("active");
    });

    document.getElementById("shipAddress").addEventListener("change", function() {
        const collapseElement = document.getElementById("shipping_fields");
        const collapse = new bootstrap.Collapse(collapseElement, {
            toggle: false // prevent auto toggle on init
        });

        if (this.checked) {
            collapse.show();
        } else {
            collapse.hide();
        }
    });
});




/* ]]&gt; */