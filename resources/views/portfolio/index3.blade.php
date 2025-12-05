<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Mokaddes Hosain - Professional Laravel Developer specializing in PHP, REST API, and modern web applications. Building robust solutions with clean code.">
    <meta name="keywords"
          content="Laravel Developer, PHP Developer, Web Developer, REST API, Full Stack Developer, Mokaddes Hosain">
    <meta name="author" content="Mokaddes Hosain">
    <meta property="og:title" content="Mokaddes Hosain - Laravel Developer">
    <meta property="og:description" content="Professional Laravel Developer specializing in modern web applications">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <title>Mokaddes Hosain - Laravel Developer | Portfolio</title>
    <link rel="shortcut icon" href="{{ asset('images/mkds.jpg') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/temp3.css') }}">
    <style>
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url("{{ asset('images/coding2.jpg') }}") no-repeat center center;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<div class="bg-animation"></div>

<!-- Navigation -->
<nav id="navbar">
    <div class="nav-container">
        <div class="logo">MH</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#about"><i class="fas fa-user"></i> About</a></li>
            <li><a href="#professional"><i class="fas fa-code"></i> Skills</a></li>
            <li><a href="#projects"><i class="fas fa-project-diagram"></i> Projects</a></li>
            <li><a href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero" id="home">
    <div class="hero-content">
        <div class="hero-grid">
            <!-- Profile Section -->
            <div class="profile-section">
                <div class="profile-image-wrapper">
                    <img src="{{ asset('images/mkds.jpg') }}" alt="Mokaddes Hosain" class="profile-image">
                    <div class="profile-ring"></div>

                </div>
                <div class="profile-info">
                    <h1 class="profile-name">{{ $name ?? 'Mokaddes Hosain' }}</h1>
                    <p class="profile-title">{{ $title ?? 'Software Developer' }}</p>
                    <div class="hero-contact-info">
                        <div class="hero-contact-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $phone ?? '+8801750899448' }}</span>
                        </div>
                        <div class="hero-contact-item">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ $email ?? 'mr.mokaddes@gmail.com' }}">{{ $email ?? 'mr.mokaddes@gmail.com' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resume Button -->
            <div class="resume-section">
                <a href="{{ asset('assets/cv/mokaddes_hosain.pdf') }}" class="resume-button" download>
                    <span>DOWNLOAD CV</span>
                    <i class="fas fa-download"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <a href="#about">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="section-header reveal">
            <h2>About Me</h2>
            <p>Professional background and education</p>
        </div>
        <div class="about-grid">
            <div class="about-content reveal">
                <div class="profile-highlight">
                    <p class="intro-text">I'm a passionate <span class="highlight">Laravel developer</span> with a
                        strong engineering background and a love for crafting modern, high-performance web applications.
                        I specialize in <span class="highlight">e-commerce</span>, <span class="highlight">booking systems</span>,
                        and custom management solutions that blend clean design with powerful functionality.</p>
                </div>
                <div class="profile-highlight">
                    <p class="intro-text">Committed to staying updated on the latest trends and technologies.
                        Passionate about creating impactful digital experiences and thriving in collaborative,
                        innovative environments.</p>
                </div>
            </div>

            <div class="education-container reveal">

                @if(isset($educations) && count($educations) > 0)
                    @foreach($educations as $index => $education)
                        <div class="education-card">
                            <div class="card-header">
                                <div class="degree-icon">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div class="degree-info">
                                    <h4>{{ $education['degree'] }}</h4>
                                    <p class="institution">{{ $education['institution'] }}</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="info-row">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $education['year'] }}</span>
                                </div>
                                <div class="info-row cgpa-row">
                                    <i class="fas fa-award"></i>
                                    <span>CGPA: <strong>{{ $education['cgpa'] }}/{{ $education['out_of_cgpa'] }}</strong></span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
</section>

