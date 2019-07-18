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
    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Pricing</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->


    <section class="pricing py-5">
  <div class="container">

    <div class="row">
      <div class="alert alert-danger col-lg-12" style="display:none;" role="alert">
      Invalide Promocode
      </div>
      <!-- Free Tier -->
        <!-- <div class="col-lg-1">
          </div> -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h3 class="card-title text-muted text-uppercase text-center" style="color: #05748e!important;">Silver</h3>
            <h6 style="font-size:26px;" class="card-price text-center">Rs. 2000<span class="period">/ Only + GST @18%</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>Standard online services</strong></li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Just to fill details Online guidance @tools tips and faq’s</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>It’s easy, simple and affordable</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>User friendly experience</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Confidential, safe and secure </li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Preview before print / finalize </li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>User can generate will up to 30 days from payment</strong></li>
              <li ><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>One modification / updation up to one (1) month from payment</strong></li>
              <li ><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Only @ Rs. 2000/- + GST @18%</li>
            </ul>
            <?php if($is_login){ ?>
              <?php $max_will = $user_data->max_will;
                if($max_will > 0){ ?>
                  <button type="button" class="btn btn-block active akame-btn text-uppercase" data-toggle="modal" data-target="#subscribedModel">Get Started</button>
              <?php  } else{ ?>
              <form class="" action="<?php base_url() ?>Payment_Gateway/payment" method="post">
                <input type="hidden" name="pack_name" id="pack_name" value="Silver" >
                <input type="hidden" name="amount" id="amount" value="2000" >
                <input type="hidden" name="promocode" id="no_promocode" value="no_promocode">
                <input type="hidden" name="name" id="name" value="<?php echo $user_data->user_fullname; ?>" >
                <input type="hidden" name="email" id="email" value="<?php echo $user_data->user_email_id; ?>" >
                <input type="hidden" name="mobile" id="mobile" value="<?php echo $user_data->user_mobile_number; ?>" >
                <input type="submit" class="btn btn-block active akame-btn text-uppercase" value="Get Started" />
              </form>
            <?php } }
            else{ ?>
              <a href="<?php echo base_url(); ?>Login" class="btn btn-block active akame-btn text-uppercase">Get Started</a>
            <?php } ?>
          </div>
        </div>
      </div>

      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center" style="color: #05748e!important;">Gold</h5>
            <h6 style="font-size:26px;" class="card-price text-center">Rs. 4000<span class="period">/ Only + GST @18%</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>Executive  online services</strong></li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Our executive will interact for your details through call, E mail.</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>It’s easy, simple and affordable</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>User friendly experience</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Confidential, safe and secure</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Preview before print / finalize</li>
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>User can generate will up to 30 days from payment</strong></li>
              <li ><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>One modification / updation up to three (3) months from payment</strong></li>
              <li ><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span>Only @ Rs. 4000/- + GST @18%</li>
              <hr>
              <li><span class="fa-li"></span>same package will of user’s Spouse, Real Sister, Mother, Father, Son, Daughter’s is at 2000 + GST @ 18% <i title="You can use promocode for 50% discount" class="fa fa-question-circle-o" aria-hidden="true"></i></li>
              <li><span class="fa-li"></span>Final will delivery by E mail or Courier at user’s choice.</li>
            </ul>


            <?php if($is_login){ ?>
              <?php $user_subscription = $user_data->user_subscription;
                if($max_will > 0){ ?>
                  <button type="button" class="btn btn-block active akame-btn text-uppercase" data-toggle="modal" data-target="#subscribedModel">Get Started</button>
              <?php  } else{ ?>
              <button type="button" class="btn btn-block active akame-btn text-uppercase" data-toggle="modal" data-target="#exampleModal">Get Started</button>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Enter Promocode</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Do you have promocode?</p>
                      <input type="text" name="txt_promocode" id="txt_promocode" class="form-control">
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="btn_promo_yes" class="btn btn-block active akame-btn text-uppercase" >Yes</button>
                      <button type="button" id="btn_promo_no" class="btn btn-block active akame-btn text-uppercase">No</button>
                      <!-- data-dismiss="modal" -->
                    </div>
                  </div>
                </div>
              </div>
              <form class="" id="gold_pack_form" action="<?php base_url() ?>Payment_Gateway/payment" method="post">
                <input type="hidden" name="pack_name" id="pack_name" value="Gold" >
                <input type="hidden" name="amount" id="amount" value="4000" >
                <input type="hidden" name="promocode" id="promocode">
                <input type="hidden" name="name" id="name" value="<?php echo $user_data->user_fullname; ?>" >
                <input type="hidden" name="email" id="email" value="<?php echo $user_data->user_email_id; ?>" >
                <input type="hidden" name="mobile" id="mobile" value="<?php echo $user_data->user_mobile_number; ?>" >
              </form>
            <?php } }
            else{ ?>
              <a href="<?php echo base_url(); ?>Login" class="btn btn-block active akame-btn text-uppercase">Get Started</a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="modal fade" id="subscribedModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>You are allready subscribed</p>
              <p>Create new will</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url(); ?>Will_controller/make_will_view" class="btn btn-block active akame-btn text-uppercase" >Create a Will</a>
              <button type="button" class="btn btn-block active akame-btn text-uppercase" data-dismiss="modal">Cancel</button>
              <!-- data-dismiss="modal" -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h3 class="card-title text-muted text-uppercase text-center" style="color: #05748e!important;">Platinum</h3>
            <br>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fa fa-check" aria-hidden="true"></i></span><strong>Please drop your details for your
                personalized and customized will
                which is upgraded version of silver and
                gold package along with some extra
                features and benefits. </strong><br><br><br>
                Our executive will communicate you shortly.
                </li>
            </ul>
              <a href="<?php echo base_url(); ?>Contact"><input type="submit" class="btn btn-block active akame-btn text-uppercase" value="Contact Us" /></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
    <!-- Border -->
        <!-- <div class="border-top mt-3"></div> -->
    <!-- Footer Area Start -->
  <?php include('footer.php') ?>
</body>
<script>
  $(document).ready(function(){
    $('#btn_promo_yes').click(function(){
      var promocode = $('#txt_promocode').val();
      if(promocode == ''){
        alert('Enter Promocode');
      }
      else{
        $('#promocode').val(promocode);
        $('#txt_promocode').val('');
        $('#gold_pack_form').submit();
      }
    });
    $('#btn_promo_no').click(function(){
        $('#promocode').val('no_promocode');
        $('#gold_pack_form').submit();
    });
  });
</script>
<?php if($this->session->flashdata('invalid_promocode')){ ?>
  <script>
  $('.alert-danger').show().delay(5000).fadeOut();
  </script>
<?php } ?>
</html>
