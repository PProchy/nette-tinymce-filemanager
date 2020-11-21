# Inicializace
Do JS inicializace je potřeba dát `responsivefilemanager` a další nastavení k tomu. 

```js
//tinymce.init.js

tinymce.init({
    plugins: [
        'responsivefilemanager' /* kamkoliv do seznamu pluginů */
    ],
    
    toolbar: [
        'responsivefilemanager' /* kamkoliv do toolbaru (ikonka s oknem a šipkou nahoru) */
    ],
    
    paste_data_images: true,
    image_advtab: true,
    relative_urls: false,

    external_filemanager_path: '/../tools/filemanager/', //cesta od tinymce.init.js do filemanageru, lze upravit v config.php
    filemanager_title: 'Filemanager', //jenom title
    external_plugins: {'filemanager': '/../tools/filemanager/plugin.min.js'}, //cesta od tinymce.init.js do plugin souboru filemanageru
    filemanager_access_key: 'b18f0453-a3f4-40d5-8d42-2dec8c542693' //tohle je uvedený v config.php
})
```

# Nastavení
Nastavení filemanageru lze upravovat v `filemanager/config/config.php`.

```php
//config.php

$config = [
    'access_keys' => [
        'b18f0453-a3f4-40d5-8d42-2dec8c542693'
    ],

    //nejpodstatnější, když je potřeba změnit cestu k souborům
    'upload_dir' => '/files/filemanager/source/',
    'current_path' => '../../files/filemanager/source/', //relativní
    'thumbs_base_path' => '../../files/filemanager/thumbs/', //relativní
    'thumbs_upload_dir' => '/files/filemanager/thumbs/',

];
```