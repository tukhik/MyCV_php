

$(window).load(function(){
   
});


$(function(){
    jQuery(document).ready(function() {
      $('.edit_skill').on({
        click: function (){
            $(this).parents('.update_form_wrap').find('form').toggleClass('open');
        }
    })

		
		});
})
