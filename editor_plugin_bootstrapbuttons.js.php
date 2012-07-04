<?php 
	require_once('../../../wp-load.php');
	require_once('../../../wp-admin/includes/admin.php');
	do_action('admin_init');
 
	if ( ! is_user_logged_in() )
		die('You must be logged in to access this script.');
 
	//if(!isset($sfb_button_2))
	//	$sfb_button_2 = new ShortcodesForBootstrap('bootstrapicons');
 
	$buttons_type = array(
					'primary',
					'info',
					'success',
					'warning',
					'danger',
					'inverse',
				);
?>


(function() {
	//******* Load plugin specific language pack
	//tinymce.PluginManager.requireLangPack('example');
 
	tinymce.create('tinymce.plugins.<?php echo $sfb_button_2->buttonName; ?>', {
		
		init : function(ed, url) {
 
		},

		createControl : function(n, cm) {
			if(n=='<?php echo $sfb_button_2->buttonName; ?>'){
                var mlb = cm.createListBox('<?php echo $sfb_button_2->buttonName; ?>List', {
                     title : 'Buttons',
                     onselect : function(v) { 
                        	tinyMCE.activeEditor.selection.setContent('[button link="#" text="Your text here" size="large" type="' + v + '" icon="" white=""]');
                     }
                });
 
                // Add all icons to the list box
                <?php foreach($buttons_type as $type):?>
                	mlb.add('<?php echo $type;?>', '<?php echo $type;?>');
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
	tinymce.PluginManager.add('<?php echo $sfb_button_2->buttonName; ?>', tinymce.plugins.<?php echo $sfb_button_2->buttonName; ?>);
})();