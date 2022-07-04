$(document).ready(function(){
    $("#descriptionMethod").hide()

    $('input[name="is_default"]').change(function(){
        if ($('input[name="is_default"]:checked').val() === "1"){
            $("#descriptionMethod").show()
        } else {
            $("#descriptionMethod").hide()
        }
    })
});

