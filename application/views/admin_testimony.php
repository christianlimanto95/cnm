<div class="form-item form-item-foto">
    <div class="form-label-inline">Foto <span class="error error-add-foto"></span></div>
    <div class="form-right form-right-inline">
        <input type="hidden" class="image-input" value="" />
        <div class="upload-container">
            <div class="upload-button">
                <div class="upload-text">Choose Image</div>
            </div>
            <input type="file" class="image-input-upload" name="input-image" accept="image/*" />
        </div>
        <img class="image-preview" />
        <div class="btn btn-negative btn-delete-image">Delete</div>
    </div>
</div>
<div class="btn btn-save">Save</div>
<div class="testimony-container">
<?php
$iLength = sizeof($testimony);
for ($i = 0; $i < $iLength; $i++) {
    echo "<div class='testimony-image-container'>";
    echo "<input type='hidden' class='input-id' value='" . $testimony[$i]->testimony_id . "' />";
    echo "<img class='testimony-image' src='" . base_url("assets/images/testimony_" . $testimony[$i]->testimony_id . "." . $testimony[$i]->testimony_image_extension . "?d=" . strtotime($testimony[$i]->modified_date)) . "' />";
    echo "<div class='btn btn-negative btn-delete-testimony' data-id='" . $testimony[$i]->testimony_id . "'>Delete</div>";
    echo "</div>";
}
?>
</div>
<script>
var add_url = "<?php echo base_url("admin/add_testimony"); ?>";
var delete_url = "<?php echo base_url("admin/delete_testimony"); ?>";
</script>