
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Classes</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-xl font-bold mb-4">Add New Class</h3>
            <form id="add-class-form">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="class-name">
                        Class Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="class-name" type="text" placeholder="Class Name">
                </div>
                <div class="text-center mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Add Class
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
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Class Name</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
                    </tr>
                </thead>
                <tbody id="classes-table-body">
                    <!-- Class data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
