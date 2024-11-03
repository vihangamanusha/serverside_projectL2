$(document).ready(function() {
 
    $(".interactive-image").fadeIn(2000); 
    $("h1").delay(500).fadeIn(2000); 
});



function validateForm() {
    const requiredFields = [
        'nic', 'firstName', 'lastName', 'dob', 'sex',
        'height', 'weight', 'maritalStatus',
        'contactNumber', 'email', 'address',
        'emergencyFirstName', 'emergencyLastName', 
        'relationship', 'emergencyContactNumber'
    ];

    let valid = true;
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value) {
            valid = false;
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    return valid; 
}