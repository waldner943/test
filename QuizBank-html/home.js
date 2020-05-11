// モーダルの出現
$(function() {
    $("#login-show").click(function(){
      $('#login-modal').fadeIn();
    });
    $('#close-login-modal').click(function() {
      $('#login-modal').fadeOut();
    });
});
$(function() {
    $("a[id^=signup-show]").click(function(){
      $('#signup-modal').fadeIn();
    });
    $('#close-signup-modal').click(function() {
      $('#signup-modal').fadeOut();
    });
});
// モーダルの切り替え
$(function() {
    $("#shiftToSignup").click(function(){
      $('#login-modal').fadeOut();
      $('#signup-modal').fadeIn();
    });

});
$(function() {
    $("#shiftToLogin").click(function(){
        $('#signup-modal').fadeOut();
        $('#login-modal').fadeIn();
    });
});


  // パスワードの表示・非表示切替
$(".toggle-password").click(function() {
    // iconの切り替え
    $(this).toggleClass("fa-eye fa-eye-slash");
    
    // 入力フォームの取得
    var input = $(this).prev("input");
    // type切替
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});