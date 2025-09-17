
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Record Fee Payment</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="cashier-class-select">
                Select Class
            </label>
            <select id="cashier-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="cashier-student-select">
                Select Student
            </label>
            <select id="cashier-student-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
    </div>
    <div id="cashier-fee-payment-container">
        <!-- Fee payment form will be displayed here -->
    </div>
</div>

<?php include 'footer.php'; ?>
