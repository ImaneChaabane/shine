jQuery(document).ready(function($){
    
    $('body').on('click', '.bttk-itw-add', function(){
        var count = $(this).siblings('.bttk-img-text-outer').children('.image-text-widget-wrap').size();
        if(count == 2) {
        	$(this).attr('disabled',true);
        }else{
        	$(this).removeAttr('disabled');
        }
    });  
        
});