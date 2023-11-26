function enableBtn() {
    $('#saveBtn').removeClass('disabled');
}

function routeToInfo(id) {
    event.preventDefault();
    $.ajax({
        url: "/" + id,
        type: 'get',

        success: function (data) {
            $("#content").html(data);
        }
    })
}

function submitEditForm(id) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = {
        title: $('#title').val(),
        tags: $('#tags').val(),
        pages: $('#pages').val(),
        description: $('#description').val(),
    };

    $.ajax({
        type: 'POST',
        url: '/edit/' + id,
        data: formData,
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        success: function (response) {
            routeToInfo(id);
        },
        error: function (error) {
        }
    });
}