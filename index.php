
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <!-- Header -->
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold school-name">School Name</h1>
            <nav>
                <a href="#" class="px-4">Home</a>
                <a href="#courses-section" class="px-4">Courses</a>
                <a href="#events-section" class="px-4">Events</a>
                <a href="#gallery-section" class="px-4">Gallery</a>
                <a href="#footer-contact" class="px-4">Contact</a>
                <a href="login.php" class="px-4">Login</a>
            </nav>
        </div>
    </header>

    <!-- Image Carousel -->
    <div id="homepage-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators"></div>
        <div class="carousel-inner"></div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homepage-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homepage-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- About Section -->
    <section id="about-section" class="py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8"></h2>
            <p class="text-center"></p>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses-section" class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Our Courses</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events-section" class="py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section id="achievements-section" class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Our Achievements</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery-section" class="py-16">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Gallery</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials-section" class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">What Our Students Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-4">Join Us Today!</h2>
            <a href="#" class="bg-blue-500 text-white px-8 py-3 rounded-full font-bold">Enroll Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white p-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <div id="footer-about">
                <h3 class="text-xl font-bold mb-4">About Us</h3>
                <p></p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#courses-section">Courses</a></li>
                    <li><a href="#events-section">Events</a></li>
                    <li><a href="#gallery-section">Gallery</a></li>
                    <li><a href="#footer-contact">Contact</a></li>
                </ul>
            </div>
            <div id="footer-contact">
                <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                <p class="address"></p>
                <p class="email"></p>
                <p class="phone"></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/homepage.js"></script>

</body>
</html>
