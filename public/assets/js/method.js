$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".method").click(function(e){
        e.preventDefault()

        $.get("/method/" + $(this).data('id'), function (res) {
            let data = res.data

            $('#editNameMethod').val(data.name)
            $('#editIdMethod').val(data.id)

            if (data.is_default === false) {
                $('#editFormMethodDescription').hide()
            } else {
                $('#editFormMethodDescription').show()
                $('#editDescriptionMethod').val(data.description)
            }
        })
    })

    $("#btnAddMethod").click(function(e){
        e.preventDefault()

        let name = $('input[id="nameMethod"]').val();
        let is_default = $('input[name="is_default"]:checked').val()
        let description = $('input[id="descriptionMethod"]').val()

        $.ajax({
            url: "/method",
            type:"POST",
            data:{
                name:name,
                is_default:is_default,
                description:description,
            },
            success:function(res){
                $('#addMethodModal').modal('hide');
                toastr.success(res.success);
            },
            error: function() {
                toastr.error('Seluruh Input Harus Diisi')
            }
        })
    })

    $("#btnUpdateMethod").click(function(e){
        e.preventDefault()
        let id = $('input[id="editIdMethod"]').val();
        let name = $('input[id="editNameMethod"]').val();
        let description = $('input[id="editDescriptionMethod"]').val()

        $.ajax({
            url: "/method/" + id,
            type:"PUT",
            data:{
                name:name,
                description:description,
            },
            success:function(res){
                $('#editMethodModal').modal('hide');
                toastr.success(res.success);
            },
            error: function() {
                toastr.error('Seluruh Input Harus Diisi')
            }
        })
    })

    $("#btnDeleteMethod").click(function(e){
        e.preventDefault()
        $('#deleteIdMethod').val($('input[id="editIdMethod"]').val())
    })

    $("#btnDeleteMethodFinal").click(function(e){
        e.preventDefault()

        $.ajax({
            url: "/method/" + $('input[id="deleteIdMethod"]').val(),
            type:"DELETE",
            success:function(res){
                $('#deleteMethodModal').modal('hide');
                toastr.success(res.success);
            },
            error: function() {
                toastr.error('Internal Server Error')
            }
        })
    })
})

