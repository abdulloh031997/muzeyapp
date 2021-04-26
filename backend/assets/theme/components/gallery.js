$(document).ready(function() {
    // Init sortable js
    $('.abk-gallery-in').sortable({
        handle: '.abk-gallery-item',
        animation: 150
    });

    // Remove button
    $(document).on('click', '.abk-gallery-item-remove', function() {
        var remove = confirm('Are you sure you want to delete this item?');

        if (remove == true) {
            $(this).parent().remove();
        }
    });
});