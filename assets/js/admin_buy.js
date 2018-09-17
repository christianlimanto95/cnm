$(function() {
    $(".btn-save").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            if (confirm("simpan perubahan?")) {
                var thisButton = $(this);
                var buy = $(".input-buy").val();
                thisButton.addClass("disabled");
                ajaxCall(update_url, {buy: buy}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    if (result.status == "success") {
                        var data = result.data;
                        $(".input-buy").val(data);
                        showNotification("Perubahan disimpan");
                    } else {
                        showNotification("Gagal menyimpan perubahan");
                    }
                });
            }
        }
    });
});