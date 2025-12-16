jQuery(document).ready( function() {
    jQuery(".post_like").click( function(e) {
       e.preventDefault(); 
       post_id = jQuery(this).attr("data-post_id");
       nonce = jQuery(this).attr("data-nonce");
       liked = jQuery(this).attr("data-liked");
       jQuery.ajax({
          type : "post",
          dataType : "json",
          url : post_like_ajax.ajaxurl,
          data : {action: "post_like",liked: liked, post_id : post_id, nonce: nonce},
          success: function(response) {
             if(response.type == "success") {
                jQuery(".like_post_count").html(response.like_count);
                jQuery(".post_like").css('color', 'red');
                jQuery(".post_like").attr('data-liked', 1);
             }
             else {
                alert("Your like could not be added");
             }
          }
       });
    });
 });