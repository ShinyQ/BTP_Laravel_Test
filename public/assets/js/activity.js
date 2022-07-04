$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".activity").click(function(e){
        e.preventDefault()

        $.get("/activity/" + $(this).data('id'), function (res) {
            let data = res.data

            $('#editNameActivity').val(data.name)
            $('#editIdActivity').val(data.id)
            $('#editStartActivity').val(data.start)
            $('#editEndActivity').val(data.end)
            $('#editMethodActivity option[value="'+data.method_id+'"]').prop('selected', true);
            $('#editStatusActivity option[value="'+data.status+'"]').prop('selected', true);
        })
    })

    $("#btnAddActivity").click(function(e){
        e.preventDefault()

        let name = $('input[id="nameActivity"]').val();
        let method_id = $('#idMethodActivity option').filter(':selected').val()
        let start = $('input[id="startActivity"]').val();
        let end = $('input[id="endActivity"]').val();
        let status = $('#statusActivity option').filter(':selected').text()

        $.ajax({
            url: "/activity",
            type:"POST",
            data:{
                method_id:method_id,
                name:name,
                start: start,
                end: end,
                status: status,
            },
            success:function(res){
                $('#addActivityModal').modal('hide');
                toastr.success(res.success);
            },
            error: function() {
                toastr.error('Seluruh Input Harus Diisi')
            }
        })
    })

    $("#btnUpdateActivity").click(function(e){
        e.preventDefault()

        let id = $('input[id="editIdActivity"]').val();
        let name = $('input[id="editNameActivity"]').val();
        let method_id = $('#idMethodActivity option').filter(':selected').val()
        let start = $('input[id="editStartActivity"]').val();
        let end = $('input[id="editEndActivity"]').val();
        let status = $('#editStatusActivity option').filter(':selected').text()

        console.log(id, name, method_id, start, end, status)

        $.ajax({
            url: "/activity/" + id,
            type:"PUT",
            data:{
                method_id:method_id,
                name:name,
                start: start,
                end: end,
                status: status,
            },
            success:function(res){
                $('#activityEditModal').modal('hide');
                toastr.success(res.success);
            },
            error: function() {
                toastr.error('Seluruh Input Harus Diisi')
            }
        })
    })

    $("#btnDeleteActivity").click(function(e){
        e.preventDefault()
        $('#deleteIdActivity').val($('input[id="editIdActivity"]').val())
    })

    $("#btnDeleteActivityFinal").click(function(e){
        e.preventDefault()

        $.ajax({
            url: "/activity/" + $('input[id="deleteIdActivity"]').val(),
            type:"DELETE",
            success:function(res){
                $('#deleteActivityModal').modal('hide');
                toastr.success(res.success);
            },
            error: function() {
                toastr.error('Internal Server Error')
            }
        })
    })
})

