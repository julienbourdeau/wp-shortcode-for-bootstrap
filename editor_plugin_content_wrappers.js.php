<?php 
	require_once('../../../wp-load.php');
	require_once('../../../wp-admin/includes/admin.php');
	do_action('admin_init');
 
	if ( ! is_user_logged_in() )
		die('You must be logged in to access this script.');
 
	if(!isset($sfb_button_1))
		$sfb_button_1 = new ShortcodesForBootstrap('content_wrappers');
 
	$icons = $array(
					'glass', 
					'music', 
					'search', 
					'envelope', 
					'heart', 
					'star', 
					'star-empty', 
					'user', 
					'film', 
					'th-large', 
					'th', 
					'th-list', 
					'ok', 
					'remove', 
					'zoom-in', 
					'zoom-out', 
					'off', 
					'signal', 
					'cog', 
					'trash', 
					'home', 
					'file', 
					'time', 
					'road', 
					'download-alt', 
					'download', 
					'upload', 
					'inbox', 
					'play-circle', 
					'repeat', 
					'refresh', 
					'list-alt', 
					'lock', 
					'flag', 
					'headphones', 
					'volume-off', 
					'volume-down', 
					'volume-up', 
					'qrcode', 
					'barcode', 
					'tag', 
					'tags', 
					'book', 
					'bookmark', 
					'print', 
					'camera', 
					'font', 
					'bold', 
					'italic', 
					'text-height', 
					'text-width', 
					'align-left', 
					'align-center', 
					'align-right', 
					'align-justify', 
					'list', 
					'indent-left', 
					'indent-right', 
					'facetime-video', 
					'picture', 
					'pencil', 
					'map-marker', 
					'adjust', 
					'tint', 
					'edit', 
					'share', 
					'check', 
					'move', 
					'step-backward', 
					'fast-backward', 
					'backward', 
					'play', 
					'pause', 
					'stop', 
					'forward', 
					'fast-forward', 
					'step-forward', 
					'eject', 
					'chevron-left', 
					'chevron-right', 
					'plus-sign', 
					'minus-sign', 
					'remove-sign', 
					'ok-sign', 
					'question-sign', 
					'info-sign', 
					'screenshot', 
					'remove-circle', 
					'ok-circle', 
					'ban-circle', 
					'arrow-left', 
					'arrow-right', 
					'arrow-up', 
					'arrow-down', 
					'share-alt', 
					'resize-full', 
					'resize-small', 
					'plus', 
					'minus', 
					'asterisk', 
					'exclamation-sign', 
					'gift', 
					'leaf', 
					'fire', 
					'eye-open', 
					'eye-close', 
					'warning-sign', 
					'plane', 
					'calendar', 
					'random', 
					'comment', 
					'magnet', 
					'chevron-up', 
					'chevron-down', 
					'retweet', 
					'shopping-cart', 
					'folder-close', 
					'folder-open', 
					'resize-vertical', 
					'resize-horizontal', 
					'hdd', 
					'bullhorn', 
					'bell', 
					'certificate', 
					'thumbs-up', 
					'thumbs-down', 
					'hand-right', 
					'hand-left', 
					'hand-up', 
					'hand-down', 
					'circle-arrow-right', 
					'circle-arrow-left', 
					'circle-arrow-up', 
					'circle-arrow-down', 
					'globe', 
					'wrench', 
					'tasks', 
					'filter', 
					'briefcase', 
					'fullscreen'
				);
?>

(function() {
	//******* Load plugin specific language pack
	//tinymce.PluginManager.requireLangPack('example');
 
	tinymce.create('tinymce.plugins.<?php echo $sfb_button_1->buttonName; ?>', {
		
		init : function(ed, url) {
 
		},

		createControl : function(n, cm) {
			if(n=='<?php echo $sfb_button_1->buttonName; ?>'){
                var mlb = cm.createListBox('<?php echo $sfb_button_1->buttonName; ?>List', {
                     title : 'Shortcodes',
                     onselect : function(v) { 
                        	tinyMCE.activeEditor.selection.setContent('[icon icon="' + v + '" white=""]');
                     }
                });
 
                // Add all icons to the list box
                <?php foreach($icons as $icn):?>
                	mlb.add('<?php echo $icn;?>', '<?php echo $icn;?>');
				<?php endforeach;?>
 
                // Return the new listbox instance
                return mlb;
             }
 
             return null;
		},
 
		getInfo : function() {
			return {
				longname : 'Bootstrap Icons Selector',
				author : 'Julien Bourdeau',
				authorurl : 'http://sigerr.org',
				infourl : '',
				version : "0.1"
			};
		}
	});
 
	// Register plugin
	tinymce.PluginManager.add('<?php echo $sfb_button_1->buttonName; ?>', tinymce.plugins.<?php echo $sfb_button_1->buttonName; ?>);
})();