//basePath lze vypustit
const initTinyMceEditor = (imageUploadHandler) => {
    tinymce.init({
        selector: 'textarea:not(.no-editor)',
        mode: 'specific_textareas',

        plugins: [
            'advlist', 'anchor', 'autolink', 'autoresize', 'autosave', /*'bbcode',*/ 'charmap', 'code', 'codesample',
            /*'colorpicker',*/ 'contextmenu', 'directionality', 'emoticons', 'fullscreen', 'help', 'hr',
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

            editor.on('keydown', function (event) { //tohle je aby nějak fungoval tab na odsazení
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

        images_upload_url: imageUploadHandler,
        images_upload_base_path: '/', //není třeba pokud handler vrací cestu s / na začátku
        relative_urls : false,
        remove_script_host : true,
        convert_urls : true,

        min_height: 480,
        max_height: 516,

        paste_data_images: true,
        image_advtab: true,

        //basePath tady bejt nemusí - jde spíš o ukázku jak případně předat proměnné z latte
        external_filemanager_path: '/../tools/filemanager/',
        filemanager_title: 'Filemanager',
        external_plugins: {'filemanager': '/../tools/filemanager/plugin.min.js'},
        filemanager_access_key: 'b18f0453-a3f4-40d5-8d42-2dec8c542693'
        /*toolbar_drawer: 'floating',*/
    });
}
