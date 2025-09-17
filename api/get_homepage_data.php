
<?php
include 'includes/config.php';

header('Content-Type: application/json');

try {
    // Settings
    $stmt = $pdo->query("SELECT * FROM settings");
    $settings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    // Carousel Images (from gallery)
    $stmt = $pdo->query("SELECT * FROM gallery WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT 5");
    $carousel_images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // About Section (from settings)
    $about_section = [
        'title' => isset($settings['about_title']) ? $settings['about_title'] : 'About Us',
        'content' => isset($settings['about_content']) ? $settings['about_content'] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies lacinia, nisl nisl aliquet nisl, eget aliquam nisl nisl sit amet nisl.'
    ];

    // Courses (from settings for now, can be a separate table later)
    $courses = isset($settings['courses']) ? json_decode($settings['courses'], true) : [
        ['title' => 'Course 1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
        ['title' => 'Course 2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
        ['title' => 'Course 3', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.']
    ];

    // Events
    $stmt = $pdo->query("SELECT * FROM events WHERE is_deleted = 0 AND event_date >= CURDATE() ORDER BY event_date ASC LIMIT 3");
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Achievements (from settings for now)
    $achievements = isset($settings['achievements']) ? json_decode($settings['achievements'], true) : [
        ['count' => '1000+', 'label' => 'Students'],
        ['count' => '50+', 'label' => 'Teachers'],
        ['count' => '20+', 'label' => 'Awards']
    ];

    // Gallery Images
    $stmt = $pdo->query("SELECT * FROM gallery WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT 8");
    $gallery_images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Testimonials (from settings for now)
    $testimonials = isset($settings['testimonials']) ? json_decode($settings['testimonials'], true) : [
        ['quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies lacinia, nisl nisl aliquet nisl, eget aliquam nisl nisl sit amet nisl.', 'author' => 'Student Name'],
        ['quote' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl nec ultricies lacinia, nisl nisl aliquet nisl, eget aliquam nisl nisl sit amet nisl.', 'author' => 'Student Name']
    ];

    // Notices
    $stmt = $pdo->query("SELECT * FROM notices WHERE is_deleted = 0 ORDER BY date DESC LIMIT 5");
    $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // News
    $stmt = $pdo->query("SELECT * FROM news WHERE is_deleted = 0 ORDER BY date DESC LIMIT 3");
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $response = [
        'school_name' => isset($settings['school_name']) ? $settings['school_name'] : 'School Name',
        'carousel_images' => $carousel_images,
        'about_section' => $about_section,
        'courses' => $courses,
        'events' => $events,
        'achievements' => $achievements,
        'gallery_images' => $gallery_images,
        'testimonials' => $testimonials,
        'notices' => $notices,
        'news' => $news,
        'contact_info' => [
            'address' => isset($settings['school_address']) ? $settings['school_address'] : '123 School Street, City, State, 12345',
            'email' => isset($settings['school_email']) ? $settings['school_email'] : 'info@school.com',
            'phone' => isset($settings['school_phone']) ? $settings['school_phone'] : '123-456-7890'
        ]
    ];

    echo json_encode($response);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
