<?php include('head.php') ?>
<body>
  <?php
    $is_login = $this->session->userdata('user_is_login');
    if($is_login){
      include('login_header.php');
    }
    else{
      include('header.php');
    }
   ?>
    <!-- Contact Information Area Start -->
    <section class="contact-information-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="single-contact-information mb-80">
                        <i class="icon_phone"></i>
                        <h4>Phone</h4>
                        <p style="text-align:center;"> (+91)-9545-465-656</p>
                    </div>
                </div>



                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="single-contact-information mb-80">
                        <i class="icon_mail"></i>
                        <h4>Email</h4>
                        <p style="text-align:center;" >info@easywillindia.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Information Area End -->

    <!-- Contact Area Start -->
    <section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Email us with any question or inquiries.</h2>
                        <p style="text-align:center;">We would be happy to answer your questions and set up a meeting with you.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                  <div class="alert alert-danger" id="required_error"style="display:none;" >
                    <strong>Error</strong>
                    <p id="error_message"></p>
                  </div>
                  <!-- <div class="alert alert-success">
                    <strong>Email send Success!</strong>
                  </div> -->
                    <!-- Form -->
                    <form action="#" method="post" class="akame-contact-form border-0 p-0">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" class="form-control mb-30" placeholder="Your Name"  >
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="mobile" id="mobile" class="form-control mb-30" placeholder="Phone Number"  >
                            </div>
                            <div class="col-lg-4">
                                <input type="email" name="email" id="email" class="form-control mb-30" placeholder="Email"  >
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="message" class=" form-control mb-30 " placeholder="Type Your Message..."></textarea>
                            </div>

                        </div>
                    </form>
                    <div class="col-12 text-center">
                        <button type="submit" id="btn_contact" class="btn akame-btn btn-3 mt-15 active">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->
<!-- <div class="border-top mt-3"></div> -->
    <!-- Footer Area Start -->

    <?php include('footer.php') ?>

    <script>
    $('#btn_contact').click(function(){
    var name = $('#name').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    var message = $('#message').val();
    var mobile_format = /^[6-9][0-9]{9}$/;
    var email_format = /^[a-z0-9._%+-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;
    var error_name = '';
    var error_email = '';
    var error_mobile = '';
    var error_message = '';
    var invalide_email = '';
    var invalide_mobile = '';
    var required = '';

    if(name == ''){
      var error_name = 'Name, ';
      var required = 'required. ';
      $('#name').addClass('invalide');
    }
    if(email == ''){
      var error_email = 'Email, ';
      var required = 'required. ';
      $('#email').addClass('invalide');
    }
    if(!email_format.test(email)){
      var invalide_email = 'Invalide Email, ';
      $('#email').addClass('invalide');
    }
    if(mobile == ''){
      var error_mobile = 'Mobile Number, ';
      var required = 'required. ';
      $('#mobile').addClass('invalide');
    }
    if(!mobile_format.test(mobile)){
      var invalide_mobile = 'Invalide Mobile Number ';
      $('#mobile').addClass('invalide');
    }
    if(message == ''){
      var error_message = 'Message ';
      var required = 'required. ';
      $('#message').addClass('invalide');
    }

    if(!mobile_format.test(mobile) || !email_format.test(email) || name == '' || email == '' || mobile == '' || message == ''){
      $('#required_error').show();
      $('#error_message').text(error_name+''+error_email+''+error_mobile+''+error_message+''+required+''+invalide_email+''+invalide_mobile)
    }
    else{
      $('.valide').removeClass('invalide');
      $('#contact_form').submit();
    }
  });
    </script>

</body>

</html>
