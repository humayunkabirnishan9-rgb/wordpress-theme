/**
 * BlueWireSEO Admin Media Uploader & Proof File Handler
 * Enables smooth 1-click upload and media selection for Search Console screenshots & PDF proofs
 *
 * @package BlueWireSEO
 */

(function ($) {
    'use strict';

    $(document).ready(function () {
        // Handle media upload button click
        $(document).on('click', '.bws-upload-media-btn', function (e) {
            e.preventDefault();

            var $button   = $(this);
            var targetId  = $button.data('target');
            var mediaType = $button.data('media-type') || '';
            var title     = $button.data('title') || 'Select Media';
            var buttonTxt = $button.data('btn-text') || 'Use Selected File';

            var frame = wp.media({
                title: title,
                button: {
                    text: buttonTxt
                },
                multiple: false,
                library: mediaType ? { type: mediaType } : {}
            });

            frame.on('select', function () {
                var attachment = frame.state().get('selection').first().toJSON();
                var $target = $('#' + targetId);
                if ($target.length) {
                    $target.val(attachment.url).trigger('change');
                }

                // Update preview if present
                var previewId = $button.data('preview');
                if (previewId && $('#' + previewId).length) {
                    var $preview = $('#' + previewId);
                    if (attachment.type === 'image') {
                        $preview.html('<div class="bws-media-preview-box"><img src="' + attachment.url + '" style="max-width:280px;height:auto;border-radius:6px;display:block;" /><span style="display:block;font-size:11px;color:#64748B;margin-top:4px;">' + (attachment.filename || '') + '</span></div>').show();
                    } else {
                        $preview.html('<div style="padding:8px 12px;background:#F0F9FF;border:1px solid #BAE6FD;border-radius:6px;display:inline-flex;align-items:center;gap:8px;font-size:12px;color:#0369A1;margin-top:6px;"><strong>PDF:</strong> ' + (attachment.filename || attachment.title || 'Selected Document') + '</div>').show();
                    }
                }
            });

            frame.open();
        });

        // Handle clear / remove media
        $(document).on('click', '.bws-clear-media-btn', function (e) {
            e.preventDefault();
            var targetId = $(this).data('target');
            var previewId = $(this).data('preview');
            if (targetId && $('#' + targetId).length) {
                $('#' + targetId).val('').trigger('change');
            }
            if (previewId && $('#' + previewId).length) {
                $('#' + previewId).empty().hide();
            }
        });
    });
})(jQuery);
