 // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

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
                // Close mobile menu if open
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });

        // Booking form submission
        document.getElementById('booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Create success message
            const successDiv = document.createElement('div');
            successDiv.className = 'mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md';
            successDiv.innerHTML = '✅ Search completed! Available cars are displayed below.';
            
            // Remove any existing success message
            const existingMessage = this.parentNode.querySelector('.mt-4');
            if (existingMessage) {
                existingMessage.remove();
            }
            
            // Add success message
            this.parentNode.appendChild(successDiv);
            
            // Scroll to cars section
            setTimeout(() => {
                document.getElementById('cars').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 1000);
        });

        // Contact form submission
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Create success message
            const successDiv = document.createElement('div');
            successDiv.className = 'mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md';
            successDiv.innerHTML = '✅ Thank you for your message! We\'ll get back to you within 24 hours.';
            
            // Remove any existing success message
            const existingMessage = this.parentNode.querySelector('.mt-4');
            if (existingMessage) {
                existingMessage.remove();
            }
            
            // Add success message and reset form
            this.parentNode.appendChild(successDiv);
            this.reset();
        });

        // Car booking buttons
        document.querySelectorAll('.car-card button').forEach(button => {
            button.addEventListener('click', function() {
                const carName = this.closest('.car-card').querySelector('h3').textContent;
                
                // Create booking confirmation
                const confirmDiv = document.createElement('div');
                confirmDiv.className = 'fixed top-20 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
                confirmDiv.innerHTML = '🎉 ${carName} added to your booking! Complete your reservation above.';
                
                document.body.appendChild(confirmDiv);
                
                // Remove confirmation after 3 seconds
                setTimeout(() => {
                    confirmDiv.remove();
                }, 3000);
                
                // Scroll to booking form
                document.getElementById('home').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
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


