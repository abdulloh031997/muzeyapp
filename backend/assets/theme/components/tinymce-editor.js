$(document).ready(function () {
    $('[data-tinymce="compact"]').each(function () {
        var id = this.id;
        var height = parseInt($(this).attr('data-height'));

        if (!isNaN(height) && height > 0) {
            editor_height = height;
        } else {
            editor_height = 200;
        }

        tinymce.init({
            selector: "#" + id,
            height: editor_height,
            plugins: ["advlist autolink link lists print preview hr anchor pagebreak", "searchreplace wordcount code fullscreen insertdatetime nonbreaking", "save table contextmenu directionality paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link forecolor backcolor",
        });
    });
});