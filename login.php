<?php require('top.php'); ?>

<header class="head-img img-fluid">
    <div class="container">
        <h2 class="text-white text-center text-uppercase mt-5 pt-5">get in touch</h2>
        <p class="text-white text-center text-uppercase pt-1">We would love to hear from you</p>
    </div>
</header>

    <section>
        <div class="container">
        <div class="card col-lg-8  my-5">
        <div class="login_form card-body">
        <div id="form">
            <h2>Login Here </h2>

        <form method="post" id="login_s">
            <div class="form-group">
            <div class="form_elements">
                <label for="email">email</label>
                <input class="form-control" type="text" name="login_email" id="login_email" value="" />
            </div>
            <span class="field_error text-danger" id="login_email_error"></span>
            <div class="form_elements">
                <label for="username">Password</label>
                <input class="form-control" type="password" name="login_password" id="login_password" value="" />
            </div>
            <span class="field_error text-danger" id="login_password_error"></span>
            <div class="form_elements pt-3">
            <button type="button" onclick="user_login()" id="register" class="btn btn-success btn-block">Login</button>
            </div> 
            </div>
        <br /> 
        <a href="#" class="text-secondary text-decoration-none" id="show_register">Don't have a account? Click here</a>
       <br /> <a href="admin_panel\login.php" class="text-secondary text-decoration-none">Admin login here</a>
    </form>      
    </div>
    </div>
    <div class="clear_both"></div>
    <div class="register_form card-body">
        <div id="form">
            <h2>Register Here </h2>
            <form method="post" id="contact-form">
            <div class="form-group">
            <div class="form_elements">
                <input class="form-control" type="text" name="name" id="name" placeholder="Username" />
            </div><!--end form_elements-->
            <span class="field_error text-danger" id="name_error"></span>

            <div class="form_elements py-3">
                <input class="form-control" type="text" name="email" id="email" placeholder="Email" />
            </div><!--end form_elements-->
            <span class="field_error text-danger" id="email_error" ></span>

            <div class="form_elements">
                <input class="form-control" type="password" name="password" id="password" placeholder="password" />
            </div><!--end form_elements-->
            <span class="field_error text-danger" id="password_error"></span>

            <div class="form_elements py-3">
                <input class="form-control" type="tel" name="mobile" id="mobile" placeholder="mobile" />
            </div><!--end form_elements-->
            <span class="field_error text-danger" id="mobile_error"></span>

            <div class="form_elements pt-3">
                    <button type="button" onclick="user_register()" id="login_log" class="btn btn-success btn-block">Register</button>
            </div><!--end form_elements--> <br>
            <a href="#" class="text-secondary text-decoration-none" id="show_signin">sign In here</a>
            </div>
            <div class="register_msg">
                <p class="text-success"></p>
            </div>
            </form>
        </div><!-- div form-->
    </div>
        </div>
        </div>
    </section>    

    <script>
         $(function(){
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

  });

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
      if(is_error==''){
          console.log('coming');
          jQuery.ajax({
            url: 'register_submit.php',
            type:'post',
            data:'name='+name+'&email='+email+'&password='+password+'&mobile='+mobile,
            success:function(result){
                alert(result);
            }
          });
      }
  }

  function user_login(){
      jQuery('.field_error').html('');
      var email = jQuery("#login_email").val();
      var password = jQuery("#login_password").val();
      var is_error='';

      if(email==''){
        jQuery('#login_email_error').html('please enter email');
        is_error='yes';
      }if(password==''){
        jQuery('#login_password_error').html('please enter password');
        is_error='yes';
      }
      if(is_error==''){
          console.log('coming');
          jQuery.ajax({
            url: 'login_submit.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success:function(result){
                if($.trim(result)=='valid'){
                    window.location.href='index.php';
                }
                 if($.trim(result)=='wrong'){
                    alert('wrong detail');
                }
            }
          });
      }
  }

    </script>

<?php require('footer.php') ?>