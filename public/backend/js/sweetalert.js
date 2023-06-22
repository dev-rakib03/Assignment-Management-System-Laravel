function deletevalidateForm(fromid) {
    event.preventDefault(); // prevent form submit
    swal({
        title: "Are you sure?",
        text: "But you will still be able to retrieve this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
        if (isConfirm) {
            $("#"+fromid).submit();// submitting the form when user press yes
        } else {
            swal("Cancelled", "Your imaginary is safe :)", "error");
        }
    });
}
