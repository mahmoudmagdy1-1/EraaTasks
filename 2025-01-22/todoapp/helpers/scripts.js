let editButtons = document.querySelectorAll('.edit-btn');
        let cancelEditButtons = document.querySelectorAll('.cancel-edit');
        editButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const container = e.target.closest('.task-item');
                container.querySelector('.view-mode').style.display = 'none';
                container.querySelector('.edit-mode').style.display = 'block';
                container.querySelector('.edit-mode input').focus();
                btn.style.display = 'none';
            });
        });

        cancelEditButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const container = e.target.closest('.task-item');
                container.querySelector('.view-mode').style.display = 'flex';
                container.querySelector('.edit-mode').style.display = 'none';
                container.querySelector('.edit-btn').style.display = 'block';
            });
        });