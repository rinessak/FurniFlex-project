$(document).ready(function() {
    // Handle star rating click
    $('#starRating .fa-star').on('click', function() {
        var value = $(this).data('value');
        $('#reviewRating').val(value);
        // Highlight stars
        $('#starRating .fa-star').each(function(index) {
            if (index < value) {
                $(this).addClass('checked');
            } else {
                $(this).removeClass('checked');
            }
        });
    });
});
$(document).ready(function() {
    setTimeout(function() {
        $('.alert').fadeOut(2000); // Fade out over 2 seconds
    }, 7000); // Start fade out after 8 seconds
});
