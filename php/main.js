  /*  $(function(){
            $('.register_form').hide();
            $('#show_register').click(function(){
            $('.login_form').hide();
            $('.register_form').show();
            return false;
        });

        $('#show_signin').click(function(){
            $('.register_form').hide();
            $('.login_form').show();
            return false;
        });

  }); */

  function user_register(){
	jQuery('.field_error').html('');
	var name = jQuery("#name").val();
	var email = jQuery("#email").val();
	var password = jQuery("#password").val();
	var mobile = jQuery("#mobile").val();
	var is_error='';

	if(name==''){
	  jQuery('#name_error').html('please enter name');
	  is_error='yes';
	}if(email==''){
	  jQuery('#email_error').html('please enter email');
	  is_error='yes';
	}if(password==''){
	  jQuery('#password_error').html('please enter password');
	  is_error='yes';
	}if(mobile==''){
	  jQuery('#mobile_error').html('please enter mobile');
	  is_error='yes';
	}
	if(is_error=''){
	  $( "form" ).on( "submit", function(e) {

var dataString = $(this).serialize();

//alert(dataString); return false;

$.ajax({
	type: "POST",
	url: "register_submit.php",
	data: dataString,
	success: function() {
	  $('#contact_form').html("<div id='message'></div>");
	  $('#message').html("<h2>Contact Form Submitted!</h2>");
	}
  });
  return false;
});
	}
}
