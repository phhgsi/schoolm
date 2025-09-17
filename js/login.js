
$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: 'api/login.php',
            type: 'POST',
            dataType: 'json',
            data: { username: username, password: password },
            success: function(data) {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert(data.error);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = xhr.responseJSON ? xhr.responseJSON.error : 'An error occurred';
                alert(errorMessage);
            }
        });
    });
});
