//== Class definition

var FormWidgets = function () {
    //== Private functions
    var validator_1;
    var validator_2;

    var initValidation = function () {
        validator_1 = $( "#m_form_1" ).validate({
            // define validation rules
            rules: {
                name: {
                    required: true,
                    message: "Campo obligatorio"
                }
            },
            messages: {
                name: "Campo obligatorio"
            },

            //display error alert on form submit
            invalidHandler: function(event, validator_1) {
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                mUtil.scrollTo('m_form_1_msg', -200);
            },

            submitHandler: function (form) {
                form.submit();
            }
        });
        validator_2 = $( "#m_form_customer" ).validate({
            // define validation rules
            rules: {
                firstname: { required: true },
                email: { required: true },
                role_id: { required: true },
            },
            messages: {
                firstname: "Campo obligatorio",
                email: "Campo obligatorio",
                role_id: "Campo obligatorio",
                password: "Campo obligatorio",

            },

            //display error alert on form submit
            invalidHandler: function(event, validator_2) {

                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                mUtil.scrollTo('m_form_1_msg', -200);
            },

            submitHandler: function (form) {
                form.submit();
            }
        });
    }

    return {
        // public functions
        init: function() {
          initValidation();
        }
    };
}();
jQuery(document).ready(function() {
    FormWidgets.init();
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
