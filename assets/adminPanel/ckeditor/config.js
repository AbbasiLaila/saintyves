/**

 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.

 * For licensing, see LICENSE.md or http://ckeditor.com/license

 */



CKEDITOR.editorConfig = function( config ) {

	// Define changes to default configuration here. For example:

	// config.language = 'fr';

	// config.uiColor = '#AADC6E';

	   config.extraPlugins = 'youtube,imagebrowser';

		config.removeDialogTabs = 'image:advanced;link:advanced';

        config.removeButtons = 'Underline,Subscript,Superscript';

		config.allowedContent = true;
		
		config.filebrowserImageUploadUrl= "http://localhost/saintyves/admin/upload_image2";
		
   		config.imageBrowser_listUrl= "http://localhost/saintyves/admin/brows";
		
   		config.filebrowserUploadUrl= "http://localhost/saintyves/admin/uploadfile";

		

	config.toolbar = [

	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },

	//{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },

	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },

	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Iframe','Youtube' ] },

	

	'/',

    { name: 'paragraph',   items : ['NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },

	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },

	{ name: 'styles', items: [ 'Styles', 'Format' ] },

	{ name: 'tools', items: [ 'Maximize' ] },	

    { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }	



];

	

	config.toolbarGroups = [

		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },

		{ name: 'editing',     groups: [ 'find', 'selection' ] },

		{ name: 'links' },

		{ name: 'insert',groups:['image','table','HorizantalRole','Youtube'] },

		{ name: 'forms' },

		{ name: 'tools' },

		{ name: 'document',	   groups: ['document', 'doctools' ] },

		'/',

		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup','Bold','Italic' ] },

		{ name: 'paragraph',   groups: [ 'list',  'blocks', 'align', 'bidi' ] },

		{ name: 'styles' },

		{ name: 'colors' },

		

	]; 



};

