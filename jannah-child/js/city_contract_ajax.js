jQuery(document).ready(function () {

   jQuery(".city_contract").click(function (e) {
      e.preventDefault();
      btn = jQuery(this);
      btn_text = btn.text();
      city_name = jQuery(this).attr("data-city_name")
      nonce = jQuery(this).attr("data-nonce")
      loading = '<img width="24" height="24" alt="loading" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KPGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iMzIiIHN0cm9rZS13aWR0aD0iOCIgc3Ryb2tlPSIjMDA1MWEyIiBzdHJva2UtZGFzaGFycmF5PSI1MC4yNjU0ODI0NTc0MzY2OSA1MC4yNjU0ODI0NTc0MzY2OSIgZmlsbD0ibm9uZSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj4KICA8YW5pbWF0ZVRyYW5zZm9ybSBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiIGR1cj0iMXMiIGtleVRpbWVzPSIwOzEiIHZhbHVlcz0iMCA1MCA1MDszNjAgNTAgNTAiPjwvYW5pbWF0ZVRyYW5zZm9ybT4KPC9jaXJjbGU+CjwhLS0gW2xkaW9dIGdlbmVyYXRlZCBieSBodHRwczovL2xvYWRpbmcuaW8vIC0tPjwvc3ZnPg==">';

      jQuery.ajax({
         type: "post",
         dataType: "json",
         url: city_filter_ajax.ajaxurl,
         data: { action: "city_contract_filter", city_name: city_name, city_name_farsi: btn_text, nonce: nonce },
         beforeSend: function() {
            btn.html(loading);
         },
         success: function (response) {
            btn.html(btn_text);
            jQuery("#contracts").html(response.output);
            jQuery(".city_contract").css('background-color', '').css('color', '#404040');
            btn.css('background-color', '#3ea65b').css('color', 'white');
            
            // به‌روزرسانی نام شهر در دکمه مشاهده همه خدمات
            jQuery('.item.bg-white.rounded-xl.shadow-md.swiper-slide:last-child .text-14.block').text('شهر ' + btn_text);
            
            // به‌روزرسانی لینک مشاهده همه خدمات
            if (response.tag_link) {
                jQuery('.item.bg-white.rounded-xl.shadow-md.swiper-slide:last-child').attr('href', response.tag_link);
            }
         }
      })

   })

})