$(function() {
    $(".btn-save").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            if (confirm("simpan perubahan?")) {
                var thisButton = $(this);
                var contact = $(".input-contact").val();
                thisButton.addClass("disabled");
                ajaxCall(update_url, {contact: contact}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    if (result.status == "success") {
                        var data = result.data;
                        $(".input-contact").val(data);
                        showNotification("Perubahan disimpan");
                    } else {
                        showNotification("Gagal menyimpan perubahan");
                    }
                });
            }
        }
    });
});