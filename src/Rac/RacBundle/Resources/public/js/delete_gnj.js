$(document).ready(function () {
    alert('hola mundo');

    $('.btn-delete').click(function(e) {
        e.preventDefault();

        var row = $(this).parents('tr');

        var id = row.data('id');

        //alert(id);

        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize(); 

        //alert(data);

        bootbox.confirm(message, function(res)
        {
          if (res == true)
            {
                $.post(url, data, function(result) {

                    if (result.removed == 1)
                    {
                        row.fadeOut();
                        $('#message').removeClass('hidden');
                        $('#user-message').text(result.message);

                        var totalUser = $('#total').text();

                        if ($isNumeric(totalUser))
                        {
                            $('#total').text(totalUser - 1);
                        } 
                        else
                        {
                            $('#total').text(result.countUser);
                        }

                    } 
                    else
                    {
                        $('#message-danger').removeClass('hidden');
                        $('#user-message-danger').text(result.message);
                    }

                }).fail(function(){
                    alert('ERROR');
                    row.show();
                });
            }

        });

    });

});


