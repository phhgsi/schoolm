
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Admit Cards</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="admit-card-exam-select">
                Select Exam
            </label>
            <select id="admit-card-exam-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="admit-card-class-select">
                Select Class
            </label>
            <select id="admit-card-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div>
            <button id="generate-admit-cards" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-7">Generate Admit Cards</button>
        </div>
    </div>

    <div id="admit-cards-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Admit cards will be displayed here -->
    </div>

    <div class="text-center mt-6">
        <button id="print-admit-cards" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Print Admit Cards</button>
    </div>
</div>

<?php include 'footer.php'; ?>
