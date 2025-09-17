
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Pending Fees</h2>

<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Scholar No.</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Name</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Class</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Fee Type</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Due Amount</th>
            </tr>
        </thead>
        <tbody id="pending-fees-table-body">
            <!-- Pending fees data will be inserted here dynamically -->
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
