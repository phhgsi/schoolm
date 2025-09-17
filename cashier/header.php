<?php
include_once '../includes/config.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Cashier') {
    header('Location: ' . BASE_URL . 'login.php');
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
            <div class="relative">
                <button class="flex items-center focus:outline-none">
                    <img src="https://via.placeholder.com/40" alt="Admin Profile" class="rounded-full">
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-user mr-2"></i>Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-key mr-2"></i>Change Password</a>
                    <a href="<?php echo BASE_URL; ?>api/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
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
                <li class="mb-2"><a href="<?php echo BASE_URL; ?>cashier/index.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
                <li class="mb-2"><a href="<?php echo BASE_URL; ?>cashier/payments.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-money-bill-wave mr-2"></i>Payments</a></li>
                <li class="mb-2"><a href="<?php echo BASE_URL; ?>cashier/pending_fees.php" class="block p-2 rounded hover:bg-gray-700"><i class="fas fa-file-invoice-dollar mr-2"></i>Pending Fees</a></li>
            </ul>
        </div>
    </div>

    <div class="flex-1 p-4">
