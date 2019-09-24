var this_datatable;
$(document).ready(function() {
    if($('#data-table').length > 0) {
        this_datatable = $('#data-table').DataTable({
            "ajax": BASE_URL+'blogs/get_data',
            columns: [
                { data: "num" },
                { data: "title" },
                { data: "category" },
                { data: "actions" }
            ]
        });
    }
    
    jQuery(document).on('click','.action-btns',function(){
        $curr_this = $(this);
        if($curr_this.hasClass('action-delete-btns')) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this Blog!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if(willDelete) {
                    $.ajax({
                        url: BASE_URL+'blogs/delete',
                        data: 'id='+$(this).data('id'),
                        type: 'post',
                        success: function(data) {
                            this_datatable.ajax.reload();
                        }, error: function() {
                            swal('Could not access the URL');
                        }
                    });
                    swal("Blog has been deleted!", {
                      icon: "success",
                    });
                }
            });
        }
    });
    
    $('.add-form').validate({
        rules: {
            title: {
                required: true,
                minlength : 5
            },
            description : {
                required: true,
            },
            categories : {
                required: true,
            },
            tags : {
                required: true,
            },
        },
//        errorPlacement: function(error, element) {
//            error.appendTo( element.parent(".form-group").find(".error") );
//        },
        submitHandler: function(form) {
            if ($(form).valid()) 
                form.submit(); 
            return false;
        }
    });
    
    if($('#blog_image').length > 0) {
    $('#blog_image').filer({
        limit: 1,
        showThumbs: true,
        extensions: ["jpg", "png", "gif"],
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(input).parents('.jFiler').find('.jFiler-item-icon').html('<img id="img-preview" src="'+ e.target.result+'" alt="your image" style="height: 50px;width: 50px; margin-bottom:0" />');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#blog_image").change(function() {
        readURL(this);
    });
    
    $('#document').filer({
        limit: 1,
        showThumbs: true,
        extensions: ["pdf"],
        captions: {
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Only PDFs are allowed to be uploaded.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-fileMaxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB.",
                folderUpload: "You are not allowed to upload folders."
            }
        }
    });
    }
});