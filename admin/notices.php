<?php
include 'header.php';
?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Manage Notices</h1>

    <!-- Add Notice Form -->
    <form id="add-notice-form" class="mb-8">
        <div class="mb-4">
            <label for="notice-title" class="block text-gray-700">Title</label>
            <input type="text" id="notice-title" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="notice-content" class="block text-gray-700">Content</label>
            <textarea id="notice-content" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <div class="mb-4">
            <label for="notice-date" class="block text-gray-700">Date</label>
            <input type="date" id="notice-date" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Notice</button>
    </form>

    <!-- Notices Table -->
    <table id="notices-table" class="w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Content</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Notices will be loaded here via JavaScript -->
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    // Fetch and display notices
    function loadNotices() {
        $.ajax({
            url: '../api/get_notices.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var noticesTableBody = $('#notices-table tbody');
                noticesTableBody.empty();
                $.each(data, function(index, notice) {
                    noticesTableBody.append(
                        '<tr>' +
                        '<td class="border px-4 py-2">' + notice.title + '</td>' +
                        '<td class="border px-4 py-2">' + notice.content + '</td>' +
                        '<td class="border px-4 py-2">' + notice.date + '</td>' +
                        '<td class="border px-4 py-2">' +
                        '<button class="bg-red-500 text-white px-2 py-1 rounded delete-notice" data-id="' + notice.id + '">Delete</button>' +
                        '</td>' +
                        '</tr>'
                    );
                });
            }
        });
    }

    loadNotices();

    // Add notice
    $('#add-notice-form').on('submit', function(e) {
        e.preventDefault();
        var title = $('#notice-title').val();
        var content = $('#notice-content').val();
        var date = $('#notice-date').val();

        $.ajax({
            url: '../api/add_notice.php',
            type: 'POST',
            data: { title: title, content: content, date: date },
            success: function() {
                loadNotices();
                $('#add-notice-form')[0].reset();
            }
        });
    });

    // Delete notice
    $('#notices-table').on('click', '.delete-notice', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this notice?')) {
            $.ajax({
                url: '../api/delete_notice.php',
                type: 'POST',
                data: { id: id },
                success: function() {
                    loadNotices();
                }
            });
        }
    });
});
</script>

<?php include 'footer.php'; ?>
