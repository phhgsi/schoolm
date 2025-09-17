
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Reports</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="report-type-select">
                Select Report
            </label>
            <select id="report-type-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="attendance">Attendance Report</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="report-class-select">
                Select Class
            </label>
            <select id="report-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="report-start-date">
                Start Date
            </label>
            <input type="date" id="report-start-date" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="report-end-date">
                End Date
            </label>
            <input type="date" id="report-end-date" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div>
            <button id="generate-report" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">Generate Report</button>
        </div>
    </div>

    <div id="report-container" class="bg-white shadow-md rounded my-6 p-8">
        <!-- Report will be displayed here -->
    </div>
</div>

<?php include 'footer.php'; ?>
