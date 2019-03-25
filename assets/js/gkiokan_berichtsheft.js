/*
 * Project: Gkiokan.NET | Berichtsheft
 * Author: Sali Gkiokan
 * URI: www.gkiokan.net/project/berichtsheft
 * License: Gkiokan.NET
 * Date: 26.12.2014
 * 
 */

bhs = {
    icon_set    : 'glyhicon',
    icon_full   : 'glyphicon-fullscreen',
    icon_max    : 'glyphicon-resize-full',
    icon_min    : 'glyphicon-resize-small',
    icon_up     : 'glyphicon-chevron-up',
    icon_down   : 'glyphicon-chevron-down',
    entry : '.my_entry',
    open : '.open', openClass : 'open',
    all_open : '.my_entry.open',
    full : {},    
    
    myBook_CloseAllOpenEntries : function(){
        $(bhs.entry+bhs.open).each(function(a){
            var t = $(this).attr('data-target');
            $(this).removeClass('open');            
            $('div[data-target='+t+'] a[href=#'+t+']').trigger('click');
        });        
    },
    
    myBook_ToggleEntryFull: function(){
        if(this.full.open!=this.full.target) this.full.obj.toggleClass(bhs.openClass);        
    },
    
    myBook_TriggerPanelToggle: function(){
        if (this.full.panel_open==false) { this.full.toggle.trigger('click'); }
        else if (this.full.action_close==true) { this.full.toggle.trigger('click'); }
    },
    
    myBook_findEntry : function(i){
        this.full.target = $(i).attr('data-target');
        this.full.obj = $(".my_entry[data-target="+this.full.target+"]");
        this.full.toggle = $('div[data-target='+this.full.target+'] a[href=#'+this.full.target+']');        
        this.full.panel_open = $('div[id='+this.full.target+']').hasClass('in');                
        this.full.action_close = this.full.obj.hasClass(bhs.openClass);        
        this.full.open = $(bhs.entry+bhs.open).attr('data-target');
    },
    
    myBook_max  : function(i){
        // Init all Variables thought the data-target
        bhs.myBook_findEntry(i);
        
        // Close other Full width panels and close target if it has been clicked 
        bhs.myBook_CloseAllOpenEntries();
        
        // Entry Toggle Full    
        bhs.myBook_ToggleEntryFull();                
        
        // If Panel is close, trigger it
        bhs.myBook_TriggerPanelToggle();
    },
    
    entryView_table: function(){  $(bhs.entry).addClass('entryView_table'); },    
    entryView_cachel: function(){ $(bhs.entry).removeClass('entryView_table'); },
    entry_minAll: function() { bhs.myBook_CloseAllOpenEntries(); $('.berichtsheft-group .panel .panel-collapse .panel-collapse ').removeClass('in'); },
    
    options_button : function(b){
        $(b).on('click', function(){
            var option = $(this).attr('data-option');
            if (option=='full')         bhs.myBook_max(this);
            if (option=='entry_table')  bhs.entryView_table();
            if (option=='entry_cachel') bhs.entryView_cachel();
            if (option=='min_all')      bhs.entry_minAll();
        });
        return false;
    },
    
    
    
    
}