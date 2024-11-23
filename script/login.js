document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var errorMessage = document.getElementById('errorMessage');

    // Dummy validation for demonstration
    if (username === "admin" && password === "admin123") {
        errorMessage.textContent = '';
        window.location.href = 'dashboard.html'; // Redirect to dashboard page
    } else {
        errorMessage.textContent = 'Username/Password yang anda masukan salah';
    }
});

document.getElementById('togglePassword').addEventListener('click', function() {
    var passwordInput = document.getElementById('password');
    var icon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
