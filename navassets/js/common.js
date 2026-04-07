// Show password toggle
// function togglePassword() {
//     const passwordInput = document.getElementById('password');
//     const toggleIcon = document.querySelector('.toggle-password');

//     if (passwordInput.type === 'password') {
//         passwordInput.type = 'text';
//         toggleIcon.innerHTML = '<i class="fa fa-eye-slash me-2"></i>';
//     } else {
//         passwordInput.type = 'password';
//         toggleIcon.innerHTML = '<i class="fa fa-eye me-2"></i>';
//     }
// }
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.toggle-password').forEach(el => {
        el.addEventListener('click', function () {

            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fa fa-eye me-2';
            } else {
                input.type = 'password';
                icon.className = 'fa fa-eye-slash me-2';
            }

        });
    });
});

// Alert auto-hide
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            alert.classList.remove('show');
        });
    }, 3000);
});

// Posts feed
$(document).ready(function () {

    $('.feed-text').each(function () {
        var element = $(this);
        if (this.scrollHeight > this.clientHeight) {
            element.next('.see-more').show();
        }
    });
});


$(document).on('click', '.see-more', function () {

    var text = $(this).prev('.feed-text');

    if (text.hasClass('expanded')) {
        text.removeClass('expanded');
        $(this).text('See more');
    } else {
        text.addClass('expanded');
        $(this).text('See less');
    }

});


