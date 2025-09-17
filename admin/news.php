<?php
include 'header.php';
?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Manage News</h1>

    <!-- Add News Form -->
    <form id="add-news-form" class="mb-8">
        <div class="mb-4">
            <label for="news-title" class="block text-gray-700">Title</label>
            <input type="text" id="news-title" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="news-content" class="block text-gray-700">Content</label>
            <textarea id="news-content" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <div class="mb-4">
            <label for="news-date" class="block text-gray-700">Date</label>
            <input type="date" id="news-date" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add News</button>
    </form>

    <!-- News Table -->
    <table id="news-table" class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- News items will be loaded here via JavaScript -->
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    // Fetch and display news
    function loadNews() {
        $.ajax({
            url: '../api/get_news.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var newsTableBody = $('#news-table tbody');
                newsTableBody.empty();
                $.each(data, function(index, news_item) {
                    newsTableBody.append(
                        '<tr>' +
                        '<td class="border px-4 py-2">' + news_item.title + '</td>' +
                        '<td class="border px-4 py-2">' + news_item.content + '</td>' +
                        '<td class="border px-4 py-2">' + news_item.date + '</td>' +
                        '<td class="border px-4 py-2">' +
                        '<button class="bg-red-500 text-white px-2 py-1 rounded delete-news" data-id="' + news_item.id + '">Delete</button>' +
                        '</td>' +
                        '</tr>'
                    );
                });
            }
        });
    }

    loadNews();

    // Add news
    $('#add-news-form').on('submit', function(e) {
        e.preventDefault();
        var title = $('#news-title').val();
        var content = $('#news-content').val();
        var date = $('#news-date').val();

        $.ajax({
            url: '../api/add_news.php',
            type: 'POST',
            data: { title: title, content: content, date: date },
            success: function() {
                loadNews();
                $('#add-news-form')[0].reset();
            }
        });
    });

    // Delete news
    $('#news-table').on('click', '.delete-news', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this news item?')) {
            $.ajax({
                url: '../api/delete_news.php',
                type: 'POST',
                data: { id: id },
                success: function() {
                    loadNews();
                }
            });
        }
    });
});
</script>

<?php include 'footer.php'; ?>
