/* * * * * * * * * * * * * 
* Project: Gkiokan NET v5.1 - Simple Styling Promote
* Author: Gkiokan Sali
* URL: www.gkiokan.net
* Date: 10.11.2014
* * * * * * * * * * * * */

    g_clock = {
        //url: 'http://www.gkiokan.net/api/time',
        url: 'api/time',
        method: 'post',
        clock_id: '#footer_time',
        
        get_time: function(){
            
            $.ajax({                
                url:  this.url,
                type: this.method,
                dataType: 'json',
                success: function(a){
                    var full_time = a.full_time;
                    var full_date = a.full_date;
                    var timestamp = a.time;
                    
                    $(g_clock.clock_id).html(full_time);
                },
                error:function(x,e){
                    if(x.status==0){
                        console.log('You are offline!!\n Please Check Your Network.');
                    }else if(x.status==404){
                        console.log('Requested URL not found.');
                    }else if(x.status==500){
                        console.log('Internel Server Error.');
                    }else if(e=='parsererror'){
                        console.log('Error.\nParsing JSON Request failed.');
                    }else if(e=='timeout'){
                        console.log('Request Time out.');
                    }else {
                        console.log('Unknow Error.\n'+x.responseText);
                    }
                }                
            });   
        }
        
        
    }
    
    $(function(){ setInterval(function(){ g_clock.get_time() }, 1000); });