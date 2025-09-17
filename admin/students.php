
<?php include 'header.php'; ?>


<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Students</h2>
    <input type="text" id="student-search" placeholder="Search students..." class="border rounded px-2 py-1">
</div>


<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Scholar No.</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Name</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Class</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Father's Name</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
            </tr>
        </thead>
        <tbody id="students-table-body">
            <!-- Student data will be inserted here dynamically -->
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
