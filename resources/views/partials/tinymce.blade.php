<script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.tinymce",
        min_height: 200,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "styleselect | bold italic | fontselect | fontsizeselect | ltr rtl | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code",
        menubar:true,
        statusbar: true,
        directionality: 'rtl',
        language : 'fa_IR',
		content_css: "{{ asset('assets/css/style.css') }}",
    };
    tinymce.init(editor_config);
</script>
