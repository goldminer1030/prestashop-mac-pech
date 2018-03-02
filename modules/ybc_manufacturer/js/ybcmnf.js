$(document).ready(function(){
     if ($('#ybc-mnf-block-ul').length > 0)
    	$("#ybc-mnf-block-ul").owlCarousel({            
            items : YBC_MF_PER_ROW,
            itemsCustom : [[0, 2], [320, 3] , [480,3], [530,YBC_MF_PER_ROW], [600,YBC_MF_PER_ROW], [680,YBC_MF_PER_ROW], [768,YBC_MF_PER_ROW], [991,YBC_MF_PER_ROW], [1199,YBC_MF_PER_ROW]],
            // Navigation
            navigation : true,  
            rewindNav : false,
            //Pagination
            pagination : false,          
        });
});