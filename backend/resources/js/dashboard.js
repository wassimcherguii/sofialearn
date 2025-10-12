// SofiaLearn Dashboard JavaScript
// Centralized functionality for all dashboard pages

document.addEventListener('DOMContentLoaded', function() {
    // Initialize RTL mode
    const isRTL = document.documentElement.dir === 'rtl';
    if (isRTL) {
        document.body.classList.add('rtl-mode');
    }

    // Mobile sidebar functionality
    const openSidebar = document.getElementById('openSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (openSidebar && sidebar) {
        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('hidden');
            if (overlay) overlay.classList.remove('hidden');
        });
    }

    if (overlay && sidebar) {
        overlay.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    }

    // Sidebar toggle functionality
    const toggleSidebar = document.getElementById('toggleSidebar');
    if (toggleSidebar && sidebar) {
        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    }

    // Language dropdown functionality
    const languageDropdown = document.getElementById('languageDropdownMenu');
    if (languageDropdown) {
        const languageButtons = languageDropdown.querySelectorAll('button[data-locale]');
        languageButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const locale = btn.getAttribute('data-locale');
                const input = document.getElementById('locale-input');
                const form = document.getElementById('locale-switch-form');
                if (locale && input && form) {
                    input.value = locale;
                    form.submit();
                }
            });
        });
    }

    // Notification dropdown functionality
    const notificationButton = document.getElementById('notificationButton');
    const notificationDropdown = document.getElementById('notificationDropdown');
    if (notificationButton && notificationDropdown) {
        notificationButton.addEventListener('click', () => {
            notificationDropdown.classList.toggle('hidden');
        });

        // Close notification dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!notificationButton.contains(e.target) && !notificationDropdown.contains(e.target)) {
                notificationDropdown.classList.add('hidden');
            }
        });
    }

    // Initialize Flowbite components
    if (typeof window.initFlowbite === 'function') {
        window.initFlowbite();
    }

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('[role="alert"]');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });

    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.querySelector(link.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form validation enhancement
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                // Show error message
                const errorMsg = document.createElement('div');
                errorMsg.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4';
                errorMsg.textContent = isRTL ? 'يرجى ملء جميع الحقول المطلوبة' : 'Please fill in all required fields';
                form.insertBefore(errorMsg, form.firstChild);
                
                setTimeout(() => {
                    errorMsg.remove();
                }, 5000);
            }
        });
    });

    // Table row hover effects
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.classList.add('bg-gray-50');
        });
        row.addEventListener('mouseleave', () => {
            row.classList.remove('bg-gray-50');
        });
    });

    // Card hover effects
    const cards = document.querySelectorAll('.sofia-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('shadow-lg');
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('shadow-lg');
        });
    });

    // Loading states for buttons
    const buttons = document.querySelectorAll('button[type="submit"]');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const originalText = button.textContent;
            button.textContent = isRTL ? 'جاري التحميل...' : 'Loading...';
            button.disabled = true;
            
            // Re-enable after 3 seconds (adjust as needed)
            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
            }, 3000);
        });
    });
});

// Utility functions
window.SofiaDashboard = {
    // Show notification
    showNotification: function(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            type === 'warning' ? 'bg-yellow-500 text-black' :
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 5000);
    },
    
    // Toggle sidebar
    toggleSidebar: function() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar) {
            sidebar.classList.toggle('collapsed');
        }
    },
    
    // Close mobile sidebar
    closeMobileSidebar: function() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        if (sidebar) sidebar.classList.add('hidden');
        if (overlay) overlay.classList.add('hidden');
    }
};


