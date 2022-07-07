$(document).on('click', '.method', function(){
    $.get("/method/" + $(this).data('id'), function (res) {
        let data = res.data
        console.log(data)
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

$(document).on('click', '#btnAddMethod', function(){

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
            window.setInterval('refresh()', 1500);
        },
        error: function() {
            toastr.error('Seluruh Input Harus Diisi')
        }
    })
})

$(document).on('click', '#btnUpdateMethod', function(){
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
            window.setInterval('refresh()', 1500);
        },
        error: function() {
            toastr.error('Seluruh Input Harus Diisi')
        }
    })
})

$(document).on('click', '#btnDeleteMethod', function(){
    $('#deleteIdMethod').val($('input[id="editIdMethod"]').val())
})

$(document).on('click', '#btnDeleteMethodFinal', function(){
    $.ajax({
        url: "/method/" + $('input[id="deleteIdMethod"]').val(),
        type:"DELETE",
        success:function(res){
            $('#deleteMethodModal').modal('hide');
            toastr.success(res.success);
            window.setInterval('refresh()', 1500);
        },
        error: function() {
            toastr.error('Internal Server Error')
        }
    })
})

