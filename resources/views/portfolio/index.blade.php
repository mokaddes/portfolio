<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mokaddes Hosain - Professional Laravel Developer specializing in PHP, REST API, and modern web applications. Building robust solutions with clean code.">
    <meta name="keywords" content="Laravel Developer, PHP Developer, Web Developer, REST API, Full Stack Developer, Mokaddes Hosain">
    <meta name="author" content="Mokaddes Hosain">
    <meta property="og:title" content="Mokaddes Hosain - Laravel Developer">
    <meta property="og:description" content="Professional Laravel Developer specializing in modern web applications">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <title>Mokaddes Hosain - Laravel Developer | Portfolio</title>
    <link rel="shortcut icon" href="{{ asset('images/mkds.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        :root {
            --primary-color: #2d3748;
            --primary-dark: #1a202c;
            --secondary-color: #4a5568;
            --accent-color: #3182ce;
            --accent-light: #63b3ed;
            --dark-color: #171923;
            --dark-light: #2d3748;
            --light-color: #f7fafc;
            --gray-color: #718096;
            --gray-light: #cbd5e0;
            --success-color: #38a169;
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, var(--accent-color), #805ad5);
            --gradient-dark: linear-gradient(135deg, var(--dark-color), #2d3748);
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.07), 0 4px 6px rgba(0, 0, 0, 0.05);
            --border-radius: 10px;
            --border-radius-lg: 16px;
            --transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            line-height: 1.6;
            color: var(--primary-color);
            background-color: #fafbfc;
            overflow-x: hidden;
            position: relative;
            font-size: 15px;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 15% 50%, rgba(49, 130, 206, 0.03) 0%, transparent 60%),
                radial-gradient(circle at 85% 30%, rgba(99, 179, 237, 0.03) 0%, transparent 60%);
            z-index: -1;
            pointer-events: none;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        section {
            padding: 80px 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 12px;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: var(--gradient-primary);
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 1.5px;
        }

        .section-header p {
            font-size: 1rem;
            color: var(--gray-color);
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Navigation */
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 18px 0;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid var(--border-color);
        }

        #navbar.scrolled {
            padding: 14px 0;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: var(--shadow-md);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--accent-color);
            display: flex;
            align-items: center;
            letter-spacing: -0.5px;
        }

        .logo::before {
            content: "<MH/>";
            display: inline-block;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 32px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            padding: 6px 0;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .nav-links a i {
            margin-right: 8px;
            font-size: 1rem;
            width: 16px;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            bottom: 0;
            left: 0;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            width: 24px;
            height: 18px;
            position: relative;
        }

        .hamburger span {
            width: 100%;
            height: 2px;
            background: var(--accent-color);
            transition: var(--transition);
            border-radius: 1px;
            position: absolute;
            left: 0;
        }

        .hamburger span:nth-child(1) {
            top: 0;
        }

        .hamburger span:nth-child(2) {
            top: 8px;
        }

        .hamburger span:nth-child(3) {
            top: 16px;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg);
            top: 8px;
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg);
            top: 8px;
        }

        /* Hero Section */
        .hero {
            padding-top: 160px;
            padding-bottom: 100px;
            background: var(--light-color);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(49, 130, 206, 0.08), rgba(99, 179, 237, 0.04));
            top: -100px;
            right: -100px;
            filter: blur(80px);
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(99, 179, 237, 0.06), rgba(49, 130, 206, 0.04));
            bottom: -100px;
            left: -100px;
            filter: blur(60px);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .profile-section {
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .profile-section:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .profile-image-wrapper {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 32px;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: var(--shadow-lg);
            filter: grayscale(0.1);
        }

        .profile-ring {
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border-radius: 50%;
            border: 2px solid transparent;
            border-top-color: var(--accent-color);
            border-right-color: #805ad5;
            border-bottom-color: #38a169;
            animation: spin 12s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .profile-info {
            text-align: center;
        }

        .profile-name {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--primary-dark);
            letter-spacing: -0.5px;
        }

        .profile-title {
            font-size: 1.1rem;
            color: var(--accent-color);
            margin-bottom: 24px;
            position: relative;
            display: inline-block;
            font-weight: 500;
        }

        .profile-title::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background: var(--accent-light);
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 1px;
        }

        .hero-contact-info {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 24px;
        }

        .hero-contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 0.95rem;
            color: var(--secondary-color);
        }

        .hero-contact-item i {
            color: var(--accent-color);
            font-size: 1.1rem;
            width: 16px;
        }

        .hero-contact-item a {
            color: var(--secondary-color);
            text-decoration: none;
            transition: var(--transition);
        }

        .hero-contact-item a:hover {
            color: var(--accent-color);
        }

        .resume-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .resume-button {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 16px 32px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(49, 130, 206, 0.2);
            position: relative;
            overflow: hidden;
            z-index: 1;
            letter-spacing: 0.3px;
        }

        .resume-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: var(--primary-dark);
            transition: var(--transition);
            z-index: -1;
        }

        .resume-button:hover::before {
            width: 100%;
        }

        .resume-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(49, 130, 206, 0.25);
        }

        .hero-stats {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .hero-stats > div {
            text-align: center;
        }

        .hero-stats h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--primary-dark);
        }

        .hero-stats p {
            font-size: 0.9rem;
            color: var(--gray-color);
            font-weight: 500;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .scroll-indicator a {
            display: block;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            text-decoration: none;
            font-size: 1.2rem;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
        }

        .scroll-indicator a:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(3px);
        }

        /* About Section */
        .about-section {
            background: white;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: start;
        }

        .profile-highlight {
            background: var(--light-color);
            border-radius: var(--border-radius);
            padding: 28px;
            box-shadow: var(--shadow-sm);
            margin-bottom: 24px;
            border-left: 4px solid var(--accent-color);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .profile-highlight:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .intro-text {
            font-size: 1rem;
            line-height: 1.7;
            color: var(--secondary-color);
        }

        .highlight {
            color: var(--accent-color);
            font-weight: 600;
        }

        .education-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .education-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .education-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .card-header {
            display: flex;
            align-items: center;
            padding: 24px;
            background: var(--light-color);
        }

        .degree-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 16px;
            color: white;
            font-size: 1.2rem;
        }

        .degree-info h4 {
            font-size: 1.1rem;
            color: var(--primary-dark);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .institution {
            color: var(--accent-color);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .card-body {
            padding: 20px 24px;
        }

        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: var(--gray-color);
            font-size: 0.95rem;
        }

        .info-row i {
            margin-right: 10px;
            color: var(--accent-color);
            width: 16px;
            font-size: 0.95rem;
        }

        .cgpa-row {
            font-size: 1rem;
        }

        .cgpa-row strong {
            color: var(--success-color);
        }

        /* Skills Section */
        .section-bg {
            background: var(--light-color);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 24px;
        }

        .skill-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 28px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: 1px solid var(--border-color);
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
            z-index: 2;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .skill-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: linear-gradient(135deg, rgba(49, 130, 206, 0.08), rgba(99, 179, 237, 0.08));
            padding: 16px;
        }

        .skill-icon img {
            max-width: 100%;
            max-height: 100%;
            filter: brightness(0.9);
        }

        .skill-card h3 {
            font-size: 1.2rem;
            color: var(--primary-dark);
            margin-bottom: 12px;
            font-weight: 600;
        }

        .skill-card p {
            color: var(--gray-color);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 32px;
        }

        .project-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            border: 1px solid var(--border-color);
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .project-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .project-card:hover .project-image img {
            transform: scale(1.05);
        }

        .project-content {
            padding: 24px;
        }

        .project-content h3 {
            font-size: 1.3rem;
            color: var(--primary-dark);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .badge {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 14px;
        }

        .project-content p {
            color: var(--gray-color);
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .project-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-details {
            background: transparent;
            color: var(--accent-color);
            border: 1px solid var(--accent-color);
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
        }

        .btn-details:hover {
            background: var(--accent-color);
            color: white;
        }

        .project-link {
            background: var(--accent-color);
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
        }

        .project-link:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(49, 130, 206, 0.2);
        }

        /* Tools Section */
        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 24px;
        }

        .tool-item {
            background: white;
            border-radius: var(--border-radius);
            padding: 24px 20px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            border: 1px solid var(--border-color);
        }

        .tool-item:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .tool-item i {
            font-size: 2.2rem;
            margin-bottom: 16px;
            color: var(--accent-color);
        }

        .tool-item img {
            width: 56px;
            height: 56px;
            margin-bottom: 16px;
            object-fit: contain;
        }

        .tool-item h4 {
            font-size: 1.1rem;
            color: var(--primary-dark);
            margin-bottom: 8px;
            font-weight: 600;
        }

        .tool-item p {
            color: var(--gray-color);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Personal Skills */
        #personal {
            background: var(--primary-dark);
            color: white;
        }

        #personal .section-header h2 {
            color: white;
        }

        #personal .section-header p {
            color: var(--gray-light);
        }

        .personal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
        }

        .personal-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            padding: 28px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .personal-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .personal-card i {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: white;
        }

        .personal-card img {
            width: 56px;
            height: 56px;
            margin-bottom: 20px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }

        .personal-card h4 {
            font-size: 1.1rem;
            margin-bottom: 12px;
            color: white;
            font-weight: 600;
        }

        .personal-card p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Contact Form */
        .contact-form-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 40px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .form-group label i {
            color: var(--accent-color);
            font-size: 1rem;
            width: 16px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: var(--transition);
            background: white;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
        }

        textarea.form-control {
            min-height: 140px;
            resize: vertical;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23718096' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
            padding-right: 40px;
        }

        .btn-submit {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 14px 32px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin: 20px auto 0;
            width: 100%;
            max-width: 260px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(49, 130, 206, 0.2);
        }

        /* Footer */
        footer {
            background: var(--primary-dark);
            color: white;
            padding: 60px 0 30px;
            text-align: center;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            color: white;
            font-size: 1.1rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .social-links a:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }

        footer p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        /* WhatsApp Float */
        .whatsapp-float {
            position: fixed;
            bottom: 24px;
            left: 24px;
            width: 56px;
            height: 56px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.25);
            z-index: 1000;
            transition: var(--transition);
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.05) translateY(-3px);
            box-shadow: 0 12px 24px rgba(37, 211, 102, 0.3);
        }

        /* Swiper Containers for Mobile */
        .swiper-container-skills,
        .swiper-container-projects {
            display: none;
        }

        /* Mobile Responsive */
        @media (max-width: 992px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .tools-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background: white;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding-top: 40px;
                transition: var(--transition);
                box-shadow: var(--shadow-lg);
                z-index: 999;
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                margin: 0 0 24px 0;
            }

            .nav-links a {
                font-size: 1.1rem;
            }

            .hamburger {
                display: flex;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .contact-form-container {
                padding: 30px;
            }

            .profile-name {
                font-size: 1.8rem;
            }

            .profile-section {
                padding: 32px;
            }

            .swiper-container-skills,
            .swiper-container-projects {
                display: block;
            }

            .skills-grid,
            .projects-grid {
                display: none;
            }

            .personal-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .tools-grid {
                grid-template-columns: 1fr;
            }

            .hero-stats {
                gap: 24px;
            }

            .hero-stats h3 {
                font-size: 1.7rem;
            }

            section {
                padding: 60px 0;
            }

            .container {
                padding: 0 20px;
            }
        }

        /* Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<!-- WhatsApp Float -->
<a href="https://wa.me/8801750899448" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Navigation -->
<nav id="navbar">
    <div class="nav-container">
        <div class="logo"></div>
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
    <div class="container">
        <div class="hero-content">
            <div class="hero-grid">
                <!-- Profile Section -->
                <div class="profile-section">
                    <div class="profile-image-wrapper">
                        <img src="{{ asset('images/mkds.png') }}" alt="{{ $name ?? 'Mokaddes Hosain' }}" class="profile-image">
                        <div class="profile-ring"></div>
                    </div>
                    <div class="profile-info">
                        <h1 class="profile-name">{{ $name ?? 'Mokaddes Hosain' }}</h1>
                        <p class="profile-title">{{ $title ?? 'Full Stack Laravel Developer' }}</p>
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
                    <div class="hero-stats">
                        <div>
                            <h3>50+</h3>
                            <p>Projects Completed</p>
                        </div>
                        <div>
                            <h3>5+</h3>
                            <p>Years Experience</p>
                        </div>
                    </div>
                </div>
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
                    <p class="intro-text">I'm a passionate <span class="highlight">Laravel developer</span> with a strong engineering background and a love for crafting modern, high-performance web applications. I specialize in <span class="highlight">e-commerce</span>, <span class="highlight">booking systems</span>, and custom management solutions that blend clean design with powerful functionality.</p>
                </div>
                <div class="profile-highlight">
                    <p class="intro-text">Committed to staying updated on the latest trends and technologies. Passionate about creating impactful digital experiences and thriving in collaborative, innovative environments.</p>
                </div>
                <div class="profile-highlight">
                    <h3 style="color: var(--primary-dark); margin-bottom: 12px; font-size: 1.1rem;">Professional Approach</h3>
                    <p class="intro-text">I follow an agile development process with emphasis on clean code, thorough testing, and continuous deployment. My solutions are scalable, maintainable, and built with the end-user in mind.</p>
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
                @else
                    <!-- Fallback education cards if no data -->
                    <div class="education-card">
                        <div class="card-header">
                            <div class="degree-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="degree-info">
                                <h4>B.Sc. in Computer Science & Engineering</h4>
                                <p class="institution">University of Development Alternative</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-row">
                                <i class="fas fa-calendar-alt"></i>
                                <span>2016 - 2020</span>
                            </div>
                            <div class="info-row cgpa-row">
                                <i class="fas fa-award"></i>
                                <span>CGPA: <strong>3.45/4.00</strong></span>
                            </div>
                        </div>
                    </div>
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
            @else
                <!-- Fallback skills if no data -->
                <div class="skill-card reveal">
                    <div class="skill-icon">
                        <i class="fab fa-laravel" style="font-size: 2rem; color: var(--accent-color);"></i>
                    </div>
                    <h3>Laravel Framework</h3>
                    <p>Expert in building scalable web applications with Laravel, implementing MVC architecture, RESTful APIs, and robust backend systems.</p>
                </div>
                <div class="skill-card reveal">
                    <div class="skill-icon">
                        <i class="fab fa-php" style="font-size: 2rem; color: var(--accent-color);"></i>
                    </div>
                    <h3>PHP Development</h3>
                    <p>Advanced PHP programming with OOP principles, design patterns, and performance optimization techniques.</p>
                </div>
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
                                <button class="btn-details" onclick="openProjectModal({{ $project->id }})">
                                    <i class="fas fa-info-circle"></i> View Details
                                </button>
                                <a href="{{ $project->url }}" class="project-link" target="_blank">
                                    Live Demo <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback projects if no data -->
                <div class="project-card reveal">
                    <div class="project-image">
                        <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="E-commerce Platform">
                    </div>
                    <div class="project-content">
                        <h3>Modern E-commerce Platform</h3>
                        <span class="badge">Laravel + Vue.js</span>
                        <p>A full-featured e-commerce solution with product management, shopping cart, payment integration, and admin dashboard.</p>
                        <div class="project-actions">
                            <button class="btn-details">
                                <i class="fas fa-info-circle"></i> View Details
                            </button>
                            <a href="#" class="project-link">
                                Live Demo <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
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
                                        <button class="btn-details" onclick="openProjectModal({{ $project->id }})">
                                            <i class="fas fa-info-circle"></i> Details
                                        </button>
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
            @else
                <!-- Fallback tools if no data -->
                <div class="tool-item reveal">
                    <i class="fab fa-git-alt" style="color: var(--accent-color);"></i>
                    <h4>Git Version Control</h4>
                    <p>Expert in Git workflows, branching strategies, and collaborative development.</p>
                </div>
                <div class="tool-item reveal">
                    <i class="fab fa-docker" style="color: var(--accent-color);"></i>
                    <h4>Docker</h4>
                    <p>Containerization for consistent development environments and deployment.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Personal Skills -->
<section id="personal">
    <div class="container">
        <div class="section-header reveal">
            <h2>Personal Qualities</h2>
            <p>What makes me a great team member</p>
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
            @else
                <!-- Fallback personal qualities if no data -->
                <div class="personal-card reveal">
                    <i class="fas fa-lightbulb"></i>
                    <h4>Problem Solver</h4>
                    <p>Analytical thinker with a knack for finding elegant solutions to complex challenges.</p>
                </div>
                <div class="personal-card reveal">
                    <i class="fas fa-comments"></i>
                    <h4>Effective Communicator</h4>
                    <p>Clear and concise communication with both technical teams and non-technical stakeholders.</p>
                </div>
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
            <div id="formMessage" style="margin-top: 1rem; text-align: center;"></div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="social-links">
            <a href="{{ $linkedin ?? 'https://www.linkedin.com/in/mokaddes/' }}" target="_blank" title="LinkedIn" aria-label="LinkedIn Profile">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="{{ $github ?? 'https://github.com/mokaddes' }}" target="_blank" title="GitHub" aria-label="GitHub Profile">
                <i class="fab fa-github"></i>
            </a>
            <a href="{{ $gitlab ?? 'https://gitlab.com/mokaddes' }}" target="_blank" title="GitLab" aria-label="GitLab Profile">
                <i class="fab fa-gitlab"></i>
            </a>
            <a href="{{ $facebook ?? 'https://www.facebook.com/mokaddesru/' }}" target="_blank" title="Facebook" aria-label="Facebook Profile">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
        <p>&copy; <span id="year"></span> {{ $name ?? 'Mokaddes Hosain' }}. All rights reserved.</p>
    </div>
</footer>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Set current year in footer
    document.getElementById('year').textContent = new Date().getFullYear();

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');

    hamburger.addEventListener('click', function() {
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
    function reveal() {
        const reveals = document.querySelectorAll('.reveal');

        for (let i = 0; i < reveals.length; i++) {
            const windowHeight = window.innerHeight;
            const elementTop = reveals[i].getBoundingClientRect().top;
            const elementVisible = 100;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add('active');
            }
        }
    }

    window.addEventListener('scroll', reveal);
    window.addEventListener('load', reveal);

    // Form submission
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formMessage = document.getElementById('formMessage');
            formMessage.textContent = 'Thank you for your message! I will get back to you soon.';
            formMessage.style.color = 'var(--success-color)';
            formMessage.style.fontWeight = '500';

            // Submit form via AJAX or reset after delay
            setTimeout(() => {
                contactForm.reset();
                formMessage.textContent = '';
            }, 3000);
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initialize Swiper for mobile views
    function initSwipers() {
        if (window.innerWidth <= 768) {
            // Skills Swiper
            if (document.querySelector('.swiper-container-skills')) {
                const skillsSwiper = new Swiper('.swiper-container-skills', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        480: {
                            slidesPerView: 2,
                        }
                    }
                });
            }

            // Projects Swiper
            if (document.querySelector('.swiper-container-projects')) {
                const projectsSwiper = new Swiper('.swiper-container-projects', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    }
                });
            }
        }
    }

    // Initialize on load and resize
    window.addEventListener('load', initSwipers);
    window.addEventListener('resize', initSwipers);

    // Project modal function (placeholder)
    function openProjectModal(projectId) {
        console.log('Opening project modal for ID:', projectId);
        // Implement your modal logic here
        alert('Project details for ID: ' + projectId + ' would open here.');
    }
</script>
</body>
</html>
