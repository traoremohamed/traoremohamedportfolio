<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohamed Traoré - Analyste Programmeur & Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* [Styles précédents inchangés] */
		:root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #333;
            --text-light: #7f8c8d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            line-height: 1.6;
            color: var(--text-color);
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: var(--secondary-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .logo span {
            color: var(--secondary-color);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            color: white;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--secondary-color);
        }

        .hamburger {
            display: none;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding-top: 80px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        /* About Section */
        .section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 36px;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 70px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-img {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .about-img img {
            width: 100%;
            height: auto;
            display: block;
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 28px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .skills {
            margin-top: 30px;
        }

        .skill-item {
            margin-bottom: 20px;
        }

        .skill-name {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .skill-bar {
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .skill-progress {
            height: 100%;
            background-color: var(--secondary-color);
            border-radius: 5px;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }

        .project-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .project-img {
            height: 200px;
            overflow: hidden;
        }

        .project-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .project-card:hover .project-img img {
            transform: scale(1.1);
        }

        .project-info {
            padding: 20px;
        }

        .project-info h3 {
            font-size: 22px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .project-info p {
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .tag {
            background-color: var(--light-color);
            color: var(--primary-color);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        /* Contact Section */
        .contact {
            background-color: var(--primary-color);
            color: white;
        }

        .contact .section-title h2 {
            color: white;
        }

        .contact .section-title h2::after {
            background-color: white;
        }

        .contact-content {
            display: flex;
            gap: 50px;
        }

        .contact-info {
            flex: 1;
        }

        .contact-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .contact-info p {
            margin-bottom: 30px;
        }

        .contact-details {
            margin-bottom: 30px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-item i {
            width: 40px;
            height: 40px;
            background-color: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: var(--secondary-color);
        }

        .contact-form {
            flex: 1;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 30px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .about-content, .contact-content {
                flex-direction: column;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }
        }
        /* Ajoutez ce nouveau CSS à la suite des styles existants */

        /* Formations Section */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background-color: var(--secondary-color);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
            border-radius: 2px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: white;
            border: 4px solid var(--secondary-color);
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }

        .left {
            left: 0;
            text-align: right;
            padding-right: 70px;
        }

        .right {
            left: 50%;
            padding-left: 70px;
        }

        .left::after {
            right: -12px;
        }

        .right::after {
            left: -12px;
        }

        .timeline-content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .timeline-date {
            font-weight: bold;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .timeline-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        /* Blog Section */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .blog-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-img {
            height: 200px;
            overflow: hidden;
        }

        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .blog-card:hover .blog-img img {
            transform: scale(1.1);
        }

        .blog-info {
            padding: 20px;
        }

        .blog-date {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 10px;
        }

        .blog-info h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .blog-info p {
            color: var(--text-light);
            margin-bottom: 15px;
        }

        .read-more {
            color: var(--secondary-color);
            font-weight: bold;
            display: inline-flex;
            align-items: center;
        }

        .read-more i {
            margin-left: 5px;
            transition: transform 0.3s;
        }

        .read-more:hover i {
            transform: translateX(5px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item::after {
                left: 21px;
            }

            .left, .right {
                left: 0;
                text-align: left;
                padding-right: 25px;
            }
        }
    </style>
</head>
<body>
    <!-- [Header et sections précédentes inchangées] -->
<header>
        <div class="container">
            <nav>
                <div class="logo">Mohamed <span>Traoré</span></div>
                <ul class="nav-links">
                    <li><a href="#home">Accueil</a></li>
                    <li><a href="#about">À propos</a></li>
                    <li><a href="#projects">Projets</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Mohamed Traoré</h1>
                <p>Analyste programmeur expérimenté, spécialisé en développement web et gestion de projets informatiques.</p>
                <a href="#projects" class="btn">Voir mes projets</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-title">
                <h2>À propos de moi</h2>
            </div>
            <div class="about-content">
                <div class="about-img">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3" alt="Mohamed Traoré">
                </div>
                <div class="about-text">
                    <h3>Analyste programmeur & développeur full-stack</h3>
                    <p>Je suis un professionnel de l'informatique avec plus de 5 ans d'expérience dans le développement d'applications web et la gestion de projets. Passionné par les nouvelles technologies, je me spécialise actuellement en Intelligence Artificielle et Big Data pour élargir mes compétences.</p>

                    <div class="skills">
                        <div class="skill-item">
                            <div class="skill-name">
                                <span>PHP/Laravel</span>
                                <span>90%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" style="width: 90%;"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-name">
                                <span>JavaScript</span>
                                <span>85%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" style="width: 85%;"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-name">
                                <span>Python</span>
                                <span>80%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" style="width: 80%;"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-name">
                                <span>Gestion de projet</span>
                                <span>95%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" style="width: 95%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="section" id="projects">
        <div class="container">
            <div class="section-title">
                <h2>Mes projets</h2>
            </div>
            <div class="projects-grid">
                <!-- Projet 1 -->
                <div class="project-card">
                    <div class="project-img">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3" alt="E-CNPS">
                    </div>
                    <div class="project-info">
                        <h3>E-CNPS</h3>
                        <p>Portail des travailleurs et employeurs de la Caisse Nationale de Prévoyance Sociale.</p>
                        <div class="project-tags">
                            <span class="tag">PHP</span>
                            <span class="tag">Laminas</span>
                            <span class="tag">Zend Framework</span>
                            <span class="tag">Paiement en ligne</span>
                        </div>
                        <a href="https://e.cnps.cl/" target="_blank" class="btn">Voir le projet</a>
                    </div>
                </div>

                <!-- Projet 2 -->
                <div class="project-card">
                    <div class="project-img">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3" alt="E-CM">
                    </div>
                    <div class="project-info">
                        <h3>E-CM</h3>
                        <p>Portail du service médical de la CNPS avec gestion des bons verts et des rôles.</p>
                        <div class="project-tags">
                            <span class="tag">PHP</span>
                            <span class="tag">Laminas</span>
                            <span class="tag">Gestion des rôles</span>
                        </div>
                        <a href="https://cm.cnps.cl/" target="_blank" class="btn">Voir le projet</a>
                    </div>
                </div>

                <!-- Projet 3 -->
                <div class="project-card">
                    <div class="project-img">
                        <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-4.0.3" alt="FAFCI">
                    </div>
                    <div class="project-info">
                        <h3>FAFCI</h3>
                        <p>Application de gestion des prêts accordés aux femmes entrepreneures en Côte d'Ivoire.</p>
                        <div class="project-tags">
                            <span class="tag">Laravel</span>
                            <span class="tag">MySQL</span>
                            <span class="tag">Gestion de profils</span>
                        </div>
                        <a href="https://fafci.org/" target="_blank" class="btn">Voir le projet</a>
                    </div>
                </div>

                <!-- Projet 4 -->
                <div class="project-card">
                    <div class="project-img">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3" alt="GNA Assurances">
                    </div>
                    <div class="project-info">
                        <h3>GNA Assurances</h3>
                        <p>Application Back-Office et Front-Office avec communication via API.</p>
                        <div class="project-tags">
                            <span class="tag">API REST</span>
                            <span class="tag">Frontend</span>
                            <span class="tag">Backend</span>
                        </div>
                        <a href="http://qna.di" target="_blank" class="btn">Voir le projet</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Formations Section -->
    <section class="section" id="education">
        <div class="container">
            <div class="section-title">
                <h2>Formations & Certifications</h2>
            </div>
            <div class="timeline">
                <!-- Item 1 -->
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <div class="timeline-date">2023 - En cours</div>
                        <h3 class="timeline-title">Master spécialisé en Intelligence Artificielle</h3>
                        <p>Tech Global University</p>
                        <p>Acquisition de compétences avancées en machine learning, deep learning et traitement du langage naturel.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <div class="timeline-date">2023 - En cours</div>
                        <h3 class="timeline-title">Certificat BIG DATA et BUSINESS INTELLIGENCE</h3>
                        <p>ESLSCA Business school</p>
                        <p>Formation aux outils d'analyse de données et techniques de business intelligence.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <div class="timeline-date">2021 - 2022</div>
                        <h3 class="timeline-title">Master en informatique option Génie logiciel</h3>
                        <p>Groupe EDHEC Abidjan</p>
                        <p>Spécialisation en conception et développement de solutions logicielles complexes.</p>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <div class="timeline-date">2017 - 2018</div>
                        <h3 class="timeline-title">Licence en informatique option Génie logiciel</h3>
                        <p>ESATIC</p>
                        <p>Fondamentaux du génie logiciel, algorithmique et programmation avancée.</p>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <div class="timeline-date">Certifications</div>
                        <h3 class="timeline-title">Formations spécialisées</h3>
                        <ul>
                            <li>Talend Open Studio - Intégration de données</li>
                            <li>Data Analytics avec Excel avancé, SPSS, Python et PowerBI</li>
                            <li>Zend Framework 3 - Développement PHP avancé</li>
                            <li>PostgreSQL - Optimisation et administration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="section" id="blog">
        <div class="container">
            <div class="section-title">
                <h2>Blog Technique</h2>
            </div>
            <div class="blog-grid">
                <!-- Article 1 -->
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3" alt="Migration Zend à Laminas">
                    </div>
                    <div class="blog-info">
                        <div class="blog-date">15 Mars 2023 • 8 min read</div>
                        <h3>Migration de Zend Framework vers Laminas : Retour d'expérience</h3>
                        <p>Découvrez les défis techniques et solutions pour migrer des applications critiques comme E-CNPS vers Laminas.</p>
                        <a href="#" class="read-more">Lire l'article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1620712943543-bcc4688e7485?ixlib=rb-4.0.3" alt="Architecture Microservices">
                    </div>
                    <div class="blog-info">
                        <div class="blog-date">28 Février 2023 • 6 min read</div>
                        <h3>Concevoir des APIs robustes avec Laravel</h3>
                        <p>Bonnes pratiques pour développer des APIs sécurisées et performantes, tirées de mon expérience sur GNA Assurances.</p>
                        <a href="#" class="read-more">Lire l'article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="blog-card">
                    <div class="blog-img">
                        <img src="https://images.unsplash.com/photo-1655720828012-585f1c761d4e?ixlib=rb-4.0.3" alt="Data Analytics">
                    </div>
                    <div class="blog-info">
                        <div class="blog-date">10 Janvier 2023 • 10 min read</div>
                        <h3>Power BI vs Python : Analyse comparative pour le BI</h3>
                        <p>Quand choisir Power BI plutôt que des solutions Python pour l'analyse de données business.</p>
                        <a href="#" class="read-more">Lire l'article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- [Sections Contact et Footer inchangées] -->
	<!-- Contact Section -->
    <section class="section contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contactez-moi</h2>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Travaillons ensemble</h3>
                    <p>Je suis ouvert aux opportunités de collaboration, aux projets freelance ou aux échanges sur les technologies innovantes.</p>

                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+225 07 09 49 51 98</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>traoremohamed2g@gmail.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Abidjan, Côte d'Ivoire</span>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>

                <div class="contact-form">
                    <form>
                        <div class="form-group">
                            <label for="name">Nom complet</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Sujet</label>
                            <input type="text" id="subject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Envoyer le message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2023 Mohamed Traoré. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // [Script précédent inchangé]
		 // Menu mobile
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Fermer le menu quand on clique sur un lien
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('active');
            });
        });

        // Animation au scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });

        // Ajout pour le blog
        document.querySelectorAll('.read-more').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                // Ici vous pourriez charger dynamiquement le contenu de l'article
                alert("Fonctionnalité de blog à implémenter : Chargement de l'article sélectionné");
            });
        });
    </script>
</body>
</html>
