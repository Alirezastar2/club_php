// Tab
// function openCity(evt, cityName) {
//     // Declare all variables
//     var i, tabcontent, tablinks;

//     // Get all elements with class="tabcontent" and hide them
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }

//     // Get all elements with class="tablinks" and remove the class "active"
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }

//     // Show the current tab, and add an "active" class to the button that opened the tab
//     document.getElementById(cityName).style.display = "block";
//     evt.currentTarget.className += " active";
// }

// Modal
// Get the modal
var cities_modal = document.getElementById("otherCities_Modal");

// Get the button that opens the modal
var cities_btn = document.getElementById("otheCities_BTN");

// Get the <span> element that closes the modal
var cities_span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
if (cities_btn) {
    cities_btn.onclick = function () {
        cities_modal.style.display = "block";
    }
}


// When the user clicks on <span> (x), close the modal
if (cities_span) {
    cities_span.onclick = function () {
        cities_modal.style.display = "none";
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == cities_modal) {
        cities_modal.style.display = "none";
    }
}

// Cities Live Search
jQuery(document).ready(function ($) {
    $("#cities_search").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".cities_list li, .cities_list ul").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

// Slider
var swiper = new Swiper(".first_slider", {
    cssMode: true,
    navigation: {
        nextEl: ".swiper-button-next_slider",
        prevEl: ".swiper-button-prev_slider",
    },
    autoplay: {
        delay: 5000,
        pauseOnMouseEnter: true,
    },
    pagination: {
        el: ".swiper-pagination_slider",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
    },
});

// Cities Contract Carosoul
var swiper = new Swiper("#contracts_carosoul", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: "#cities_contract_pagination",
        clickable: true,
        dynamicBullets: false,
    },
    navigation: {
        nextEl: "#button_prev_ccp",
        prevEl: "#button_next_ccp",
    },

    breakpoints: {
        0: {
            slidesPerView: 1.5,
        },
        520: {
            slidesPerView: 2.5,
        },
        950: {
            slidesPerView: 3.5,
        },
    },
});

// Top Boxes
var swiper = new Swiper("#top_boxes", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',

    breakpoints: {
        0: {
            slidesPerView: 3.5,
        },
        520: {
            slidesPerView: 5,
        },
        950: {
            slidesPerView: 5,
        },
    },
});

// News Carosoul
var swiper = new Swiper("#snappnews_carosoul", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: "#snappnews_carosoul_pagination",
        clickable: true,
        dynamicBullets: false,
    },
    navigation: {
        nextEl: "#button_next_scp",
        prevEl: "#button_prev_scp",
    },

    breakpoints: {
        0: {
            slidesPerView: 1.5,
        },
        520: {
            slidesPerView: 2.5,
        },
        950: {
            slidesPerView: 3.5,
        },
    },
});

// Video Carosoul
var swiper = new Swiper("#snappvideo_carosoul", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: "#snappvideo_pagination",
        clickable: true,
        dynamicBullets: false,
    },
    navigation: {
        nextEl: "#button_prev_svp",
        prevEl: "#button_next_svp",
    },

    breakpoints: {
        0: {
            slidesPerView: 1.5,
        },
        520: {
            slidesPerView: 2.5,
        },
        950: {
            slidesPerView: 3.5,
        },
    },
});

//Last Blog
var swiper = new Swiper("#snappblog_carosoul", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: "#snappblog_pagination",
        clickable: true,
        dynamicBullets: false,
    },
    navigation: {
        nextEl: "#button_prev_svp_blog",
        prevEl: "#button_next_svp_blog",
    },

    breakpoints: {
        0: {
            slidesPerView: 1.5,
        },
        520: {
            slidesPerView: 2.5,
        },
        950: {
            slidesPerView: 3.5,
        },
    },
});

// Banner
var swiper = new Swiper("#banners_carosoul", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: "#banners_pagination",
        clickable: true,
        dynamicBullets: false,
    },

    breakpoints: {
        0: {
            slidesPerView: 2,
        },
        520: {
            slidesPerView: 3,
        },
        950: {
            slidesPerView: 4,
        },
    },
});

// SnappGram
var swiper = new Swiper(".snappgram_slider", {
    cssMode: true,
    centerSlide: 'true',
    grabCursor: 'true',
    pagination: {
        el: ".snappgram_slider_pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: "#button_next_sgl",
        prevEl: "#button_prev_sgl",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
    },
});

// Training Center Banners
var swiper = new Swiper("#trc_carosoul", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: false,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
        el: "#trc_carosoul_pagination",
        clickable: true,
        dynamicBullets: false,
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        520: {
            slidesPerView: 2,
        }
    },
});

// Cities DropDown
jQuery(document).ready(function ($) {
    jQuery('li.city_dd').click(function () {
        let x = $(this);
        jQuery(x.next()).toggle();
        $(this).toggleClass("city_open")
    })
});

// Load More Snappgram
    jQuery(document).on('click', '.load-more', function (event) {

        event.preventDefault();

        var $this = jQuery(this);

        $this.text('در حال بارگذاری ...');

        var $page = parseInt($this.data('page'));
		var $st = $this.data('st');

        jQuery.ajax({

            url: data.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'load_more_content',
                page: $page,
				st: $st
            },
            success: function (response) {
				
                if (parseInt(response.count) > 0) {

                    jQuery("#snappgram_posts").append(response.content);

                    $this.data('page', parseInt($page + 1));

                }
                $this.text('نمایش پست های بیشتر...');

            },
            error: function () {
            }

        });

    });

