
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Certificates</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="certificate-type-select">
                Select Certificate Type
            </label>
            <select id="certificate-type-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="bonafide">Bonafide Certificate</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="certificate-class-select">
                Select Class
            </label>
            <select id="certificate-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="certificate-student-select">
                Select Student
            </label>
            <select id="certificate-student-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <button id="generate-certificate" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">Generate Certificate</button>
        </div>
    </div>

    <div id="certificate-container">
        <!-- Certificate will be displayed here -->
    </div>

    <div class="text-center mt-6">
        <button id="print-certificate" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Print Certificate</button>
    </div>
</div>

<?php include 'footer.php'; ?>
