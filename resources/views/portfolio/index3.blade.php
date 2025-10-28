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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --accent: #f093fb;
            --dark: #0f172a;
            --light: #f8fafc;
            --text: #1e293b;
            --text-light: #64748b;
            --section-spacing: 4rem;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--dark);
            color: var(--text);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: moveBackground 30s linear infinite;
        }

        @keyframes moveBackground {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1rem 5%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(15px);
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        nav.scrolled {
            padding: 0.7rem 5%;
            background: rgba(15, 23, 42, 0.98);
            box-shadow: 0 4px 30px rgba(0,0,0,0.2);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links a i {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--light);
            transition: all 0.3s;
            border-radius: 3px;
        }

        /* Hero Section */
        .hero {
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.97), rgba(118, 75, 162, 0.97)),
            url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23667eea" width="1200" height="600"/><g fill="%23764ba2" opacity="0.08"><circle cx="100" cy="100" r="50"/><circle cx="300" cy="200" r="70"/><circle cx="500" cy="150" r="60"/><circle cx="700" cy="250" r="80"/><circle cx="900" cy="180" r="65"/><circle cx="1100" cy="220" r="55"/></g></svg>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 5rem 5% 2rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(240, 147, 251, 0.3), transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(102, 126, 234, 0.3), transparent 40%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.05), transparent 60%);
            pointer-events: none;
            animation: pulseGlow 8s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .hero-content {
            width: 100%;
            max-width: 1000px;
            animation: fadeInUp 1s ease-out;
            position: relative;
            z-index: 1;
        }

        .hero-grid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 4rem;
            flex-wrap: wrap;
        }

        /* Profile Section */
        .profile-section {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .profile-image-wrapper {
            position: relative;
            width: 160px;
            height: 160px;
            flex-shrink: 0;
        }

        .profile-image {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            position: relative;
            z-index: 2;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        .profile-ring {
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 3px solid var(--accent);
            border-radius: 50%;
            animation: rotate 8s linear infinite;
            opacity: 0.5;
        }

        .profile-ring::after {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: rotate 12s linear infinite reverse;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 3rem;
            color: var(--light);
            margin-bottom: 0.5rem;
            font-weight: 800;
            letter-spacing: -1px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .profile-title {
            font-size: 1.5rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .hero-contact-info {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .hero-contact-item {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            color: rgba(255, 255, 255, 0.95);
            font-size: 1rem;
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .hero-contact-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .hero-contact-item i {
            font-size: 1.2rem;
            color: var(--accent);
            filter: drop-shadow(0 0 8px rgba(240, 147, 251, 0.6));
        }

        .hero-contact-item a {
            color: inherit;
            text-decoration: none;
        }

        /* Resume Button */
        .resume-section {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .resume-button {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 1.2rem 3rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            color: var(--primary);
            text-decoration: none;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3), 0 0 30px rgba(240, 147, 251, 0.4);
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        .resume-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.3), transparent);
            transition: left 0.6s;
        }

        .resume-button:hover::before {
            left: 100%;
        }

        .resume-button:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4), 0 0 40px rgba(240, 147, 251, 0.6);
            background: linear-gradient(135deg, #ffffff, rgba(255, 255, 255, 0.95));
        }

        .resume-button i {
            font-size: 1.2rem;
            animation: bounce-icon 2s ease-in-out infinite;
        }

        @keyframes bounce-icon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-3px); }
        }

        /* Contact Section in Hero - REMOVED */
        .contact-section {
            display: none;
        }

        .contact-item {
            display: none;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 1.5rem;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        .scroll-indicator a {
            display: block;
            color: white;
            font-size: 1.8rem;
            opacity: 0.8;
            transition: opacity 0.3s;
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
        }

        .scroll-indicator a:hover {
            opacity: 1;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-15px); }
            60% { transform: translateX(-50%) translateY(-8px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Section Styles */
        section {
            padding: var(--section-spacing) 5%;
            position: relative;
        }

        .section-bg {
            background: var(--light);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: clamp(2rem, 4vw, 2.5rem);
            color: var(--dark);
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .section-bg .section-header h2 {
            color: var(--dark);
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 2px;
        }

        .section-header p {
            color: var(--text-light);
            font-size: 1.05rem;
            margin-top: 1rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* About Section */
        .about-section {
            background: var(--light);
            padding: var(--section-spacing) 5%;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
            align-items: start;
        }

        .about-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .profile-highlight {
            display: flex;
            gap: 1.2rem;
            padding: 1.8rem;
            background: white;
            border-left: 4px solid #667eea;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .profile-highlight:hover {
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }

        .highlight-icon {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
        }

        .intro-text {
            line-height: 1.7;
            color: #333;
            font-size: 1rem;
        }

        .intro-text .highlight {
            color: #667eea;
            font-weight: 600;
        }

        .commitment-text {
            line-height: 1.7;
            color: #555;
            font-size: 0.95rem;
            padding: 1.2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Education */
        .education-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .education-title {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.5rem;
            color: #1a1a2e;
            margin-bottom: 0.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e0e0e0;
        }

        .education-title i {
            color: #667eea;
            font-size: 1.8rem;
        }

        .education-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .education-card:hover {
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.2);
            transform: translateX(3px);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .degree-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .degree-info h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 0 0.3rem 0;
        }

        .institution {
            margin: 0;
            opacity: 0.95;
            font-size: 0.9rem;
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: #555;
            font-size: 0.9rem;
        }

        .info-row i {
            width: 18px;
            color: #667eea;
        }

        .cgpa-row {
            padding-top: 0.5rem;
            border-top: 1px solid #e0e0e0;
        }

        .cgpa-row strong {
            color: #667eea;
            font-size: 1rem;
        }

        /* Skills Grid */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .swiper-container-skills {
            display: none;
        }

        .skill-card {
            background: white;
            padding: 1.8rem;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            cursor: pointer;
        }

        .skill-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.25);
        }

        .skill-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.2rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
        }

        .skill-icon img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .skill-card h3 {
            color: var(--dark);
            margin-bottom: 0.8rem;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .skill-card p {
            color: var(--text-light);
            line-height: 1.6;
            font-size: 0.9rem;
        }

        /* Projects */
        #projects {
            background: var(--dark);
        }

        #projects .section-header h2,
        #projects .section-header p {
            color: var(--light);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.8rem;
        }

        .swiper-container-projects {
            display: none;
        }

        .project-card {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
            border-color: rgba(255,255,255,0.2);
        }

        .project-image {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .project-image img {
            max-width: 75%;
            max-height: 75%;
            object-fit: contain;
        }

        .project-content {
            padding: 1.8rem;
        }

        .project-content h3 {
            color: var(--light);
            margin-bottom: 0.8rem;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .project-content p {
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
            margin-bottom: 1.2rem;
            font-size: 0.9rem;
        }

        .project-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .project-link:hover {
            color: var(--light);
            gap: 0.8rem;
        }

        .badge {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            font-size: 0.7rem;
            font-weight: 600;
            line-height: 1;
            color: #fff;
            background-color: rgba(23, 162, 184, 0.8);
            border-radius: 20px;
            margin-bottom: 0.8rem;
        }

        /* Tools */
        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1.2rem;
        }

        .tool-item {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .tool-item:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.25);
        }

        .tool-item img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            margin-bottom: 0.8rem;
        }

        .tool-item h4 {
            color: var(--dark);
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
            font-weight: 700;
        }

        .tool-item p {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        /* Personal Skills */
        .personal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .personal-card {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(10px);
            padding: 1.8rem;
            border-radius: 16px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        .personal-card:hover {
            background: rgba(255,255,255,0.1);
            transform: translateY(-5px);
            border-color: rgba(255,255,255,0.2);
        }

        .personal-card img {
            width: 45px;
            height: 45px;
            margin-bottom: 1rem;
        }

        .personal-card h4 {
            color: var(--light);
            margin-bottom: 0.8rem;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .personal-card p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Contact Form */
        .contact-form-section {
            background: var(--light);
        }

        .contact-form-container {
            max-width: 750px;
            margin: 0 auto;
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
            margin-bottom: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1.1rem;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 130px;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.5);
        }

        /* Footer */
        footer {
            background: var(--dark);
            padding: 2.5rem 5%;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 1.3rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-4px) scale(1.08);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        footer p {
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
        }

        /* Swiper Pagination */
        .swiper-pagination-bullet {
            background: var(--accent);
            opacity: 0.5;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }

        /* Scroll Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            :root {
                --section-spacing: 3rem;
            }

            .hero {
                min-height: 70vh;
            }

            .hero-grid {
                flex-direction: column;
                gap: 2.5rem;
            }

            .profile-section {
                flex-direction: column;
                text-align: center;
            }

            .profile-name {
                font-size: 2.5rem;
            }

            .profile-title {
                font-size: 1.3rem;
            }

            .hero-contact-info {
                justify-content: center;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            :root {
                --section-spacing: 2.5rem;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                height: 100vh;
                width: 70%;
                background: rgba(15, 23, 42, 0.98);
                backdrop-filter: blur(10px);
                flex-direction: column;
                padding: 5rem 2rem;
                transition: right 0.3s;
            }

            .nav-links.active {
                right: 0;
            }

            .hamburger {
                display: flex;
                z-index: 1001;
            }

            .hamburger.active span:nth-child(1) {
                transform: rotate(45deg) translate(8px, 8px);
            }

            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(8px, -8px);
            }

            .hero {
                padding: 5rem 5% 2.5rem;
                min-height: 65vh;
            }

            .profile-image-wrapper {
                width: 140px;
                height: 140px;
            }

            .profile-image {
                width: 140px;
                height: 140px;
            }

            .profile-name {
                font-size: 2rem;
            }

            .profile-title {
                font-size: 1.2rem;
            }

            .hero-contact-info {
                flex-direction: column;
                gap: 0.8rem;
                width: 100%;
            }

            .hero-contact-item {
                justify-content: center;
                font-size: 0.9rem;
                padding: 0.7rem 1.2rem;
            }

            .resume-button {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            /* Enable Swiper for mobile */
            .skills-grid {
                display: none;
            }

            .swiper-container-skills {
                display: block;
                padding-bottom: 40px;
            }

            .projects-grid {
                display: none;
            }

            .swiper-container-projects {
                display: block;
                padding-bottom: 40px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .contact-form-container {
                padding: 2rem;
            }

            .tools-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }

            .personal-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .hero {
                min-height: 60vh;
            }

            .profile-image-wrapper {
                width: 120px;
                height: 120px;
            }

            .profile-image {
                width: 120px;
                height: 120px;
            }

            .profile-name {
                font-size: 1.7rem;
            }

            .profile-title {
                font-size: 1.1rem;
            }

            .resume-button {
                padding: 0.9rem 1.8rem;
                font-size: 0.95rem;
            }

            .hero-contact-item {
                font-size: 0.85rem;
                padding: 0.6rem 1rem;
            }

            .contact-form-container {
                padding: 1.5rem;
            }
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
                    <div class="highlight-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <p class="intro-text">I'm a passionate <span class="highlight">Laravel developer</span> with a strong engineering background and a love for crafting modern, high-performance web applications. I specialize in <span class="highlight">e-commerce</span>, <span class="highlight">booking systems</span>, and custom management solutions that blend clean design with powerful functionality.</p>
                </div>

                <p class="commitment-text">Committed to staying updated on the latest trends and technologies. Passionate about creating impactful digital experiences and thriving in collaborative, innovative environments.</p>
            </div>

            <div class="education-container reveal">
                <h3 class="education-title">
                    <i class="fas fa-user-graduate"></i>
                    Education
                </h3>
                @if(isset($educations) && count($educations) > 0)
                    @foreach($educations as $index => $education)
                        <div class="education-card">
                            <div class="card-header">
                                <div class="degree-icon">
                                    <i class="fas fa-graduation-cap"></i>
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
                    <div class="education-card">
                        <div class="card-header">
                            <div class="degree-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="degree-info">
                                <h4>M. Engineering in EEE</h4>
                                <p class="institution">University of Rajshahi</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-row">
                                <i class="fas fa-calendar-alt"></i>
                                <span>2018</span>
                            </div>
                            <div class="info-row cgpa-row">
                                <i class="fas fa-award"></i>
                                <span>CGPA: <strong>3.25/4.00</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="education-card">
                        <div class="card-header">
                            <div class="degree-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="degree-info">
                                <h4>B.Sc. Engg in Applied Physics</h4>
                                <p class="institution">University of Rajshahi</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info-row">
                                <i class="fas fa-calendar-alt"></i>
                                <span>2017</span>
                            </div>
                            <div class="info-row cgpa-row">
                                <i class="fas fa-award"></i>
                                <span>CGPA: <strong>3.06/4.00</strong></span>
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
                            <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}" />
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
                                    <img src="{{ asset($skill->icon) }}" alt="{{ $skill->name }}" />
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
                    <div class="project-card reveal">
                        <div class="project-image">
                            <img src="{{ asset($project->image) }}" alt="{{ $project->name }}">
                        </div>
                        <div class="project-content">
                            <h3>{{ $project->name }}</h3>
                            <span class="badge">{{ $project->category->name ?? 'Web Application' }}</span>
                            <p>{!! Str::limit($project->description, 120) !!}</p>
                            <a href="{{ $project->url }}" class="project-link" target="_blank">
                                View Project <i class="fas fa-arrow-right"></i>
                            </a>
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
                            <div class="project-card">
                                <div class="project-image">
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->name }}">
                                </div>
                                <div class="project-content">
                                    <h3>{{ $project->name }}</h3>
                                    <span class="badge">{{ $project->category->name ?? 'Web Application' }}</span>
                                    <p>{!! Str::limit($project->description, 120) !!}</p>
                                    <a href="{{ $project->url }}" class="project-link" target="_blank">
                                        View Project <i class="fas fa-arrow-right"></i>
                                    </a>
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
        breakpoints: { 768: { enabled: false }, 1024: { enabled: false } },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });

    // Initialize Swiper for Projects (Mobile only)
    new Swiper('.swiper-container-projects', {
        slidesPerView: 1.15,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-container-projects .swiper-pagination',
            clickable: true,
        },
        breakpoints: { 768: { enabled: false }, 1024: { enabled: false } },
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

    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
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

    // Add tilt effect to cards (desktop only)
    if (window.innerWidth > 768) {
        document.querySelectorAll('.skill-card, .project-card, .tool-item, .personal-card').forEach(card => {
            card.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 15;
                const rotateY = (centerX - x) / 15;
                this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
            });

            card.addEventListener('mouseleave', function() {
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
            }
        }

        window.addEventListener('load', () => {
            setTimeout(typeWriter, 800);
        });
    }
</script>
</body>
</html>
