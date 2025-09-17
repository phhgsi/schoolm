
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Homework</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-xl font-bold mb-4">Add/Edit Homework</h3>
            <form id="add-homework-form">
                <input type="hidden" id="homework-id">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homework-class-select">
                        Select Class
                    </label>
                    <select id="homework-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homework-subject-select">
                        Select Subject
                    </label>
                    <select id="homework-subject-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homework-title">
                        Title
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="homework-title" type="text" placeholder="Homework Title">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homework-description">
                        Description
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="homework-description" placeholder="Homework Description"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homework-due-date">
                        Due Date
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="homework-due-date" type="date">
                </div>
                <div class="text-center mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Save Homework
                    </button>
                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" id="cancel-edit-homework">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Class</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Subject</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Title</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Due Date</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
                    </tr>
                </thead>
                <tbody id="homework-table-body">
                    <!-- Homework data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
