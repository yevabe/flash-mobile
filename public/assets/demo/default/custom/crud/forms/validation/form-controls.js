var FormControls= {
    init:function() {
        $("#m_form_1").validate( {
            rules: {
                email: {
                    required: !0, email: !0
                }
                , name: {
                    required: !0
                }
            },
            messages: {
              name: {
                  required: "Campo obligatorio"
              },
              email: {
                  required: "Campo obligatorio",
                  email: "Email inválido"
              }
            }
            , invalidHandler:function(e, r) {
                var i=$("#m_form_1_msg");
                i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
            }
        }
        )
    }
}
jQuery(document).ready(function() {
    FormControls.init()
}

);
