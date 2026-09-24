/**
 * Portfolio Dynamic Script
 * Smooth scroll, active navbar state on scroll, and AJAX contact submission
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar shrink & background blur adjustment on scroll
    const navbar = document.querySelector('.navbar-custom');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 40) {
            navbar.style.padding = '0.6rem 0';
            navbar.style.background = 'rgba(9, 13, 22, 0.92)';
        } else {
            navbar.style.padding = '0.9rem 0';
            navbar.style.background = 'rgba(9, 13, 22, 0.8)';
        }
    });

    // 2. Active nav link highlight based on scroll position
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link-custom');

    function highlightNav() {
        const scrollY = window.pageYOffset;
        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 120;
            const sectionId = current.getAttribute('id');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}` || link.getAttribute('href') === `/#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }
    window.addEventListener('scroll', highlightNav);

    // 3. Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // 4. AJAX Contact Form handler with instant user feedback
    const contactForm = document.getElementById('portfolioContactForm');
    const formFeedback = document.getElementById('contactFormFeedback');

    if (contactForm && formFeedback) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
            formFeedback.style.display = 'none';

            const formData = new FormData(contactForm);

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok) {
                    formFeedback.className = 'alert alert-success d-flex align-items-center gap-2 mt-3';
                    formFeedback.innerHTML = `<i class="bi bi-check-circle-fill"></i> ${data.message || 'Pesan Anda telah berhasil dikirim!'}`;
                    formFeedback.style.display = 'flex';
                    contactForm.reset();
                } else {
                    const errorMsg = data.message || 'Terjadi kesalahan saat mengirim pesan. Silakan periksa kembali isian formulir.';
                    formFeedback.className = 'alert alert-danger d-flex align-items-center gap-2 mt-3';
                    formFeedback.innerHTML = `<i class="bi bi-exclamation-triangle-fill"></i> ${errorMsg}`;
                    formFeedback.style.display = 'flex';
                }
            } catch (error) {
                formFeedback.className = 'alert alert-danger d-flex align-items-center gap-2 mt-3';
                formFeedback.innerHTML = `<i class="bi bi-wifi-off"></i> Gagal menghubungi server. Silakan coba kembali atau hubungi via WhatsApp/Email.`;
                formFeedback.style.display = 'flex';
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    }
});
