 (function( $ ) {
        $(function() {
            $('.widget-description').each(function() {
                 $(this).html( '<img style="max-width:100%; height:auto;" src="'+$(this).html()+'" />')
            });
		
        });
    })( jQuery );
	
	(function(a) {
    a(function() {
        a(".color-field_w").wpColorPicker();
        a(".customize-control-widget_form .widget-control-save").fadeIn();
    });
})(jQuery);
	
	jQuery(document).ready(function(){var b;var a;jQuery(".left_right_upload_button").live("click",function () {a=jQuery(this).prev("input");b=wp.media({title:"选择图片",button:{text:"选择"},multiple:false});if(b){b.open()}b.on("select",function(){attachment=b.state().get("selection").first().toJSON();jQuery(a).val(attachment.url);jQuery(".supports-drag-drop").remove()})})});
	
 jQuery(document).ready(function(){   
    var theme_upload_frame;   
    var value_id; 
	
    jQuery('.upload_button,.up #upbottom,.edit-menu-item-description').on('click',function(event){   
        value_id =jQuery(this).prev('input');      
        
        theme_upload_frame = wp.media({   
            title: '选择图片',   
            button: {   
                text: '选择',   
            }   , multiple: false   
     
			
        });   
           if(theme_upload_frame){
           theme_upload_frame.open();    
		   }
       
        theme_upload_frame.on('select',function(){   
            attachment = theme_upload_frame.state().get('selection').first().toJSON();   
            jQuery(value_id).val(attachment.url);
			jQuery(".supports-drag-drop").remove();     
        });   
           
        
    });  

    });   