<!-- Professional Skills -->
<section id="professional" class="section-bg">
    <div class="container">
        <div class="section-header reveal">
            <h2>Professional Skills</h2>
            <p>Technologies and expertise I use to build exceptional digital experiences</p>
        </div>

        <!-- Desktop Grid View -->
        <div class="skills-grid">
            @if(isset($skills) && count($skills) > 0)
                @foreach($skills as $skill)
                    <div class="skill-card reveal">
                        <div class="skill-icon">
                            <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}"/>
                        </div>
                        <h3>{{ $skill->name }}</h3>
                        <p>{{ $skill->description }}</p>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Mobile Swiper View -->
        <div class="swiper-container-skills swiper">
            <div class="swiper-wrapper">
                @if(isset($skills) && count($skills) > 0)
                    @foreach($skills as $skill)
                        <div class="swiper-slide">
                            <div class="skill-card">
                                <div class="skill-icon">
                                    <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}"/>
                                </div>
                                <h3>{{ $skill->name }}</h3>
                                <p>{{ $skill->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects">
    <div class="container">
        <div class="section-header reveal">
            <h2>Featured Projects</h2>
            <p>A showcase of my recent work and contributions</p>
        </div>

        <!-- Desktop Grid View -->
        <div class="projects-grid">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $project)
                    <div class="project-card reveal" data-project-id="{{ $project->id }}">
                        <div class="project-image">
                            <img src="{{ asset($project->image) }}" alt="{{ $project->name }}">
                        </div>
                        <div class="project-content">
                            <h3>{{ $project->name }}</h3>
                            <span class="badge">{{ $project->category->name ?? 'Web Application' }}</span>
                            <p>{!! Str::limit($project->short_description, 120) !!}</p>
                            <div class="project-actions">
                                {{--<button class="btn-details" onclick="openProjectModal({{ $project->id }})">
                                    <i class="fas fa-info-circle"></i> View Details
                                </button>--}}
                                <a href="{{ $project->url }}" class="project-link" target="_blank">
                                    Live Demo <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Mobile Swiper View -->
        <div class="swiper-container-projects swiper">
            <div class="swiper-wrapper">
                @if(isset($projects) && count($projects) > 0)
                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            <div class="project-card" data-project-id="{{ $project->id }}">
                                <div class="project-image">
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->name }}">
                                </div>
                                <div class="project-content">
                                    <h3>{{ $project->name }}</h3>
                                    <span class="badge">{{ $project->category->name ?? 'Web Application' }}</span>
                                    <p>{!! Str::limit($project->short_description, 120) !!}</p>
                                    <div class="project-actions">
                                        {{--<button class="btn-details" onclick="openProjectModal({{ $project->id }})">
                                            <i class="fas fa-info-circle"></i> Details
                                        </button>--}}
                                        <a href="{{ $project->url }}" class="project-link" target="_blank">
                                            Live <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Tools -->
