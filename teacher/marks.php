
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Enter Marks</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher-exam-select">
                Select Exam
            </label>
            <select id="teacher-exam-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher-marks-class-select">
                Select Class
            </label>
            <select id="teacher-marks-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher-marks-subject-select">
                Select Subject
            </label>
            <select id="teacher-marks-subject-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <button id="get-students-for-marks-entry" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">Get Students</button>
        </div>
    </div>

    <div class="bg-white shadow-md rounded my-6">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Scholar No.</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Name</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Marks</th>
                </tr>
            </thead>
            <tbody id="teacher-marks-table-body">
                <!-- Student data will be inserted here dynamically -->
            </tbody>
        </table>
        <div class="text-center mt-6">
            <button id="save-marks" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Marks</button>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
