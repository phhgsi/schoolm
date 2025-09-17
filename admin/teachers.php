
<?php include 'header.php'; ?>


<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Teachers</h2>
    <input type="text" id="teacher-search" placeholder="Search teachers..." class="border rounded px-2 py-1">
</div>


<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Employee ID</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Name</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Email</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Phone</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
            </tr>
        </thead>
        <tbody id="teachers-table-body">
            <!-- Teacher data will be inserted here dynamically -->
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