<section id="tools" class="section-bg">
    <div class="container">
        <div class="section-header reveal">
            <h2>Tools & Technologies</h2>
            <p>My daily toolkit for crafting excellent software</p>
        </div>

        <div class="tools-grid">
            @if(isset($tools) && count($tools) > 0)
                @foreach($tools as $tool)
                    <div class="tool-item reveal">
                        <img src="{{ asset($tool->icon) }}" alt="{{ $tool->name }}">
                        <h4>{{ $tool->name }}</h4>
                        <p>{{ $tool->description }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Personal Skills -->
<section id="personal">
    <div class="container">
        <div class="section-header reveal">
            <h2>Personal Qualities</h2>
            <p style="color: #fff">What makes me a great team member</p>
        </div>
        <div class="personal-grid">
            @if(isset($personalQualities) && count($personalQualities) > 0)
                @foreach($personalQualities as $quality)
                    <div class="personal-card reveal">
                        <img src="{{ asset($quality->icon) }}" alt="{{ $quality->title }}">
                        <h4>{{ $quality->title }}</h4>
                        <p>{{ $quality->description }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="contact-form-section">
    <div class="container">
        <div class="section-header reveal">
            <h2>Get In Touch</h2>
            <p>Let's work together on your next project</p>
        </div>
        <div class="contact-form-container reveal">
            <form id="contactForm" action="{{ route('contact') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Full Name *</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email Address *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject"><i class="fas fa-tag"></i> Subject *</label>
                        <select id="subject" name="subject" class="form-control" required>
                            <option value="">Select Subject</option>
                            <option value="project">New Project</option>
                            <option value="job">Job Opportunity</option>
                            <option value="consultation">Consultation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message"><i class="fas fa-comment-dots"></i> Message *</label>
                    <textarea id="message" name="message" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
            <div id="formMessage" style="margin-top: 1rem;"></div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="social-links">
            <a href="{{ $linkedin ?? 'https://www.linkedin.com/in/mokaddes/' }}" target="_blank" title="LinkedIn"
               aria-label="LinkedIn Profile">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="{{ $github ?? 'https://github.com/mokaddes' }}" target="_blank" title="GitHub"
               aria-label="GitHub Profile">
                <i class="fab fa-github"></i>
            </a>
            <a href="{{ $gitlab ?? 'https://gitlab.com/mokaddes' }}" target="_blank" title="GitLab"
               aria-label="GitLab Profile">
                <i class="fab fa-gitlab"></i>
            </a>
            <a href="{{ $facebook ?? 'https://www.facebook.com/mokaddesru/' }}" target="_blank" title="Facebook"
               aria-label="Facebook Profile">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
        <p>&copy; <span id="year"></span> {{ $name ?? 'Mokaddes Hosain' }}. All rights reserved.</p>
    </div>
</footer>

<!-- Project Details Modal -->
<div id="projectModal" class="project-modal">
    <div class="modal-overlay" onclick="closeProjectModal()"></div>
    <div class="modal-container">
        <button class="modal-close" onclick="closeProjectModal()">
            <i class="fas fa-times"></i>
        </button>

        <div class="modal-content">
            <!-- Loading State -->
            <div class="modal-loading" id="modalLoading">
                <div class="spinner"></div>
                <p>Loading project details...</p>
            </div>

            <!-- Project Content -->
            <div class="modal-body" id="modalBody" style="display: none;">
                <!-- Header -->
                <div class="modal-header">
                    <div class="modal-header-content">
                        <h2 id="projectTitle"></h2>
                        <span class="project-category" id="projectCategory"></span>
                    </div>
                    <a id="projectLiveLink" href="#" target="_blank" class="btn-live">
                        <i class="fas fa-rocket"></i> View Live Project
                    </a>
                </div>

                <!-- Gallery Section -->
                <div class="project-gallery-section">
                    <div class="gallery-main">
                        <div class="swiper gallery-main-swiper">
                            <div class="swiper-wrapper" id="galleryMainSlides"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="gallery-thumbs">
                        <div class="swiper gallery-thumbs-swiper">
                            <div class="swiper-wrapper" id="galleryThumbSlides"></div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="project-description">
                    <h3><i class="fas fa-file-alt"></i> About This Project</h3>
                    <p id="projectDescription"></p>
                </div>

                <!-- Technologies & Skills Grid -->
                <div class="tech-skills-grid">
                    <!-- Technologies -->
                    <div class="info-card">
                        <h3><i class="fas fa-code"></i> Technologies Used</h3>
                        <div class="tech-tags" id="projectTechnologies"></div>
                    </div>

                    <!-- Skills -->
                    <div class="info-card">
                        <h3><i class="fas fa-star"></i> Skills Applied</h3>
                        <div class="skill-tags" id="projectSkills"></div>
                    </div>
                </div>

                <!-- Features -->
                <div class="project-features">
                    <h3><i class="fas fa-check-circle"></i> Key Features</h3>
                    <ul id="projectFeatures" class="features-list"></ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/temp3.js') }}"></script>
</body>
</html>
