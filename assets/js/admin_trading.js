$(function() {
    $(".btn-save").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var image = $(".image-input").val();
            if (image != "") {
                if (confirm("simpan gambar trading?")) {
                    var thisButton = $(this);
                    thisButton.addClass("disabled");
                    showLoader();
                    ajaxCall(add_url, {trading_image: image}, function(json) {
                        var result = jQuery.parseJSON(json);
                        if (result.status == "success") {
                            window.location.reload();
                        } else {
                            hideLoader();
                            thisButton.removeClass("disabled");
                            showNotification("Gagal menambah trading");
                        }
                    });
                }
            }
        }
    });

    $(".btn-delete-testimony").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var id = $(this).attr("data-id");
            if (confirm("hapus trading ini?")) {
                var thisButton = $(this);
                thisButton.addClass("disabled");
                showLoader();
                ajaxCall(delete_url, {trading_id: id}, function(json) {
                    window.location.reload();
                });
            }
        }
    });
});