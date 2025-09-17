
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Fees</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-xl font-bold mb-4">Manage Fee Structures</h3>
            <form id="add-fee-structure-form" class="mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fee-class-select">
                            Select Class
                        </label>
                        <select id="fee-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fee-type">
                            Fee Type
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fee-type" type="text" placeholder="e.g., Tution Fee, Admission Fee">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
                            Amount
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="amount" type="number" placeholder="Amount">
                    </div>
                </div>
                <div class="text-center mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Add Fee Structure
                    </button>
                </div>
            </form>
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Class</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Fee Type</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Amount</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="fee-structures-table-body">
                        <!-- Fee structure data will be inserted here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-xl font-bold mb-4">Record Fee Payment</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="payment-class-select">
                        Select Class
                    </label>
                    <select id="payment-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="payment-student-select">
                        Select Student
                    </label>
                    <select id="payment-student-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
                </div>
            </div>
            <div id="fee-payment-container">
                <!-- Fee payment form will be displayed here -->
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
