function alertMessage(type, message) {
    toastr.options = {
        "closeButton": true,
        "timeOut": 2000
    };
    if (type == "success") {
        toastr.success(message);
    } else if (type == "error") {
        toastr.error(message);
    }
}

function confirmStatusModal(status, url, msg = '') {

    var text = msg == '' ? "Are you sure, you want to enable?" : msg;
    if (status == 1) {
        text = msg == '' ? "Are you sure, you want to disable?" : msg;
    } else if (status == 2) {
        text = msg == '' ? "Are you sure, you want to delete?" : msg;
    }

    Swal.fire({
        title: "Confirmation",
        text: text,
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-success mx-1",
        cancelButtonClass: "btn btn-danger mx-1",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        buttonsStyling: false,
    }).then(function(isConfirm) {
        if (isConfirm.value) {
            loader(true);

            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.response == "success") {
                        alertMessage("success", data.message, 5);
                    } else {
                        alertMessage("error", data.message, 15);
                    }
                    results();
                },
                error: function(data) {
                    errorHandler(data);
                    results();
                },
            });
        }
    });

    return false;
}

function loader(type) {
    if (type) {
        $("#loaderModal").show();
    } else {
        $("#loaderModal").hide();
    }
}
