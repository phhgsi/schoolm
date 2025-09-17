
$(document).ready(function() {
    $.ajax({
        url: 'api/get_homepage_data.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // School Name
            $('.school-name').text(data.school_name);

            // Carousel
            var carouselInner = $('#homepage-carousel .carousel-inner');
            var carouselIndicators = $('#homepage-carousel .carousel-indicators');
            carouselInner.empty();
            carouselIndicators.empty();
            $.each(data.carousel_images, function(index, image) {
                var activeClass = index === 0 ? 'active' : '';
                carouselIndicators.append('<button type="button" data-bs-target="#homepage-carousel" data-bs-slide-to="' + index + '" class="' + activeClass + '" aria-current="true" aria-label="Slide ' + (index + 1) + '"></button>');
                carouselInner.append('<div class="carousel-item ' + activeClass + '"><img src="' + image.image_path + '" class="d-block w-100" alt="' + image.title + '"></div>');
            });

            // About Section
            $('#about-section h2').text(data.about_section.title);
            $('#about-section p').text(data.about_section.content);

            // Courses Section
            var coursesContainer = $('#courses-section .grid');
            coursesContainer.empty();
            $.each(data.courses, function(index, course) {
                coursesContainer.append('<div class="bg-white p-8 rounded-lg shadow-md"><h3 class="text-xl font-bold mb-4">' + course.title + '</h3><p>' + course.description + '</p></div>');
            });

            // Events Section
            var eventsContainer = $('#events-section .grid');
            eventsContainer.empty();
            $.each(data.events, function(index, event) {
                eventsContainer.append('<div class="bg-white p-8 rounded-lg shadow-md"><h3 class="text-xl font-bold mb-4">' + event.title + '</h3><p>' + event.description + '</p><p class="mt-4 text-gray-500">' + event.event_date + '</p></div>');
            });

            // Achievements Section
            var achievementsContainer = $('#achievements-section .grid');
            achievementsContainer.empty();
            $.each(data.achievements, function(index, achievement) {
                achievementsContainer.append('<div class="bg-white p-8 rounded-lg shadow-md text-center"><h3 class="text-3xl font-bold mb-4">' + achievement.count + '</h3><p>' + achievement.label + '</p></div>');
            });

            // Gallery Section
            var galleryContainer = $('#gallery-section .grid');
            galleryContainer.empty();
            $.each(data.gallery_images, function(index, image) {
                galleryContainer.append('<img src="' + image.image_path + '" class="rounded-lg shadow-md">');
            });

            // Testimonials Section
            var testimonialsContainer = $('#testimonials-section .grid');
            testimonialsContainer.empty();
            $.each(data.testimonials, function(index, testimonial) {
                testimonialsContainer.append('<div class="bg-white p-8 rounded-lg shadow-md"><p>"' + testimonial.quote + '"</p><p class="mt-4 font-bold">- ' + testimonial.author + '</p></div>');
            });

            // Footer
            $('#footer-about p').text(data.about_section.content);
            $('#footer-contact .address').text(data.contact_info.address);
            $('#footer-contact .email').text('Email: ' + data.contact_info.email);
            $('#footer-contact .phone').text('Phone: ' + data.contact_info.phone);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching homepage data:', error);
        }
    });
});
