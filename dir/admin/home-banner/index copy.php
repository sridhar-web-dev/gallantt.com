<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Add Banner</h2>
<form id="banner-form" method="POST" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="subtitle">Subtitle:</label>
    <input type="text" id="subtitle" name="subtitle" required><br>

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br>

    <button type="submit" id="submit-btn">Submit</button>
</form>
<div id="response-message"></div>

<div id="response-message"></div>
<?php
require_once '../../../config/config.php';
$db = Database::getDB();
$query = "SELECT * FROM web_banners ORDER BY date_posted DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$banners = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($banners as $banner) {
    echo '<div class="banner">';
    echo '<h2>' . htmlspecialchars($banner['title']) . '</h2>';
    echo '<p>' . htmlspecialchars($banner['subtitle']) . '</p>';
    echo '<img src="' . $banner['image'] . '" alt="' . htmlspecialchars($banner['title']) . '">';
    echo '</div>';
}
?>

</body>
<script src="<?php echo ABS_URL ?>dir/admin/jquery.3.6.1.js"></script>
<script>
    $(document).ready(function () {
    $('#banner-form').on('submit', function (e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        // Send AJAX request to the PHP script to handle the form submission
        $.ajax({
            url: 'process-banner.php', // PHP file to handle the form submission
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#response-message').html(response);
            },
            error: function() {
                $('#response-message').html('Error submitting form.');
            }
        });
    });
});

</script>
</html>