const emailInput = document.querySelector('input[name="email"]');
const passwordInput = document.querySelector('input[name="pass"]');
const loginForm = document.querySelector('form.login100-form');

loginForm.addEventListener('submit', (event) => {
  event.preventDefault();
  
  const preDefinedEmail = 'Karimarouchi123@gmail.com';
  const preDefinedEmail1 = 'yosr@admin.com';
  const preDefinedPassword = '120218095';
  const preDefinedPassword1 = '1234';
  const enteredEmail = emailInput.value;
  const enteredPassword = passwordInput.value;

  if (enteredEmail === preDefinedEmail && enteredPassword === preDefinedPassword) {
    // les identifiants sont corrects, faire quelque chose ici
    window.location.href = 'C:\\xampp\\htdocs\\project\\VIEWS\\front\\index.html';
    
  } else  if (enteredEmail === preDefinedEmail1 && enteredPassword === preDefinedPassword1) {
    // les identifiants sont corrects, faire quelque chose ici
    window.location.href = 'C:\\Users\\user\\Desktop\\project web\\admin\\index.html';
  }else {
    
    // les identifiants sont incorrects, faire quelque chose ici
    window.location.href = 'C:\\Users\\user\\Desktop\\project web\\sing up\\colorlib-regform-8\\index.html';
  }
});

(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);