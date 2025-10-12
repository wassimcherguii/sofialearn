// SofiaLearn User Pages JavaScript
// Centralized functionality for all user-facing pages

document.addEventListener('DOMContentLoaded', function() {
    // Initialize RTL mode
    const isRTL = document.documentElement.dir === 'rtl';
    if (isRTL) {
        document.body.classList.add('rtl-mode');
    }

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (mobileMenuButton && mobileMenu && 
            !mobileMenuButton.contains(e.target) && 
            !mobileMenu.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    // Navbar scroll effect
    const navbar = document.getElementById('mainNav');
    if (navbar) {
        let lastScrollY = window.scrollY;
        
        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            lastScrollY = currentScrollY;
        });
    }

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 80; // Account for fixed navbar
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('sofia-animate-fade-in-up');
            }
        });
    }, observerOptions);

    // Observe elements with animation classes
    const animatedElements = document.querySelectorAll('.sofia-animate-fade-in-up');
    animatedElements.forEach(el => {
        observer.observe(el);
    });

    // Form validation and submission
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                    
                    // Show error message
                    let errorMsg = field.parentNode.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('p');
                        errorMsg.className = 'error-message text-red-500 text-sm mt-1';
                        field.parentNode.appendChild(errorMsg);
                    }
                    errorMsg.textContent = isRTL ? 'هذا الحقل مطلوب' : 'This field is required';
                } else {
                    field.classList.remove('border-red-500');
                    const errorMsg = field.parentNode.querySelector('.error-message');
                    if (errorMsg) {
                        errorMsg.remove();
                    }
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showNotification(
                    isRTL ? 'يرجى ملء جميع الحقول المطلوبة' : 'Please fill in all required fields',
                    'error'
                );
            }
        });
    });

    // Newsletter subscription
    const newsletterForms = document.querySelectorAll('form[action*="newsletter"]');
    newsletterForms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = form.querySelector('input[type="email"]').value;
            
            if (email) {
                // Simulate API call
                setTimeout(() => {
                    showNotification(
                        isRTL ? 'تم الاشتراك بنجاح!' : 'Successfully subscribed!',
                        'success'
                    );
                    form.reset();
                }, 1000);
            }
        });
    });

    // Card hover effects
    const cards = document.querySelectorAll('.sofia-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-4px)';
            card.style.boxShadow = '0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)';
        });
    });

    // Button loading states
    const buttons = document.querySelectorAll('button[type="submit"], .sofia-btn');
    buttons.forEach(button => {
        button.addEventListener('click', (e) => {
            if (button.type === 'submit' || button.classList.contains('sofia-btn-primary')) {
                const originalText = button.textContent;
                button.textContent = isRTL ? 'جاري التحميل...' : 'Loading...';
                button.disabled = true;
                
                // Re-enable after 3 seconds (adjust as needed)
                setTimeout(() => {
                    button.textContent = originalText;
                    button.disabled = false;
                }, 3000);
            }
        });
    });

    // Lazy loading for images
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => {
        imageObserver.observe(img);
    });

    // Initialize tooltips (if using Flowbite)
    if (typeof window.initTooltips === 'function') {
        window.initTooltips();
    }

    // Initialize dropdowns (if using Flowbite)
    if (typeof window.initDropdowns === 'function') {
        window.initDropdowns();
    }
});

// Utility functions
window.SofiaUser = {
    // Show notification
    showNotification: function(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform transition-all duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            type === 'warning' ? 'bg-yellow-500 text-black' :
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Remove after 5 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    },
    
    // Smooth scroll to element
    scrollToElement: function(elementId) {
        const element = document.querySelector(elementId);
        if (element) {
            const offsetTop = element.offsetTop - 80;
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    },
    
    // Toggle mobile menu
    toggleMobileMenu: function() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('hidden');
        }
    },
    
    // Close mobile menu
    closeMobileMenu: function() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.add('hidden');
        }
    }
};

// Global notification function
function showNotification(message, type = 'info') {
    window.SofiaUser.showNotification(message, type);
}


