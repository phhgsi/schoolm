
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Communication Center</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <form id="send-message-form">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="message-to">
                Send To
            </label>
            <select id="message-to" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="all_students">All Students</option>
                <option value="all_parents">All Parents</option>
                <option value="all_teachers">All Teachers</option>
                <option value="specific_class">A Specific Class</option>
            </select>
        </div>
        <div id="specific-class-container" class="mb-4 hidden">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="message-class-select">
                Select Class
            </label>
            <select id="message-class-select" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="message-subject">
                Subject
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message-subject" type="text" placeholder="Message Subject">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="message-body">
                Message
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="message-body" placeholder="Message Body"></textarea>
        </div>
        <div class="text-center mt-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Send Message
            </button>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
