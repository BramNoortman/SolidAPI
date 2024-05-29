// Function to close all forms
function closeAllForms() {
    document.getElementById('salesInputForm').style.display = 'none';
    document.getElementById('resourceInputForm').style.display = 'none';
    document.getElementById('totalInputForm').style.display = 'none';
}

// Event listener for the open form button in the Sales Omzet card
document.querySelector('.sales.card .open-form-button').addEventListener('click', function() {
    closeAllForms();
    document.getElementById('salesInputForm').style.display = 'block';
});

// Event listener for the open form button in the Resources Omzet card
document.querySelector('.resources.card .open-form-button').addEventListener('click', function() {
    closeAllForms();
    document.getElementById('resourceInputForm').style.display = 'block';
});

// Event listener for the open form button in the Total Omzet card
document.querySelector('.total.card .open-form-button').addEventListener('click', function() {
    closeAllForms();
    document.getElementById('totalInputForm').style.display = 'block';
});

// Event listener for the close form button in the Sales Omzet form
document.getElementById('closeSalesFormButton').addEventListener('click', function() {
    document.getElementById('salesInputForm').style.display = 'none';
});

// Event listener for the close form button in the Resources Omzet form
document.getElementById('closeResourceFormButton').addEventListener('click', function() {
    document.getElementById('resourceInputForm').style.display = 'none';
});

// Event listener for the close form button in the Total Omzet form
document.getElementById('closeTotalFormButton').addEventListener('click', function() {
    document.getElementById('totalInputForm').style.display = 'none';
});


