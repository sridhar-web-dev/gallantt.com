<form id="welfareForm" method="post" action="process_welfare.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title <span class="text-danger">*</span></label>
    <input type="text" class="form-control" name="title" id="title" required maxlength="255">
  </div>

  <div class="form-group">
    <label for="image">Image <span class="text-danger">*</span></label>
    <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
  </div>

  <div class="form-group">
    <label for="description">Small Description <span class="text-danger">*</span></label>
    <textarea class="form-control" name="description" id="description" rows="3" required maxlength="500"></textarea>
  </div>

  <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $('#welfareForm').on('submit', function(e) {
    let file = $('#image')[0].files[0];
    if (file && file.size > 2 * 1024 * 1024) { // 2MB max
      alert('Image size must be less than 2MB.');
      e.preventDefault();
    }
  });
</script>
