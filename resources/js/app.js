require('./bootstrap');

// window.confirmDelete = function() {
//     const resp = confirm('Confirm?');
//     if(!resp) {
//         event.preventDefault();
//     }
// };

// dato che event è deprecated

const deleteForm = document.querySelectorAll('.delete_post');

deleteForm.forEach(item => {
    item.addEventListener('submit', function(e) {
        const resp = confirm('Confirm?');
        if(!resp) {
            e.preventDefault();
        }
    });
});