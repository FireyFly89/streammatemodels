(function ($) {
    var $body = $('body');

    $body.on('click', '.event-delete', function(e){
        e.preventDefault();

        if (confirm("Are you sure?") === true) {
            $.ajax({
                type: "post",
                dataType: "json",
                url: widget_vars.ajax_url,
                data: {
                    action: 'delete_event',
                    delete_event: $(this).data('event-id'),
                    security_nonce: widget_vars.security_nonce,
                },
            }).always(function () {
                window.location.replace(widget_vars.event_manager_url);
            });
        }
    });

    $body.on('submit', '#eventEditAdd', function(e){
        var name = $(this).find('#eventName').val();
        var $date_from = $(this).find('#eventDateFrom');
        var $date_to = $(this).find('#eventDateTo');
        var date_from = $date_from.val();
        var date_to = $date_to.val();

        if (name.length <= 0) {
            e.preventDefault();
            alert('Please fill in the name field!');
            return;
        }

        if (date_from.length <= 0 || date_to.length <= 0) {
            e.preventDefault();
            alert('Please fill in both date fields!');
            return;
        }

        date_from = new Date($date_from);
        date_to = new Date($date_to);

        if (date_from >= date_to) {
            e.preventDefault();
            alert('Date from should be lower than date to!');
        }
    });
})(jQuery);
