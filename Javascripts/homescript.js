// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});


// Set default dates (today and tomorrow)
const today = new Date();
const tomorrow = new Date(today);
tomorrow.setDate(tomorrow.getDate() + 1);

const pickupDate = document.querySelector('input[type="date"]');
const returnDate = document.querySelectorAll('input[type="date"]')[1];

if (pickupDate && returnDate) {
    pickupDate.value = today.toISOString().split('T')[0];
    returnDate.value = tomorrow.toISOString().split('T')[0];
}

// editing user field
const nameField = document.getElementById('nameField');
const editButton = document.getElementById('editButton');

editButton.addEventListener('click', () => {
    if (nameField.hasAttribute('readonly')) {
    nameField.removeAttribute('readonly');
    nameField.classList.remove('bg-gray-100');
    nameField.classList.add('bg-white');
    nameField.focus();
    editButton.textContent = 'Save';
    } else {
    nameField.setAttribute('readonly', true);
    nameField.classList.remove('bg-white');
    nameField.classList.add('bg-gray-100');
    editButton.textContent = 'Edit';
    }
});

