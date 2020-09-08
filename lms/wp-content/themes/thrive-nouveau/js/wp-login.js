jQuery(document).ready(function($){
    "use strict";
    $(window).load(function() {

        $('label').contents().filter(function() {
            return this.nodeType === 3;
        }).each(function() {
            this.nodeValue = $.trim(this.nodeValue);
        }).wrap('<span class="input_header"></span>');

        $('body.login form label > .input_header:empty, br').remove();
        
        $('#lostpasswordform label[for="user_login"] .input_header, label[for="pass1"] .input_header').addClass('inactive');

        var $input = $('body.login form label > input.input');

        $.each($input, function(){
            var $field = $(this);
            console.log( $(this).val().length );
            if ($field.val().length >= 1) {
                $field.focus();
                $field.prev('.input_header').addClass('inactive');
            }
        });
       
    });

    $('body.login form label > input').focusin(function() {

        $(this).prev('.input_header').addClass('inactive');

    }).focusout(function() {

        if ($(this).val().length < 1) {

            $(this).prev('.input_header').removeClass('inactive');

        }
    });

});
