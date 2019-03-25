/*
 * Project: Gkiokan.NET
 * Author: Gkiokan Sali
 * URI: htpt://www.gkiokan.net/
 *
 */

parallex = {
    
    target : '.parallex',
    
    init : function(spec_target){
        plx = $(spec_target);
        window.addEventListener('scroll', function(){ parallex.parallex_attach(plx)}, false);
    },
    
    parallex_attach: function(plx){
        console.log('Parallex counting...')
        offset = -window.pageYOffset/7;
        plx_limit = (plx.height()*-1)/100*30;
        //console.log('Offst: '+offset+' | Limit: '+plx_limit);
        if (plx_limit<offset) {
            plx.css({'background-position':'center '+offset+'px'}); 
        }
        
    }
}