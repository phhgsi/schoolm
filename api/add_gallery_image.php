
<?php
include '../includes/config.php';

header('Content-Type: application/json');

$academic_year_id = isset($_POST['academic_year_id']) ? $_POST['academic_year_id'] : 1;
$title = isset($_POST['title']) ? $_POST['title'] : '';

if (empty($title) || empty($_FILES['image'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Title and image are required']);
    exit;
}

$target_dir = "../uploads/gallery/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check === false) {
    http_response_code(400);
    echo json_encode(['error' => 'File is not an image.']);
    exit;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    http_response_code(400);
    echo json_encode(['error' => 'Sorry, your file is too large.']);
    exit;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    http_response_code(400);
    echo json_encode(['error' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.']);
    exit;
}

// new file name
$new_file_name = uniqid() . '.' . $imageFileType;
$new_target_file = $target_dir . $new_file_name;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $new_target_file)) {
    try {
        $stmt = $pdo->prepare("INSERT INTO gallery (title, image_path, academic_year_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, 'uploads/gallery/' . $new_file_name, $academic_year_id]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Sorry, there was an error uploading your file.']);
}

?>
