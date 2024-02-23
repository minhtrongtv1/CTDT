<?php

Configure::write('TinyMCE.configs', array(
    'simple' => array(
        'language'=> 'vi_VN',
        "selector" => 'textarea',
        "theme" => 'modern',
        'font_formats'=> 'Roboto=roboto,sans-serif;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
        'plugins: [
"advlist autolink link image lists charmap print preview hr anchor pagebreak",
 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen lineheight"
]' => 'inline',
        "toolbar1" => "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | fontselect |  fontsizeselect",
        "toolbar2" => "| lineheightselect | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fullscreen",
        "image_advtab" => true,
        "relative_urls" => false,
        //"remove_script_host" => true,
        "convert_urls" => true,
        //"external_filemanager_path" => BASE_URL . "/filemanager/",
        //"filemanager_access_key" => "asdsdsgF453",
        //"filemanager_title" => "Quản lý file",
        //'external_plugins' => ['function' => '{"filemanager" : "' . BASE_URL . '/filemanager/plugin.min.js"}']
),
    'advanced' => array(
        'language'=> 'vi_VN',
        "selector" => 'textarea',
        "theme" => 'modern',
        'font_formats'=> 'Roboto=roboto,sans-serif;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
        'plugins: [
"advlist autolink link image lists charmap print preview hr anchor pagebreak",
 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen lineheight"
]' => 'inline',
        "toolbar1" => "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | fontselect |  fontsizeselect",
        "toolbar2" => "| lineheightselect | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fullscreen",
        "image_advtab" => true,
        "relative_urls" => false,
        //"remove_script_host" => true,
        "convert_urls" => true,
        
        
        
        "external_filemanager_path" => BASE_URL . "/filemanager/",
        "filemanager_access_key" => "asdsdsgF453",
        "filemanager_title" => "Quản lý file",
        'external_plugins' => ['function' => '{"filemanager" : "' . BASE_URL . '/filemanager/plugin.min.js"}']
),
    'advanced_no_filemanager' => array(
        'language'=> 'vi_VN',
        "selector" => 'textarea',
        "theme" => 'modern',
        'font_formats'=> 'Roboto=roboto,sans-serif;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
        'plugins: [
"advlist autolink link image lists charmap print preview hr anchor pagebreak",
 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen lineheight"
]' => 'inline',
        "toolbar1" => "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | fontselect |  fontsizeselect",
        "toolbar2" => "| lineheightselect | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fullscreen",
        "image_advtab" => true,
        "relative_urls" => false,
        //"remove_script_host" => true,
        "convert_urls" => true,
        
        
        
        //"external_filemanager_path" => BASE_URL . "/filemanager/",
        //"filemanager_access_key" => "asdsdsgF453",
        //"filemanager_title" => "Quản lý file",
        //'external_plugins' => ['function' => '{"filemanager" : "' . BASE_URL . '/filemanager/plugin.min.js"}']
)
    
    
    ));

