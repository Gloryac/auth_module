document.addEventListener('DOMContentLoaded', function() {
      // Remove 
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

// Check/uncheck 
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