document.addEventListener('DOMContentLoaded', function() {
    // Password visibility toggle
    const eyeIcon = document.getElementById("eye");
    const passwordField = document.getElementById("password");
    if (eyeIcon && passwordField) {
        eyeIcon.addEventListener("click", () => {
            if (passwordField.type === "password" && passwordField.value) {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        });
    }

   // Remove todo
   document.querySelectorAll('.remove-to-do').forEach(item => {
    item.addEventListener('click', async function() {
        const id = this.getAttribute('id');
        try {
            const response = await fetch('../assets/remove.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            });
            const data = await response.text();
            if (data === '1') {
                this.parentElement.style.display = 'none';
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to remove task. Please try again.');
        }
    });
});

// Check/uncheck todo
document.querySelectorAll('.check-box').forEach(item => {
    item.addEventListener('click', async function() {
        const id = this.getAttribute('data-todo-id');
        try {
            const response = await fetch('../assets/check.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'id=' + encodeURIComponent(id)
            });
            const data = await response.text();
            if (data !== 'error') {
                const h2 = this.nextElementSibling;
                if (data === '1') {
                    h2.classList.remove('checked');
                } else {
                    h2.classList.add('checked');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Failed to update task status. Please try again.');
        }
    });
});
});