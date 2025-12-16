// (function ($) {

//     $(window).load(function () {

//         let main_header = $('.logo-container');
//         let select_type_section = $('#mobile_select_service_type');
//         // let scl_welcome = $('.scl_welcome');
//         let main_header_height = main_header.height();

//         select_type_section.css({'top': main_header_height - 1});
//         // scl_welcome.css({'margin-top': select_type_section.height()});

//     });

// })(jQuery);

(function () {
    document.addEventListener('DOMContentLoaded', function () {
        var advgbTable = document.querySelector('.advgb-table-frontend');
        if (advgbTable) {
            var parentElement = advgbTable.closest('.table-is-responsive');
            if (parentElement) {
                parentElement.classList.add('styled-parent');
            }
        }
    });
})();