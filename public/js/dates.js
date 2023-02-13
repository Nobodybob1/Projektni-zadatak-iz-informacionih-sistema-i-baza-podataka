document.addEventListener('DOMContentLoaded', function() {
    
    const startDate = document.querySelector('.start_date');
    const endDate = document.querySelector('.end_date');

    startDate.addEventListener('change', function() {
        if (new Date(startDate.value) >= new Date(endDate.value)) {
            endDate.value = '';
        }
        endDate.min = startDate.value;
    });
});