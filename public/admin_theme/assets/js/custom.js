$(document).on("click", ".act-delete", function (e) {
    e.preventDefault();

    var action = $(this).attr("href");
    var element = $(this).parents("tr");
    var title = $(this).data("title");

    Swal.fire({ 
        title: "Are you sure?", 
        text: "You won't to delete this " + title + "?" , 
        type: "warning", 
        showCancelButton: !0, 
        confirmButtonColor: "#3085d6", 
        cancelButtonColor: "#d33", 
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: action,
                type: "POST",
                dataType: "json",
                beforeSend: addOverlay,
                data: {
                    _token: $('meta[name="csrf_token"]').attr("content"),
                },
                success: function (result) {
                    if (result === true) {
                        Swal.fire({ 
                            type: "error", 
                            title: "Delete", 
                            text: title + " delete Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        element.remove();
                        getBalanceTotal();
                    }
                },
                complete: removeOverlay,
            });
            return true;
        } else {
            return false;
        }
    });
});

function addOverlay() {
    $('<div id="overlayDocument"></div>').appendTo(document.body);
}

function removeOverlay() {
    $("#overlayDocument").remove();
}
