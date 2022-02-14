// Language Tab

let oz = document.getElementById('oz');
if (typeof (oz) != 'undefined' && oz != null) {
    oz.classList.add('active');
    oz.classList.add('show');
    $(function () {
        $("a#lang-oz").addClass("active");
    })
}

// Slide to top

$('.back-to-top').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});

// Select2

$(".select2").select2({
    theme: 'bootstrap4'
});

$('body').delegate('.saveBtn', 'click', function (event) {
    const submitButton = $(this);
    if (!submitButton.hasClass('disabled')) {
        let a = submitButton.html();
        submitButton.addClass('disabled');
        submitButton.html("<span class=\"spinner-border spinner-border-sm\" role=\"status\" aria-hidden=\"true\"></span> " + a);

        setTimeout(() => {
            submitButton.removeClass('disabled');
            submitButton.html(a);
        }, 3000);
    } else {
        event.preventDefault();
    }
});

// Tinymce editor

var editor_config = {
    path_absolute: "/"
    ,
    selector: '#content_oz'
    ,
    relative_urls: false
    ,
    plugins: [
        " advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#content_uz'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#content_ru'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#content_en'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#description_oz'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/",
    selector: '#description_uz',
    relative_urls: false,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#description_ru'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#description_en'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#biography_oz'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#biography_uz'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#biography_ru'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
var editor_config = {
    path_absolute: "/"
    ,
    selector: '#biography_en'
    ,
    relative_urls: false
    ,
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak"
        , "searchreplace wordcount visualblocks visualchars code fullscreen"
        , "insertdatetime media nonbreaking save table directionality"
        , "emoticons template paste textpattern"
    ]
    ,
    toolbar: "removeformat insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media"
    ,
    file_picker_callback: function (callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.openUrl({
            url: cmsURL
            , title: 'Filemanager'
            , width: x * 0.8
            , height: y * 1
            , resizable: "yes"
            , close_previous: "no"
            , onMessage: (api, message) => {
                callback(message.content);
            }
        });
    }
};
tinymce.init(editor_config);
