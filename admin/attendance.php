
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Attendance</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="attendance-class-select">
                Select Class
            </label>
            <select id="attendance-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="attendance-date">
                Select Date
            </label>
            <input type="date" id="attendance-date" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <button id="get-students-for-attendance" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">Get Students</button>
        </div>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Scholar No.</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Name</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Status</th>
                </tr>
            </thead>
            <tbody id="attendance-table-body">
                <!-- Student data will be inserted here dynamically -->
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
