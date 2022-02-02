$('#tab1').on('click', function(){
    $('#tab1').addClass('login_shadow');
    $('#tab2').removeClass('signup_shadow');
    $('#login-tab').addClass('active-modal');
    $('#register-tab').removeClass('active-modal');
});
  
$('#tab2').on('click', function(){
    $('#tab2').addClass('signup_shadow');
    $('#tab1').removeClass('login_shadow');
    $('#login-tab').removeClass('active-modal');
    $('#register-tab').addClass('active-modal');
});