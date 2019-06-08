// Input Field is required.
$('.required').blur(function(){
  var val = $(this).val();
  var pin_code_format = /^[0-9]{6}$/;
  var age_format = /^[0-9]{2}$/;
  var aadhar_no_format = /^[0-9]{12}$/;
  if(val==''){
    $(this).addClass('required-input');
    $(this).attr("placeholder", "This field is required");
  }
  else{
    $(this).removeClass('required-input');
  }
  // Pincode
  if($(this).hasClass('pin-code') && !pin_code_format.test(val)){
    $(this).addClass('invalide-input');
  }
  // // Major Age.
  if($(this).hasClass('age-major') && (!age_format.test(val) || val<18)){
    $(this).addClass('invalide-input');
  }
  // // aadhar Number.
  if($(this).hasClass('aadhar-no') && !aadhar_no_format.test(val)){
    $(this).addClass('invalide-input');
  }

});
// Only Text allowed in input.
$(".text").keypress(function(event){
  var inputValue = event.which;
  // allow letters and whitespaces only.
  if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
      event.preventDefault();
  }
});
