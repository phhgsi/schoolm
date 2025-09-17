
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Events & Announcements</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h3 class="text-xl font-bold mb-4">Add/Edit Event</h3>
            <form id="add-event-form">
                <input type="hidden" id="event-id">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="event-title">
                        Title
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event-title" type="text" placeholder="Event Title">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="event-description">
                        Description
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event-description" placeholder="Event Description"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="event-date">
                        Date
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event-date" type="date">
                </div>
                <div class="text-center mt-6">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Save Event
                    </button>
                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" id="cancel-edit-event">
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
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Title</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Date</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-bold uppercase text-sm text-left">Actions</th>
                    </tr>
                </thead>
                <tbody id="events-table-body">
                    <!-- Event data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
