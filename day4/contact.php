<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact page</title>
    <link rel="stylesheet" href="./css/contact.css">
</head>

<body>
    <?php
    include './includes/header.php';
    renderHeader('contact');
    ?>

    <main class="container">
        <section class="hero-section">
            <h1>Get In Touch</h1>
            <p class="subtitle">Let's Create Something Amazing Together</p>
            <p class="description">
                Ready to elevate your lifestyle brand? We'd love to hear about your project and discuss how we can help
                bring your vision to life through compelling content and strategic storytelling.
            </p>
        </section>

        <div class="contact-grid">
            <div class="contact-form">
                <h2>Send us a Message</h2>
                <form action="contact_handler.php" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company/Brand</label>
                        <input type="text" id="company" name="company">
                    </div>

                    <div class="form-group">
                        <label for="service">Service Interest</label>
                        <select id="service" name="service">
                            <option value="">Select a service</option>
                            <option value="content-creation">Content Creation</option>
                            <option value="brand-strategy">Brand Strategy</option>
                            <option value="social-media">Social Media Management</option>
                            <option value="lifestyle-photography">Lifestyle Photography</option>
                            <option value="consulting">Consulting</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="budget">Project Budget</label>
                        <select id="budget" name="budget">
                            <option value="">Select budget range</option>
                            <option value="under-5k">Under $5,000</option>
                            <option value="5k-10k">$5,000 - $10,000</option>
                            <option value="10k-25k">$10,000 - $25,000</option>
                            <option value="25k-plus">$25,000+</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Project Details *</label>
                        <textarea id="message" name="message" placeholder="Tell us about your project, goals, and timeline..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>

            <div class="contact-info">
                <h2>Contact Information</h2>

                <div class="contact-method">
                    <div class="icon">📧</div>
                    <div class="details">
                        <h3>Email Us</h3>
                        <p><a href="mailto:hello@youragency.com">hello@youragency.com</a></p>
                        <p>We'll respond within 24 hours</p>
                    </div>
                </div>

                <div class="contact-method">
                    <div class="icon">📱</div>
                    <div class="details">
                        <h3>Call Us</h3>
                        <p><a href="tel:+1234567890">+1 (234) 567-8900</a></p>
                        <p>Mon-Fri, 9AM-6PM EST</p>
                    </div>
                </div>

                <div class="contact-method">
                    <div class="icon">📍</div>
                    <div class="details">
                        <h3>Visit Our Studio</h3>
                        <p>123 Creative Street<br>Design District, NY 10001</p>
                        <p>By appointment only</p>
                    </div>
                </div>

                <div class="contact-method">
                    <div class="icon">💬</div>
                    <div class="details">
                        <h3>Live Chat</h3>
                        <p>Available on our website</p>
                        <p>Mon-Fri, 9AM-5PM EST</p>
                    </div>
                </div>
            </div>
        </div>

        <section class="map-section">
            <h2>Find Our Studio</h2>
            <p>Located in the heart of the creative district, our studio is where the magic happens.</p>
            <div class="map-placeholder">
                🗺️ Interactive Map Coming Soon
            </div>
        </section>

        <section class="social-section">
            <h2>Follow Our Journey</h2>
            <p>Stay connected and get inspired by our latest work and lifestyle content.</p>
            <div class="social-links">
                <a href="#" class="social-link">📘</a>
                <a href="#" class="social-link">📷</a>
                <a href="#" class="social-link">🐦</a>
                <a href="#" class="social-link">💼</a>
                <a href="#" class="social-link">📌</a>
                <a href="#" class="social-link">▶️</a>
            </div>
        </section>
    </main>
</body>

</html>