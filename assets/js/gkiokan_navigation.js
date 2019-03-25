/* * * * * * * * * * * * *
* Project: Gkiokan NET v5.1 - Simple Styling Promote
* Author: Gkiokan Sali
* URL: www.gkiokan.net
* Date: 10.11.2014
* * * * * * * * * * * * */


nav = {
  menu: $('nav.main_header .container'),
  mobile_menu_btn: $('.mobile_menu_btn'),
  mobile_menu_status: $('body'),
  mobile_menu_class: 'mobile_open',

  change_menu: function(){
      var check = nav.mobile_menu_status.hasClass(nav.mobile_menu_class);

      if(check){
        nav.mobile_menu_status.removeClass(nav.mobile_menu_class);
        nav.menu.slideUp();
      }
      else {
        nav.mobile_menu_status.addClass(nav.mobile_menu_class);
        nav.menu.slideDown(200);
      }

  }


}

nav.mobile_menu_btn.on('click', function(){ nav.change_menu() });
