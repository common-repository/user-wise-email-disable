(function($) {
    var uwed_javascript_obj = {
        __init: function() {
            jQuery(window).on('load', this.uwed_load_script);
            jQuery("body").on("sortstop", ".uwed__main-block .uwed__col-inner", this.uwed_dragdrop_event);
        },
        uwed_load_script: function() {
            jQuery(".uwed-main-sortable, .uwed-list-sortable").sortable({
                connectWith: ".uwed__col-inner",
                stack: '.uwed__col-inner'
            }).disableSelection();
        },
        uwed_dragdrop_event: function(event, ui) {
            console.log('hhh');

            jQuery('.uwed__drag-drop input').each(function(key, value) {
                jQuery(value).attr('name', 'uwed__list_user[]');
            });

            jQuery('.uwed__drag-show input').each(function(key, value) {
                jQuery(value).removeAttr('name');
            });
        },
    };

    uwed_javascript_obj.__init();
})(jQuery);