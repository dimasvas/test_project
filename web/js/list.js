$(function(){
   $('#delete-btn').click(function(e){
        e.preventDefault();

        var self = $(this);

           $.ajax({
               type: "Delete",
               url: 'delete/' + $(this).data('id'),
               success: function(data)
               {
                   $(self).closest('tr').remove();
               }
           });
   });
});
