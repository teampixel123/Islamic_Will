<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="<?php echo base_url(); ?>/Will_controller/save_personal_info" method="post">
      <label for="">will_id: </label>
      <input type="text" name="will_id" value=""></br>
      <label for="">full_name: </label>
      <input type="text" name="full_name" value=""></br>
      <label for="">address: </label>
      <input type="text" name="address" value=""></br>
      <label for="">city: </label>
      <input type="text" name="city" value=""></br>
      <label for="">pin_code: </label>
      <input type="text" name="pin_code" value=""></br>
      <label for="">state: </label>
      <input type="text" name="state" value=""></br>
      <label for="">country: </label>
      <input type="text" name="country" value=""></br>
      <label for="">mobile_no: </label>
      <input type="text" name="mobile_no" value=""></br>
      <label for="">email: </label>
      <input type="text" name="email" value=""></br>
      <label for="">occupation: </label>
      <input type="text" name="occupation" value=""></br>
      <label for="">aadhar_no: </label>
      <input type="text" name="aadhar_no" value=""></br>
      <label for="">pan_no: </label>
      <input type="text" name="pan_no" value=""></br>
      <label for="">gender: </label>
      <input type="text" name="gender" value=""></br>
      <label for="">is_married: </label>
      <input type="text" name="is_married" value=""></br>
      <label for="">is_have_child: </label>
      <input type="text" name="is_have_child" value=""></br>
      <?php
      $session_data = $this->session->userdata();
      if(isset($session_data)){
?>
  <input type="submit" name="" value="Update"><?php echo $session_data['will_start'] ?></br>
<?php
      }
      else{?>
      <input type="submit" name="" value="Submit"></br>
    <?php  } ?>
    </form>

  </body>
</html>
