
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Admin') {
    header('Location: ../login.php');
    exit;
}
?>
<header class="bg-white shadow-md">
    <!-- Main Header -->
    <div class="container mx-auto flex justify-between items-center p-4">
        <div class="flex items-center">
            <img src="https://via.placeholder.com/50" alt="School Logo" class="mr-4">
            <h1 class="text-xl font-bold">School Management System</h1>
        </div>
        <div class="flex items-center">
            <div class="mr-4 relative">
                <input type="text" placeholder="Search..." class="border rounded-full px-4 py-1">
                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-search"></i></span>
            </div>
            <div class="relative">
                <button class="flex items-center focus:outline-none">
                    <img src="https://via.placeholder.com/40" alt="Admin Profile" class="rounded-full">
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-key mr-2"></i>Change Password</a>
                    <a href="../api/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="flex">
    <!-- Sidebar Menu -->
    <div class="w-64 bg-gray-800 text-white h-screen">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Menu</h2>
            <ul>
                <li class="mb-2"><a href="index.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
                <li class="mb-2"><a href="students.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-user-graduate mr-2"></i>Students</a></li>
                <li class="mb-2"><a href="teachers.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-chalkboard-teacher mr-2"></i>Teachers</a></li>
                <li class="mb-2"><a href="classes.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-school mr-2"></i>Classes</a></li>
                <li class="mb-2"><a href="subjects.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-book mr-2"></i>Subjects</a></li>
                <li class="mb-2"><a href="attendance.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-calendar-check mr-2"></i>Attendance</a></li>
                <li class="mb-2"><a href="exams.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-file-alt mr-2"></i>Exams & Results</a></li>
                <li class="mb-2"><a href="fees.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-money-bill-wave mr-2"></i>Fees</a></li>
                <li class="mb-2"><a href="events.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-calendar-alt mr-2"></i>Events</a></li>
                <li class="mb-2"><a href="gallery.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-images mr-2"></i>Gallery</a></li>
                <li class="mb-2"><a href="reports.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-chart-bar mr-2"></i>Reports</a></li>
                <li class="mb-2"><a href="settings.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-cogs mr-2"></i>Settings</a></li>
            </ul>
        </div>
    </div>

    <div class="flex-1 p-4">
