const initTinyMceEditor = (basePath = '') => {
    tinymce.init({
        selector: 'textarea:not(.no-editor)',
        mode: 'specific_textareas',

        plugins: [
            'advlist', 'anchor', 'autolink', 'autoresize', 'autosave', /*'bbcode',*/ 'charmap', 'code', 'codesample',
            /*'colorpicker',*/ /*'contextmenu',*/ 'directionality', 'emoticons', 'fullscreen', 'help', 'hr',
            'image', 'imagetools', 'importcss', 'insertdatetime', /*'legacyoutput',*/ 'link', 'lists', 'media',
            'nonbreaking', 'noneditable', 'pagebreak', 'paste', 'preview', 'print', 'quickbars', 'save',
            'searchreplace', 'spellchecker', 'tabfocus', 'table', 'template', /*'textcolor',*/ 'textpattern', 'toc',
            'visualblocks', 'visualchars', 'wordcount', 'responsivefilemanager'
        ],

        toolbar: [
            'undo redo | bold italic underline | fontselect fontsizeselect | responsivefilemanager',
            'forecolor backcolor | alignleft aligncenter alignright alignfull | numlist bullist outdent indent' +
            ' | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter ' +
            'tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol'
        ],

        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            })

            editor.on('keydown', function (event) {
                if (event.keyCode === 9) { // tab pressed
                    if (event.shiftKey) {
                        editor.execCommand('Outdent');
                    } else {
                        editor.execCommand('Indent');
                    }
                    event.preventDefault();
                    return false;
                }
            });
        },

        min_height: 480,
        max_height: 516,

        paste_data_images: true,
        image_advtab: true,
        relative_urls: false,

        external_filemanager_path: basePath + '/../tools/filemanager/',
        filemanager_title: 'Responsive Filemanager',
        external_plugins: {'filemanager': basePath + '/../tools/filemanager/plugin.min.js'},
        filemanager_access_key: '0511b1d3-2ba0-4c00-b4d8-4a832a06c0d7'
        /*toolbar_drawer: 'floating',*/
    });
}
