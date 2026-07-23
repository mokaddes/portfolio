/* =============================================
   Portfolio JS — Animations, Interactions, AJAX
   ============================================= */

document.addEventListener('DOMContentLoaded', () => {

    /* ------------------------------------------
       FLOATING PARTICLES
    ------------------------------------------ */
    function createParticles() {
        const colors = ['#6366f1', '#06b6d4', '#a78bfa', '#22c55e'];
        for (let i = 0; i < 22; i++) {
            const el = document.createElement('div');
            el.className = 'particle';
            const size = Math.random() * 5 + 2;
            el.style.cssText = `
                width: ${size}px;
                height: ${size}px;
                background: ${colors[Math.floor(Math.random() * colors.length)]};
                left: ${Math.random() * 100}vw;
                animation-duration: ${Math.random() * 20 + 15}s;
                animation-delay: ${Math.random() * 15}s;
            `;
            document.querySelector('.bg-animation').appendChild(el);
        }
    }
    createParticles();

    /* ------------------------------------------
       NAVBAR SCROLL BEHAVIOUR
    ------------------------------------------ */
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-links a');
    const sections = document.querySelectorAll('section[id]');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        highlightNavLink();
    }, { passive: true });

    /* Active nav link on scroll */
    function highlightNavLink() {
        let current = '';
        sections.forEach(sec => {
            if (window.scrollY >= sec.offsetTop - 120) {
                current = sec.getAttribute('id');
            }
        });
        navLinks.forEach(a => {
            a.classList.remove('active');
            if (a.getAttribute('href') === '#' + current) {
                a.classList.add('active');
            }
        });
    }

    /* ------------------------------------------
       HAMBURGER MENU (MOBILE)
    ------------------------------------------ */
    const hamburger = document.getElementById('hamburger');
    const navMenu   = document.getElementById('navLinks');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open');
            navMenu.classList.toggle('open');
            document.body.style.overflow = navMenu.classList.contains('open') ? 'hidden' : '';
        });

        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('open');
                navMenu.classList.remove('open');
                document.body.style.overflow = '';
            });
        });

        document.addEventListener('click', e => {
            if (!navbar.contains(e.target) && navMenu.classList.contains('open')) {
                hamburger.classList.remove('open');
                navMenu.classList.remove('open');
                document.body.style.overflow = '';
            }
        });
    }

    /* ------------------------------------------
       TYPING ANIMATION (HERO TITLE)
    ------------------------------------------ */
    const titleEl = document.querySelector('.profile-title-typing');
    if (titleEl) {
        const texts  = titleEl.dataset.texts ? JSON.parse(titleEl.dataset.texts) : [titleEl.textContent.trim()];
        const cursor = document.createElement('span');
        cursor.className = 'typing-cursor';
        cursor.textContent = '|';
        cursor.style.cssText = 'color: #6366f1; animation: blink-cursor 0.75s step-end infinite; margin-left: 2px;';

        const style = document.createElement('style');
        style.textContent = '@keyframes blink-cursor { 50% { opacity: 0; } }';
        document.head.appendChild(style);

        titleEl.textContent = '';
        titleEl.appendChild(cursor);

        let textIdx = 0, charIdx = 0, deleting = false;

        function type() {
            const current = texts[textIdx];
            if (!deleting) {
                titleEl.textContent = current.slice(0, charIdx + 1);
                titleEl.appendChild(cursor);
                charIdx++;
                if (charIdx === current.length) {
                    deleting = true;
                    setTimeout(type, 2000);
                    return;
                }
            } else {
                titleEl.textContent = current.slice(0, charIdx - 1);
                titleEl.appendChild(cursor);
                charIdx--;
                if (charIdx === 0) {
                    deleting = false;
                    textIdx = (textIdx + 1) % texts.length;
                    setTimeout(type, 400);
                    return;
                }
            }
            setTimeout(type, deleting ? 40 : 80);
        }
        setTimeout(type, 800);
    }

    /* ------------------------------------------
       REVEAL ON SCROLL (INTERSECTION OBSERVER)
    ------------------------------------------ */
    const reveals = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry, idx) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const delay = (el.dataset.delay || 0);
                    setTimeout(() => el.classList.add('visible'), delay * 100);
                    io.unobserve(el);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        reveals.forEach((el, i) => {
            el.dataset.delay = i % 6;
            io.observe(el);
        });
    } else {
        reveals.forEach(el => el.classList.add('visible'));
    }

    /* ------------------------------------------
       COUNTER ANIMATION
    ------------------------------------------ */
    document.querySelectorAll('.stat-number[data-count]').forEach(el => {
        const target = parseInt(el.dataset.count, 10);
        const suffix = el.dataset.suffix || '';
        let start = 0;
        const duration = 1800;
        const step = target / (duration / 16);

        const io2 = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                const timer = setInterval(() => {
                    start = Math.min(start + step, target);
                    el.textContent = Math.round(start) + suffix;
                    if (start >= target) clearInterval(timer);
                }, 16);
                io2.disconnect();
            }
        });
        io2.observe(el);
    });

    /* ------------------------------------------
       SWIPER — SKILLS (MOBILE)
    ------------------------------------------ */
    if (document.querySelector('.swiper-container-skills')) {
        new Swiper('.swiper-container-skills', {
            slidesPerView: 1.3,
            spaceBetween: 16,
            centeredSlides: false,
            pagination: { el: '.swiper-container-skills .swiper-pagination', clickable: true },
            breakpoints: {
                480: { slidesPerView: 2.2 },
                640: { slidesPerView: 3.2 },
            }
        });
    }

    /* ------------------------------------------
       SWIPER — PROJECTS (MOBILE)
    ------------------------------------------ */
    if (document.querySelector('.swiper-container-projects')) {
        new Swiper('.swiper-container-projects', {
            slidesPerView: 1.1,
            spaceBetween: 16,
            centeredSlides: false,
            pagination: { el: '.swiper-container-projects .swiper-pagination', clickable: true },
            breakpoints: {
                540: { slidesPerView: 1.5 },
                768: { slidesPerView: 2.2 },
            }
        });
    }

    /* ------------------------------------------
       PROJECT MODAL
    ------------------------------------------ */
    let galleryMainSwiper, galleryThumbsSwiper;

    window.openProjectModal = function(id) {
        const modal   = document.getElementById('projectModal');
        const loading = document.getElementById('modalLoading');
        const body    = document.getElementById('modalBody');

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        loading.style.display = 'flex';
        body.style.display = 'none';

        fetch('/projects/' + id)
            .then(r => r.json())
            .then(res => {
                if (!res.success) throw new Error('Not found');
                populateModal(res.data);
                loading.style.display = 'none';
                body.style.display = 'block';
            })
            .catch(() => {
                loading.innerHTML = '<p style="color:#ef4444">Could not load project details.</p>';
            });
    };

    function populateModal(p) {
        document.getElementById('projectTitle').textContent    = p.name;
        document.getElementById('projectCategory').textContent = p.category;
        document.getElementById('projectDescription').textContent = p.long_description || p.short_description;
        document.getElementById('projectLiveLink').href        = p.url || '#';

        // Galleries
        const mainSlides  = document.getElementById('galleryMainSlides');
        const thumbSlides = document.getElementById('galleryThumbSlides');
        mainSlides.innerHTML = '';
        thumbSlides.innerHTML = '';

        const images = p.galleries && p.galleries.length > 0
            ? p.galleries
            : [{ image: p.image, caption: p.name }];

        images.forEach(g => {
            mainSlides.innerHTML += `<div class="swiper-slide"><img src="${g.image}" alt="${g.caption || ''}"></div>`;
            thumbSlides.innerHTML += `<div class="swiper-slide"><img src="${g.image}" alt="${g.caption || ''}"></div>`;
        });

        if (galleryThumbsSwiper) galleryThumbsSwiper.destroy(true, true);
        if (galleryMainSwiper)  galleryMainSwiper.destroy(true, true);

        galleryThumbsSwiper = new Swiper('.gallery-thumbs-swiper', {
            slidesPerView: 4,
            spaceBetween: 8,
            freeMode: true,
            watchSlidesProgress: true,
        });

        galleryMainSwiper = new Swiper('.gallery-main-swiper', {
            spaceBetween: 10,
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            thumbs: { swiper: galleryThumbsSwiper },
        });

        // Technologies
        const techs = document.getElementById('projectTechnologies');
        techs.innerHTML = (p.technologies || []).map(t => `<span class="tech-tag">${t}</span>`).join('') || '<span style="color: var(--text-muted)">—</span>';

        // Skills
        const skills = document.getElementById('projectSkills');
        skills.innerHTML = (p.skills_used || []).map(s => `<span class="skill-tag">${s}</span>`).join('') || '<span style="color: var(--text-muted)">—</span>';

        // Features
        const features = document.getElementById('projectFeatures');
        features.innerHTML = (p.features || []).map(f => `<li>${f}</li>`).join('') || '<li>No features listed.</li>';
    }

    window.closeProjectModal = function() {
        const modal = document.getElementById('projectModal');
        modal.classList.remove('active');
        document.body.style.overflow = '';
    };

    // Close on ESC
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') window.closeProjectModal();
    });

    /* ------------------------------------------
       CONTACT FORM — AJAX
    ------------------------------------------ */
    const contactForm = document.getElementById('contactForm');
    const formMsg     = document.getElementById('formMessage');

    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = this.querySelector('.btn-submit');
            const originalHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            btn.disabled = true;

            try {
                const res = await fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await res.json().catch(() => ({}));
                if (res.ok) {
                    formMsg.innerHTML = '<div class="alert-success"><i class="fas fa-check-circle"></i> Message sent! I will get back to you soon.</div>';
                    this.reset();
                } else {
                    formMsg.innerHTML = '<div class="alert-danger"><i class="fas fa-exclamation-circle"></i> ' + (data.message || 'Something went wrong. Please try again.') + '</div>';
                }
            } catch (err) {
                formMsg.innerHTML = '<div class="alert-danger"><i class="fas fa-exclamation-circle"></i> Network error. Please try again.</div>';
            }

            btn.innerHTML = originalHtml;
            btn.disabled = false;
            setTimeout(() => { formMsg.innerHTML = ''; }, 6000);
        });
    }

    /* ------------------------------------------
       YEAR IN FOOTER
    ------------------------------------------ */
    const yearEl = document.getElementById('year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();

    /* ------------------------------------------
       SMOOTH SCROLL (for anchor links)
    ------------------------------------------ */
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) {
                e.preventDefault();
                window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' });
            }
        });
    });

});
