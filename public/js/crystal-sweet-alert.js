function disposeAlert() {
    swal.close();
}

function errorAlert(message, callback)
{    
    var sweetAlert = {
        title: "Sorry!",
        text: 'You actions did\'t completed due to some errors!',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, show me more!",
        cancelButtonText: "No, continue!",
        closeOnConfirm: false,
        closeOnCancel: false
    };
    swal( sweetAlert , function(isConfirm) {
        if (isConfirm)
        {
            swal({
                title: "Error!",
                type: 'error',
                text: message,
                html: true,
                customClass: 'httpError',
                confirmButtonText: "Close",
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            },
            function(isClosed) {
                if(isClosed)
                {
                    callback();
                }
                return;
            });
        }
        else
        {
            disposeAlert();
        }
    });
}