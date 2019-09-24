var this_datatable;
$(document).ready(function() {
    if($('#data-table').length > 0) {
        this_datatable = $('#data-table').DataTable({
            "ajax": BASE_URL+'categories/get_categories',
            columns: [
                { data: "num" },
                { data: "name" },
                { data: "actions" }
            ]
        });
    }
    
    $('.add-btn').click(function() {
        $('#edit-modal').find('.modal-title').html('<i class="fa fa-list"></i> Add New Category');
        $('#edit-modal').modal('show');
    });
    
    jQuery(document).on('click','.action-btns',function(){
        $curr_this = $(this);
        if($curr_this.hasClass('action-delete-btns')) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Category!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if(willDelete) {
                    $.ajax({
                        url: BASE_URL+'categories/delete',
                        data: 'id='+$(this).data('id'),
                        type: 'post',
                        success: function(data) {
                            this_datatable.ajax.reload();
                        }, error: function() {
                            swal('Could not access the URL');
                        }
                    });
                    swal("Category has been deleted!", {
                      icon: "success",
                    });
                }
            });
        } else {
            $.ajax({
                url: BASE_URL+'categories/get_details',
                data: 'id='+$curr_this.data('id'),
                type: 'post',
                success: function(data) {
                    var obj = jQuery.parseJSON(data);
                    $.each(obj, function(key,value){
                        $('#edit-modal').find('#'+key).val(value);
                    });
                }, error: function() {
                    swal('Could no access the URL');
                }
            });
            $('#edit-modal').modal('show');
        }
    });
    
    $('#save_btn').click(function() {
        var id          = $('.add-form').find('#id').val();
        var form_data   = $('.add-form').serialize();
        var form_url    = (id != '') ? BASE_URL+'categories/update' : BASE_URL+'categories/create';
        $.ajax({
            url: form_url,
            data: form_data,
            type: 'post',
            success: function(data) {
                $('#edit-modal').modal('hide');
            }, error: function() {
                swal('Could not access the URL');
            }, complete: function() {
                this_datatable.ajax.reload();
                $('#edit-modal').find('input').val('');
            }
        });
    });
});