let galleryMainSwiper = null;
let galleryThumbsSwiper = null;

// Open project modal
function openProjectModal(projectId) {
    const modal = document.getElementById('projectModal');
    const modalBody = document.getElementById('modalBody');
    const modalLoading = document.getElementById('modalLoading');

    // Show modal and loading state
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    modalBody.style.display = 'none';
    modalLoading.style.display = 'flex';

    // Fetch project details
    fetch(`/projects/${projectId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                populateModal(data.data);
                modalLoading.style.display = 'none';
                modalBody.style.display = 'block';
            } else {
                throw new Error(data.message);
            }
        })
        .catch(error => {
            console.error('Error loading project:', error);
            modalLoading.innerHTML = '<p class="error">Failed to load project details. Please try again.</p>';
        });
}

// Close project modal
function closeProjectModal() {
    const modal = document.getElementById('projectModal');
    modal.classList.remove('active');
    document.body.style.overflow = '';

    // Destroy swiper instances
    if (galleryMainSwiper) {
        galleryMainSwiper.destroy(true, true);
        galleryMainSwiper = null;
    }
    if (galleryThumbsSwiper) {
        galleryThumbsSwiper.destroy(true, true);
        galleryThumbsSwiper = null;
    }
}

// Populate modal with project data
function populateModal(project) {
    // Set basic info
    document.getElementById('projectTitle').textContent = project.name;
    document.getElementById('projectCategory').textContent = project.category;
    document.getElementById('projectDescription').textContent = project.long_description;
    document.getElementById('projectLiveLink').href = project.url;

    // Populate gallery
    const mainSlides = document.getElementById('galleryMainSlides');
    const thumbSlides = document.getElementById('galleryThumbSlides');
    mainSlides.innerHTML = '';
    thumbSlides.innerHTML = '';

    if (project.galleries && project.galleries.length > 0) {
        project.galleries.forEach(gallery => {
            // Main slides
            mainSlides.innerHTML += `
                <div class="swiper-slide">
                    <img src="${gallery.image}" alt="${gallery.caption}">
                    <div class="gallery-caption">${gallery.caption}</div>
                </div>
            `;

            // Thumbnail slides
            thumbSlides.innerHTML += `
                <div class="swiper-slide">
                    <img src="${gallery.image}" alt="${gallery.caption}">
                </div>
            `;
        });

        // Initialize gallery swipers
        initializeGallery();
    } else {
        // If no gallery, show main image
        mainSlides.innerHTML = `
            <div class="swiper-slide">
                <img src="${project.image}" alt="${project.name}">
            </div>
        `;
    }

    // Populate technologies
    const techContainer = document.getElementById('projectTechnologies');
    techContainer.innerHTML = '';
    if (project.technologies && project.technologies.length > 0) {
        project.technologies.forEach(tech => {
            techContainer.innerHTML += `<span class="tech-tag">${tech}</span>`;
        });
    }

    // Populate skills
    const skillsContainer = document.getElementById('projectSkills');
    skillsContainer.innerHTML = '';
    if (project.skills_used && project.skills_used.length > 0) {
        project.skills_used.forEach(skill => {
            skillsContainer.innerHTML += `<span class="skill-tag">${skill}</span>`;
        });
    }

    // Populate features
    const featuresContainer = document.getElementById('projectFeatures');
    featuresContainer.innerHTML = '';
    if (project.features && project.features.length > 0) {
        project.features.forEach(feature => {
            featuresContainer.innerHTML += `<li><i class="fas fa-check"></i> ${feature}</li>`;
        });
    }
}

// Initialize gallery swipers
function initializeGallery() {
    // Destroy existing instances
    if (galleryMainSwiper) galleryMainSwiper.destroy(true, true);
    if (galleryThumbsSwiper) galleryThumbsSwiper.destroy(true, true);

    // Initialize thumbs swiper
    galleryThumbsSwiper = new Swiper('.gallery-thumbs-swiper', {
        spaceBetween: 10,
        slidesPerView: 4,
        watchSlidesProgress: true,
        breakpoints: {
            640: {slidesPerView: 5},
            768: {slidesPerView: 6},
            1024: {slidesPerView: 7},
        }
    });

    // Initialize main swiper
    galleryMainSwiper = new Swiper('.gallery-main-swiper', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbsSwiper,
        },
    });
}

// Close modal on ESC key
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeProjectModal();
    }
});

// Set current year
document.getElementById('year').textContent = new Date().getFullYear();

// Initialize Swiper for Skills (Mobile only)
new Swiper('.swiper-container-skills', {
    slidesPerView: 1.15,
    spaceBetween: 15,
    pagination: {
        el: '.swiper-container-skills .swiper-pagination',
        clickable: true,
    },
    breakpoints: {768: {enabled: false}, 1024: {enabled: false}},
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
});

// Initialize Swiper for Projects (Mobile only)
new Swiper('.swiper-container-projects', {
    slidesPerView: 1.25,
    spaceBetween: 20,
    pagination: {
        el: '.swiper-container-projects .swiper-pagination',
        clickable: true,
    },
    breakpoints: {768: {enabled: false}, 1024: {enabled: false}},
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
});

// Navbar scroll effect
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Mobile menu toggle
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
});

// Close mobile menu when clicking a link
document.querySelectorAll('.nav-links a').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
    });
});

// Scroll reveal animation
function revealOnScroll() {
    const reveals = document.querySelectorAll('.reveal');
    reveals.forEach(element => {
        const windowHeight = window.innerHeight;
        const elementTop = element.getBoundingClientRect().top;
        const revealPoint = 80;

        if (elementTop < windowHeight - revealPoint) {
            element.classList.add('active');
        }
    });
}

window.addEventListener('scroll', revealOnScroll);
revealOnScroll();

// Smooth scroll for anchor links


// Contact form submission
document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const messageDiv = document.getElementById('formMessage');
    const submitBtn = this.querySelector('.btn-submit');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    submitBtn.disabled = true;

    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageDiv.innerHTML = `
                        <div style="padding: 1rem; background: #d4edda; color: #155724; border-radius: 10px; border: 1px solid #c3e6cb;">
                            <i class="fas fa-check-circle"></i> ${data.message}
                        </div>
                    `;
                this.reset();
            } else {
                messageDiv.innerHTML = `
                        <div style="padding: 1rem; background: #f8d7da; color: #721c24; border-radius: 10px; border: 1px solid #f5c6cb;">
                            <i class="fas fa-exclamation-circle"></i> ${data.message}
                        </div>
                    `;
            }
        })
        .catch(error => {
            messageDiv.innerHTML = `
                    <div style="padding: 1rem; background: #f8d7da; color: #721c24; border-radius: 10px; border: 1px solid #f5c6cb;">
                        <i class="fas fa-exclamation-circle"></i> An error occurred. Please try again.
                    </div>
                `;
        })
        .finally(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            setTimeout(() => {
                messageDiv.innerHTML = '';
            }, 5000);
        });
});

function createParticle() {
    const particle = document.createElement('div');
    particle.style.position = 'fixed';
    particle.style.width = '4px';
    particle.style.height = '4px';
    particle.style.background = 'rgba(255, 255, 255, 0.5)';
    particle.style.borderRadius = '50%';
    particle.style.pointerEvents = 'none';
    particle.style.left = Math.random() * window.innerWidth + 'px';
    particle.style.top = window.innerHeight + 'px';
    particle.style.zIndex = '1';

    document.body.appendChild(particle);

    const duration = Math.random() * 3000 + 2000;
    const drift = (Math.random() - 0.5) * 100;

    particle.animate([
        {transform: 'translateY(0px) translateX(0px)', opacity: 0},
        {transform: `translateY(-${window.innerHeight + 100}px) translateX(${drift}px)`, opacity: 1},
        {transform: `translateY(-${window.innerHeight + 200}px) translateX(${drift * 2}px)`, opacity: 0}
    ], {
        duration: duration,
        easing: 'linear'
    }).onfinish = () => particle.remove();
}

// Create particles periodically
setInterval(createParticle, 300);

// Cursor trail effect
const trail = [];
const trailLength = 20;

document.addEventListener('mousemove', (e) => {
    if (window.innerWidth > 768) {
        trail.push({x: e.clientX, y: e.clientY, time: Date.now()});

        if (trail.length > trailLength) {
            trail.shift();
        }

        trail.forEach((point, index) => {
            const age = Date.now() - point.time;
            if (age < 500) {
                const dot = document.createElement('div');
                dot.style.position = 'fixed';
                dot.style.left = point.x + 'px';
                dot.style.top = point.y + 'px';
                dot.style.width = '6px';
                dot.style.height = '6px';
                dot.style.background = `rgba(102, 126, 234, ${1 - age / 500})`;
                dot.style.borderRadius = '50%';
                dot.style.pointerEvents = 'none';
                dot.style.zIndex = '9999';
                dot.style.transform = 'translate(-50%, -50%)';

                document.body.appendChild(dot);

                setTimeout(() => dot.remove(), 100);
            }
        });
    }
});
// Add tilt effect to cards (desktop only)
if (window.innerWidth > 768) {
    document.querySelectorAll('.skill-card, .project-card, .tool-item, .personal-card').forEach(card => {
        card.addEventListener('mousemove', function (e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = (y - centerY) / 15;
            const rotateY = (centerX - x) / 15;
            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
        });

        card.addEventListener('mouseleave', function () {
            this.style.transform = '';
        });
    });
}

// Typing effect for hero subtitle
const subtitle = document.querySelector('.profile-title');
if (subtitle) {
    const text = subtitle.textContent;
    subtitle.textContent = '';
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            subtitle.textContent += text.charAt(index);
            index++;
            setTimeout(typeWriter, 100);
        } else {
            // After finishing, wait a bit, then restart
            setTimeout(() => {
                subtitle.textContent = '';
                index = 0;
                typeWriter();
            }, 1000); // restart delay
        }
    }

    window.addEventListener('load', () => {
        setTimeout(typeWriter, 800);
    });
}

