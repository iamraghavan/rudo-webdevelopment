
jQuery(document).ready(function ($) {

    /**
     * Removes all active editors. This is needed so they can be
     * re-initialized after a widget-updated event.
     */
    function custom_widgets_remove_editors() {
        custom_widgets_get_editors().forEach(function (id) {
            wp.editor.remove(id);
        });
    }

    /**
     * Searches the widgets areas for editors.
     *
     * @return array
     */
    function custom_widgets_get_editors() {
        let editors = [];

        // Doesn't look so great, but we need to target like this to support both the regular
        // widgets view and the Customizer. Also, we don't want to include the placeholder
        // widget that is in the DOM on the widgets.php page.
        $(document).find("#customize-theme-controls .custom-widget-wp-editor, #widgets-right .custom-widget-wp-editor, #widgets-editor .custom-widget-wp-editor").each(function () {
            editors.push($(this).attr('id'));
        });

        return editors;
    }

    /**
     *  Initializes all wp.editor instances.
     */
     function custom_widgets_set_editors() {
        custom_widgets_get_editors().forEach(function (id) {
            wp.editor.initialize($('#' + id).attr('id'), {
                tinymce: {
                    wpautop: true,
                    setup: function (editor) {
                        editor.on('dirty', function (e) {
                            editor.save();
                            $('#' + id).change();
                        }); 
                        // fix for missing dirty event when editor content is fully deleted    
                        editor.on('keyup', function (e) {
                            if(editor.getContent() === '') {
                                editor.save();
                                $('#' + id).change();
                            }
                        });
                    }
                },
                quicktags: true,
                mediaButtons: true
            });
        });
    }

    // Trigger removal and setting of editors again after update or added.
    $(document).on('widget-updated widget-added', function () {
        custom_widgets_remove_editors();
        custom_widgets_set_editors();
    });

    // Init.
    custom_widgets_set_editors();
});

jQuery(function (jQuery) {
	jQuery('.rb_custom_upload_image').each(function (i, obj) {
		if (this.value == '') {
			document.getElementById(this.id + '_clear').style.display = 'none';
		}
	});
});

function rovenblog_upload_trigger(target_id, target_name) {
    var frame;

    // If the media frame already exists, reopen it.
    if (frame) {
        frame.open();
        return;
    }

    // Create a new media frame
    frame = wp.media({
        multiple: false  // Set to true to allow multiple files to be selected
    });


    // When an image is selected in the media frame...
    frame.on('select', function () {

        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();

        var formfield2 = document.getElementsByName(target_name)[0];
        formfield2.value = attachment.id;
        formfield2.dispatchEvent(new Event('input', { 'bubbles': true }));

        var preview2 = document.getElementsByName(target_name + '_img')[0];
        preview2.src = attachment.url;
 
        if (document.getElementById(target_id).value != '') {
            document.getElementById(target_id + '_upload_input_clear').style.display = 'inline-block';
        }
    });

    // Finally, open the modal on click
    frame.open();
}


function rovenblog_clear_image_trigger(target_id, image_none) {
    // Removes the uploaded header image from the preview and the input fields
    $rb_input =  document.getElementById(target_id);
    $rb_input.value = '';
    document.getElementById(target_id + '_preview_image').src = image_none;
    document.getElementById(target_id + '_upload_input_clear').style.display = 'none';
    $rb_input.dispatchEvent(new Event('input', { 'bubbles': true }));

    return false;
}