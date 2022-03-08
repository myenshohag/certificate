$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getHeadData(id) {
    console.log(id);
    $.ajax({
        type: 'POST',
        url: window.getheadurl,
        data: {
            'id': id
        },
        success: function (response) {
            $("#ID").val(response.id);   
            $("#title").val(response.title);   
            $("#parent").val(response.parent);   
        }
    });
}