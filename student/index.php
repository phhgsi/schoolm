
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Student') {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-xl font-bold">Student Dashboard</h1>
            <a href="../api/logout.php" class="text-sm text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
    </header>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="profile.php" class="bg-white p-8 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold mb-4">My Profile</h3>
            </a>
            <a href="attendance.php" class="bg-white p-8 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold mb-4">My Attendance</h3>
            </a>
            <a href="results.php" class="bg-white p-8 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold mb-4">My Results</h3>
            </a>
            <a href="fees.php" class="bg-white p-8 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-bold mb-4">My Fees</h3>
            </a>
        </div>
    </div>
</body>
</html>
