import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    // Confirmación para eliminar
    const deleteForms = document.querySelectorAll('.delete-form');
    
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (confirm('¿Estás seguro de que quieres eliminar este elemento?')) {
                this.submit();
            }
        });
    });
    
    // Validación en tiempo real
    const forms = document.querySelectorAll('form.needs-validation');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
});