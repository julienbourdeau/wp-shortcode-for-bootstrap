<?php 
	require_once('../../../wp-load.php');
	require_once('../../../wp-admin/includes/admin.php');
	do_action('admin_init');
 
	if ( ! is_user_logged_in() )
		die('You must be logged in to access this script.');
 
	//if(!isset($sfb_button_3))
	//	$sfb_button_3 = new ShortcodesForBootstrap('bootstrapicons');
 
	$misc_items = array(
					'Well_box' 		=> '[well_box] Your content here [/well_box]',
					'Alert' 		=> '[alert type="info" closable="1"] Your content here [/alert]',
					'Label' 		=> '[label type="important" text="Attention"]',
					'Badge' 		=> '[badge type="success" text="12"]',
					'Progress Bar' 	=> '[progress val="40" type="success" striped="1" active="1"]',
				);
?>


(function() {
	//******* Load plugin specific language pack
	//tinymce.PluginManager.requireLangPack('example');
 
	tinymce.create('tinymce.plugins.<?php echo $sfb_button_3->buttonName; ?>', {
		
		init : function(ed, url) {
 
		},

		createControl : function(n, cm) {
			if(n=='<?php echo $sfb_button_3->buttonName; ?>'){
                var mlb = cm.createListBox('<?php echo $sfb_button_3->buttonName; ?>List', {
                     title : 'Misc',
                     onselect : function(v) { 
                        	tinyMCE.activeEditor.selection.setContent(v);
                     }
                });
 
                // Add all icons to the list box
                <?php foreach($misc_items as $item => $code):?>
                	mlb.add('<?php echo $item;?>', '<?php echo $code;?>');
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
	tinymce.PluginManager.add('<?php echo $sfb_button_3->buttonName; ?>', tinymce.plugins.<?php echo $sfb_button_3->buttonName; ?>);
})();