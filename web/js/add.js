$(function(){
    $('#add-form').submit(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: 'add',
            data: $("#add-form").serialize(),
            success: function(data)
            {
                $('#success-msg').text('Success!');
                $('#story').val('');
            }
        });
    });

    $('#story').focus(function(e){
        $('#success-msg').text('');
    });
});
