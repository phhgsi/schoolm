
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - School Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <?php include 'header.php'; ?>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Dashboard</h2>
            <div>
                <label for="academic-year-select" class="mr-2">Academic Year:</label>
                <select id="academic-year-select" class="border rounded px-2 py-1"></select>
            </div>
        </div>
        
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h4 class="text-lg font-bold">Total Students</h4>
        <p id="total-students" class="text-3xl font-bold"></p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h4 class="text-lg font-bold">Total Teachers</h4>
        <p id="total-teachers" class="text-3xl font-bold"></p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h4 class="text-lg font-bold">Total Classes</h4>
        <p id="total-classes" class="text-3xl font-bold"></p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h4 class="text-lg font-bold">Fees Collected</h4>
        <p id="total-fees-collected" class="text-3xl font-bold"></p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h4 class="text-lg font-bold">Attendance Summary</h4>
        <canvas id="attendance-chart"></canvas>
    </div>
</div>


    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
