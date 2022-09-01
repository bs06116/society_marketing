$(document).on('click', function(event) {
  if (!$(event.target).closest('#profile-toggle').length) {
    $('#profile-menu').removeClass('active');
  }
});
$(document).ready(function(){
  $('#profile-toggle').click(function(){
    $('#profile-menu').toggleClass('active');
  });
  $('.aside-toggle').click( () => {
    $('.theme-aside').toggleClass('minimized');
    $('.theme-aside .logo').toggleClass('d-none');
    $('.main').toggleClass('active');
  });

  // format numbers with commas
  $('.format-commas').each(function(index, element) {
    let number = $(element).text();
    $(element).html(Number(number).toLocaleString('en'));
  });

  // format cnic input
  $('.cnic').inputmask("99999-9999999-9");
});
  // format numbers in input with commas
$(document).on('keyup', '.format-commas-input', function() {
  var x = $(this).val();
  $(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
});
$(document).on('change', '.imgInp', function() {
  const img = $(this).parent().find('img');
  const file = this.files[0];
  if (file) {
    let reader = new FileReader();
    reader.onload = function(event){
      $(img).attr('src', event.target.result);
    }
    reader.readAsDataURL(file);
  }
});