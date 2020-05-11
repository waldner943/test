// radio-button

$(function(){
    $('input[type=radio]').change(function() {
        $("#rdobtn1").after().hide();
        $("#rdobtn2").after().hide();
        if ($("input:radio[name='Test']:checked").val() == "r-btn1") {
            $('#rdobtn1').slideToggle('fast');
            $("#rdobtn2").after().hide();
        } else if($("input:radio[name='Test']:checked").val() == "r-btn2") {
            $('#rdobtn1').after().hide();
            $('#rdobtn2').slideToggle('fast');
        }
    }).trigger('change'); 
});

// jQuery(function($) {
// });

// 登録ボタン
$(function() {
    $('#submit').prop('disabled', true);
    var disable = {
        opacity: "0.3",
        cursor: "default"
    }
    var able = {
        opacity: "1",
        cursor: "pointer"
    }
    $('#check-c').on('click', function() {
        if ($(this).prop('checked')==true && ($('#check-r1').prop('checked')||$('#check-r2').prop('checked'))==true) {
            $('#submit').prop('disabled', false).css(able);
        }else {
            $('#submit').prop('disabled', true).css(disable);
        }
    });
    $("[id^='check-r']").on('click', function() {    
        if ($(this).prop('checked')==true && $('#check-c').prop('checked')==true) {
            $('#submit').prop('disabled', false).css(able);
        }else {
            $('#submit').prop('disabled', true).css(disable);
        }
    });
});

// ケタ数制限
function sliceMaxLength(elem, maxLength) {  
    elem.value = elem.value.slice(0, maxLength);  
}
// 4ケタ入力したらカーソル移動
$(function(){
    $('.cardnumber').bind('keyup',function(){
        var thisValueLength = $(this).val().length;
        if (thisValueLength >= 4) {
            $(this).next().focus();
        }
    });
});
