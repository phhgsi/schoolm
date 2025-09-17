
<?php include 'header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Gallery</h2>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h3 class="text-xl font-bold mb-4">Upload Image</h3>
    <form id="add-gallery-image-form" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image-title">
                Image Title
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image-title" type="text" placeholder="Image Title">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image-file">
                Select Image
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image-file" type="file">
        </div>
        <div class="text-center mt-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Upload Image
            </button>
        </div>
    </form>
</div>

<div class="bg-white shadow-md rounded my-6 p-8">
    <h3 class="text-xl font-bold mb-4">Gallery Images</h3>
    <div id="gallery-images-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Gallery images will be inserted here dynamically -->
    </div>
</div>

<?php include 'footer.php'; ?>
