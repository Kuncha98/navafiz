const mobileToggle = document.getElementById('mobileMenuToggle');
const mobileMenu = document.querySelector('.mobile-menu');
const overlay = document.querySelector('.mobile-menu-overlay');
const closeBtn = document.querySelector('.close-mobile-menu');

// Open menu
mobileToggle.addEventListener('click', () => {
    mobileMenu.classList.add('open');
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden'; // disable scroll
});

// Close menu
closeBtn.addEventListener('click', () => {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
});
overlay.addEventListener('click', () => {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
});

// Submenu toggle
document.querySelectorAll('.submenu-toggle').forEach(toggle => {
    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        const submenu = this.nextElementSibling;
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        this.querySelector('span').textContent = submenu.style.display === 'block' ? '-' : '+';
    });
});

const wrapper = document.querySelector(".image-wrapper");
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            wrapper.classList.add("show");
        }
    });
}, { threshold: 0.3 });
observer.observe(wrapper);
