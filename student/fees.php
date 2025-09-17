
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">My Fee Payment History</h2>

<div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Fee Type</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Amount Paid</th>
                <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Payment Date</th>
            </tr>
        </thead>
        <tbody id="student-fees-table-body">
            <!-- Fee payment data will be inserted here dynamically -->
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
