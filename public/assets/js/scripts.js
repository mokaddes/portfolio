
    // Set current year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
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
    const revealPoint = 100;

    if (elementTop < windowHeight - revealPoint) {
    element.classList.add('active');
}
});
}

    window.addEventListener('scroll', revealOnScroll);

    // Initial check for elements in viewport
    revealOnScroll();

    // Smooth scroll for anchor links
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

    // Add floating particles effect
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
{ transform: 'translateY(0px) translateX(0px)', opacity: 0 },
{ transform: `translateY(-${window.innerHeight + 100}px) translateX(${drift}px)`, opacity: 1 },
{ transform: `translateY(-${window.innerHeight + 200}px) translateX(${drift * 2}px)`, opacity: 0 }
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
    trail.push({ x: e.clientX, y: e.clientY, time: Date.now() });

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

    // Parallax effect for hero section
    window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroContent = document.querySelector('.hero-content');
    if (heroContent && scrolled < window.innerHeight) {
    heroContent.style.transform = `translateY(${scrolled * 0.3}px)`;
    heroContent.style.opacity = 1 - (scrolled / window.innerHeight * 0.5);
}
});

    // Add tilt effect to cards
    document.querySelectorAll('.skill-card, .project-card, .tool-item, .personal-card').forEach(card => {
    card.addEventListener('mouseenter', function(e) {
        this.style.transition = 'transform 0.1s';
    });

    card.addEventListener('mousemove', function(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    const centerX = rect.width / 2;
    const centerY = rect.height / 2;

    const rotateX = (y - centerY) / 10;
    const rotateY = (centerX - x) / 10;

    this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
});

    card.addEventListener('mouseleave', function() {
    this.style.transition = 'transform 0.3s';
    this.style.transform = '';
});
});

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
}
}

    // Start typing effect after page load
    window.addEventListener('load', () => {
    setTimeout(typeWriter, 800);
});
}

    // Add skill card animation on hover
    document.querySelectorAll('.skill-card').forEach(card => {
    const icon = card.querySelector('.skill-icon');

    card.addEventListener('mouseenter', () => {
    icon.style.transform = 'scale(1.2) rotate(5deg)';
    icon.style.transition = 'transform 0.3s';
});

    card.addEventListener('mouseleave', () => {
    icon.style.transform = 'scale(1) rotate(0deg)';
});
});

    // Add project card hover effect
    document.querySelectorAll('.project-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        const image = this.querySelector('.project-image');
        image.style.transform = 'scale(1.1)';
        image.style.transition = 'transform 0.3s';
    });

    card.addEventListener('mouseleave', function() {
    const image = this.querySelector('.project-image');
    image.style.transform = 'scale(1)';
});
});

    // Performance optimization: Throttle scroll events
    function throttle(func, wait) {
    let timeout;
    return function executedFunction(...args) {
    const later = () => {
    clearTimeout(timeout);
    func(...args);
};
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
};
}

    // Apply throttling to scroll events
    window.addEventListener('scroll', throttle(() => {
    revealOnScroll();
}, 100));
