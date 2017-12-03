// == Ajax CRUD == //
// Event Handler Click Button show Modal
$('body').on('click', '.show-modal', function (event) {
    event.preventDefault();
 
     // create this object from click event
     var me = $(this);
     //get url active value by click
     var url = me.attr('href');
     //get title
     var title = me.attr('title');

     //change modal title
     $('#modal-title').text(title);
     // Change text Submit button
     $('#modal-btn-save').text(me.hasClass('edit') ? 'Update' : 'Create');
     
    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response) { //show form from html response _create.blade.php
            $('#modal-body').html(response); //put in #modal-body id
       }
    });

    $('#modal').modal('show');
 });

 //Prevent enter presskey
$('#modal').on('keypress', ":input:not(textarea)", function (event) {
    return event.keyCode != 13;
});


 // Event Handler Form Submit Button clicked
 $('#modal-btn-save').click(function(event) {
    event.preventDefault();

     // Make an object form in variable
     var form = $('#modal-body form');
     //Get url from action attribut in modal body form by id
     var url = form.attr('action');
     // Declare method for method attribut form
     var method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    // reset error message
    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function(response) {
            console.log(response);
            $('#datatable').DataTable().ajax.reload();
            $('#modal').modal('hide');
        },
        error: function(response) {
            var response = response.responseJSON; //get xhr response by JSON to errors variable
            if ($.isEmptyObject(response) == false) { //Check if the response is not empty object data
                $.each(response.errors, function (key, value) { //do foreach from error response 
                    $('#' + key) // get element input id by key of field laravel validation
                        .closest('.form-group') // get tag closest by form-group class
                        .addClass('has-error') // add has-error class in tag same as form-group
                        .append('<span class="help-block"><strong>' + value + '</strond></span>') // add tag span with error message from value errro object
                });
            }
        }
    });
});