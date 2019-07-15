/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */



CKEDITOR.editorConfig = function( config ) {
    config.language = 'fa';
   // config.uiColor = '#AADC6E';
};
config.extraPlugins = 'imgupload';

CKEDITOR.replace('textareaId', {
  "filebrowserImageUploadUrl": "/assets/admin/ckeditor/plugins/imgupload.php"
});
CKEDITOR.config.extraAllowedContent = 'audio[*]{*}';  //to allow audio tag
