$(function(){
    $('#add-form').submit(function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: 'add',
            data: $("#add-form").serialize(),
            success: function(data)
            {
                alert(data); // show response from the php script.
            }
        });
    });
});
