$(document).ready(function() {    
    $('#description').summernote({
        height: 300,
    });
    
    //Select 2
    $('#blog-categories').select2({
        allowClear: true
    });
    
    $("#tags").select2({
        tags: true,
        tokenSeparators: [','],
        allowClear: true
    });
    
    $(document).on('keyup','.slugify',function() {
        var name = $(this).val();
        var slug = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '_');
        slug = slug.toLowerCase();
        $(this).parents('#content').find('#slug').val(slug);
    });
    
});