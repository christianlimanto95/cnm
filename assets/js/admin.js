$(function() {
    $(".btn-save").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            if (confirm("simpan perubahan?")) {
                var thisButton = $(this);
                var what = $(".input-what").val();
                thisButton.addClass("disabled");
                ajaxCall(update_url, {what: what}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    if (result.status == "success") {
                        var data = result.data;
                        $(".input-what").val(data);
                        showNotification("Perubahan disimpan");
                    } else {
                        showNotification("Gagal menyimpan perubahan");
                    }
                });
            }
        }
    });
});