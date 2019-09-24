var this_datatable;
$(document).ready(function() {
    if($('#user-table').length > 0) {
        this_datatable = $('#user-table').DataTable({
            "ajax": BASE_URL+'users/get_users',
            columns: [
                { data: "num" },
                { data: "name" },
                { data: "email_id" },
                { data: "phone" },
                { data: "actions" }
            ]
        });
    }
    jQuery(document).on('click','.action-btns',function(){
        $curr_this = $(this);
        if($curr_this.hasClass('action-delete-btns')) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if(willDelete) {
                    $.ajax({
                        url: BASE_URL+'users/delete_user',
                        data: 'user-id='+$(this).data('user-id'),
                        type: 'post',
                        success: function(data) {
                            this_datatable.ajax.reload();
                        }, error: function() {
                            swal('Could not access the URL');
                        }
                    });
                    swal("User has been deleted!", {
                      icon: "success",
                    });
                }
            });
        } else {
            $.ajax({
                url: BASE_URL+'users/get_user_details',
                data: 'user-id='+$curr_this.data('user-id'),
                type: 'post',
                success: function(data) {
                    var user_obj = jQuery.parseJSON(data);
                    $.each(user_obj, function(key,value){
                        $('#edit-modal').find('#'+key).val(value);
                    });
                }, error: function() {
                    swal('Could no access the URL');
                }
            });
            $('#edit-modal').modal('show');
            
            $('#save_btn').click(function() {
                $.ajax({
                    url: BASE_URL+'users/update_user',
                    data: 'user-id='+$curr_this.data('user-id')+'&'+$('.user-form').serialize(),
                    type: 'post',
                    success: function(data) {
                        $('#edit-modal').modal('hide');
                    }, error: function() {
                        swal('Could not access the URL');
                    }, complete: function() {
                        this_datatable.ajax.reload();
                    }
                });
            });
        }
    });
    
    var register_form = $( "#user-register-form" );
    register_form.validate({
        rules: {
            first_name: {
                minlength : 3
            },
            last_name: {
                minlength : 3
            },
            email: {
              required: true,
              email: true
            },
            password : {
                minlength : 5
            },
            password_confirmation : {
                minlength : 5,
                equalTo : "#password"
            }
        },
        submitHandler: function(form) {
            if ($(form).valid()) 
                form.submit(); 
            return false;
        }
    });
    
    $('#login-form').validate({
        rules: {
            email_id: {
              required: true,
              email: true
            },
            password : {
                required: true,
                minlength : 5
            },
        },
        submitHandler: function(form) {
            if ($(form).valid()) 
                form.submit(); 
            return false;
        }
    });
    
});