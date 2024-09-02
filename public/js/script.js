document.addEventListener('DOMContentLoaded', function () {
    // Get references to the elements
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('toggle-password');
    const form = document.getElementById('password-form');

    // Check if both elements are present
    if (passwordInput && togglePassword) {
        // Set up the event listener for toggling password visibility
        togglePassword.addEventListener('click', function (e) {
            e.preventDefault();
            // Toggle password visibility
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    }

    // Check if form exists before adding the event listener
    if (form) {
        form.addEventListener('submit', function () {
            // Ensure password input type is reset to 'password' before submission
            if (passwordInput) {
                passwordInput.type = 'password';
            }
        });
    }
});
