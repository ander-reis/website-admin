/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here.
    // For complete reference see:
    // http://docs.ckeditor.com/#!/api/CKEDITOR.config

    // The toolbar groups arrangement, optimized for two toolbar rows.
    config.toolbarGroups = [
        { name: 'document', groups: [ 'document', 'doctools' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'forms' },

        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links' },
        { name: 'insert' },
        '/',
        { name: 'styles', },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' },
        { name: 'about', groups: [ 'about', 'mode'] }
    ];

    // Remove some buttons provided by the standard plugins, which are
    // not needed in the Standard(s) toolbar.
    //config.removeButtons = 'Underline,Subscript,Superscript';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;link:advanced';

    // configura tag permitida
    config.allowedContent = true;

    // configura skin
    config.skin = 'moono-dark';

	// habilitar plugins
    config.extraPlugins = 'font,colorbutton,justify,div,showblocks,dialogui,dialog,templates,youtube';

    //desabilitar copia com formatacao do word
    config.forcePasteAsPlainText = true;
    config.pasteFromWordRemoveStyles = true;
    config.pasteFromWordRemoveFontStyles = true;
};
