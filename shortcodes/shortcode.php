<?php
function shortcode_scripts() {
	$themename = 'tanlinell';
		
	wp_enqueue_style( 'tanlinell-shortcodes-css', get_template_directory_uri()  . '/shortcodes/css/shortcodes.css', false, '3.0', 'all' );
	//wp_register_script( 'tanlinell-shortcodes-js', get_template_directory_uri()  . '/shortcodes/js/tanlinell_shortcodes_frontend.dev.js', array('jquery'), '3.0', true );
	wp_localize_script( 'tanlinell-shortcodes-js', 'tanlinell_shortcodes_strings', array( 'previous' => __( 'Previous', $themename ), 'next' => __( 'Next', $themename ) ) );
	
	}
add_action( 'wp_enqueue_scripts', 'shortcode_scripts' );

if ( ! function_exists( 'tanlinell_content_helper' ) ){
	function tanlinell_content_helper($content,$paragraph_tag=false,$br_tag=false){
		return tanlinell_delete_htmltags( do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag );
	}
}

if ( ! function_exists( 'tanlinell_delete_htmltags' ) ){
	function tanlinell_delete_htmltags($content,$paragraph_tag=false,$br_tag=false){
		$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);

		$content = preg_replace('#<br \/>#', '', $content);

		if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);

		return trim($content);
	}
}

add_shortcode('tabs', 'tanlinell_tabs');
function tanlinell_tabs($atts, $content = null) {
	extract(shortcode_atts(array(
			"fx" => 'fade',
			"auto" => 'no',
			"autospeed" => '5000',
			"id" => '',
			"slidertype" => 'top tabs',
			"class" => ''
	), $atts)); 

	wp_enqueue_script( 'tanlinell-shortcodes-js' );
	
	$auto = ( $auto == 'no' ) ? 'false' : 'true';

	$content = tanlinell_content_helper($content);
	//return $content;
	$id = $id <> '' ? " id='{$id}'" : '';
	$class = ($class <> '') ? " {$class}" : '';

	$class .= " tanlinell_sliderfx_{$fx}" . " tanlinell_sliderauto_{$auto}" . " tanlinell_sliderauto_speed_{$autospeed}";

	if ($slidertype == 'top tabs') {
		$class .= ' tanlinell_slidertype_top_tabs';
		$output = "
		<div class='" . esc_attr( "tanlinell-tabs-container{$class}" ) ."'{$id}>
		{$content}
		</div> <!-- .tanlinell-tabs-container -->";
	} elseif ($slidertype == 'left tabs') {
	$class .= ' tanlinell_slidertype_left_tabs clearfix';
	$output = "
	<div class='" . esc_attr( "tabs-left{$class}" ) . "'{$id}>
	<div class='tanlinell_left_tabs_bg'></div>
	{$content}
	</div> <!-- .tabs-left -->";
	} elseif ($slidertype == 'simple') {
	$class .= ' tanlinell_slidertype_simple';
	$output = "
	<div class='" . esc_attr( "tanlinell-simple-slider{$class}" ) . "'{$id}>
	<div class='tanlinell-simple-slides'>
	<div class='tanlinell-tabs-content-wrapper'>
	{$content}
	</div>
	</div>
	</div> <!-- .tanlinell-simple-slider -->
	";
	} elseif ($slidertype == 'images') {
	$class .= ' tanlinell_slidertype_images';
	$output = "
	<div class='" . esc_attr( "tanlinell-image-slider{$class}" ) . "'{$id}>
	<div class='tanlinell-image-slides'>
	<div class='tanlinell-tabs-content-wrapper'>
	{$content}
	</div>
	</div>
	</div> <!-- .tanlinell-image-slider -->
	";
	}

	return $output;
	} 
	
	
	add_shortcode('tabcontainer', 'tanlinell_tabcontainer');
	function tanlinell_tabcontainer($atts, $content = null) {
		$content = tanlinell_content_helper($content);
	
		$output = "
		<div class='featured_tabs'><ul class='tanlinell-tabs-control'>
		{$content}
		</ul></div> <!-- .tanlinell-tabs-control -->";
	
		return $output;
		}
	
		add_shortcode('tabtext', 'tanlinell_tabtext');
		function tanlinell_tabtext($atts, $content = null) {
			extract(shortcode_atts(array(
					"id" => '',
					"class" => ''
			), $atts));
		
			$content = tanlinell_content_helper($content);
		
			$id = ($id <> '') ? " id='" . esc_attr( $id ) . "'" : '';
			$class = ($class <> '') ? esc_attr( ' ' . $class ) : '';
				
			$output = "
			<li{$id}{$class}><a href='#tab". esc_attr( $id ) ."'>
			{$content}
			</a></li>";
		
			return $output;
			}
		
			add_shortcode('tabcontent', 'tanlinell_tabcontent');
			function tanlinell_tabcontent($atts, $content = null) {
				extract(shortcode_atts(array(
						"id" => '',
						"class" => ''
				), $atts));
			
				$content = tanlinell_content_helper($content);
			
				$id = ($id <> '') ? " id='" . esc_attr( $id ) . "'" : '';
				$class = ($class <> '') ? esc_attr( ' ' . $class ) : '';
			
				/*$output = "
				<div{$id} class='tanlinell-tabs-content{$class}'>
				<div class='tanlinell-tabs-content-wrapper'>
				{$content}
				</div>
				</div>";*/
				
					$output = "
				<div{$id} class='box-tabbed-content clearfix tabs-body{$class}' id='featured-content'>
				{$content}
				</div>";
			
				return $output;
			}
			
			add_shortcode('tab', 'tanlinell_tab');
			function tanlinell_tab($atts, $content = null) {
				extract(shortcode_atts(array(
						"id" => '',
						"class" => ''
				), $atts));
			
				$content = tanlinell_content_helper($content);
			
				$id = ($id <> '') ? " id='" . esc_attr( $id ) . "'" : '';
				$class = ($class <> '') ? esc_attr( ' ' . $class ) : '';
			
				$output = "
				<div{$id} id='tab". esc_attr( $id ) ."'{$id}>
				{$content}
				</div>";
			
				return $output;
				}

				
// Single tab content
				
				add_shortcode('singletab', 'tanlinell_single_tabs');
				function tanlinell_single_tabs($atts, $content = null) {
					extract(shortcode_atts(array(
							"fx" => 'fade',
							"auto" => 'no',
							"autospeed" => '5000',
							"id" => '',
							"slidertype" => 'top tabs',
							"class" => ''
					), $atts));
				
					wp_enqueue_script( 'tanlinell-shortcodes-js' );
				
					$auto = ( $auto == 'no' ) ? 'false' : 'true';
				
					$content = tanlinell_content_helper($content);
					//return $content;
					$id = $id <> '' ? " id='{$id}'" : '';
					$class = ($class <> '') ? " {$class}" : '';
				
					$class .= " tanlinell_sliderfx_{$fx}" . " tanlinell_sliderauto_{$auto}" . " tanlinell_sliderauto_speed_{$autospeed}";
				
					if ($slidertype == 'top tabs') {
						$class .= ' tanlinell_slidertype_top_tabs';
						$output = "
						<div class='" . esc_attr( "tanlinell-tabs-container{$class}" ) ."'{$id}>
						{$content}
						</div> <!-- .tanlinell-tabs-container -->";
					} elseif ($slidertype == 'left tabs') {
						$class .= ' tanlinell_slidertype_left_tabs clearfix';
						$output = "
						<div class='" . esc_attr( "tabs-left{$class}" ) . "'{$id}>
						<div class='tanlinell_left_tabs_bg'></div>
						{$content}
						</div> <!-- .tabs-left -->";
				} elseif ($slidertype == 'simple') {
					$class .= ' tanlinell_slidertype_simple';
					$output = "
					<div class='" . esc_attr( "tanlinell-simple-slider{$class}" ) . "'{$id}>
					<div class='tanlinell-simple-slides'>
					<div class='tanlinell-tabs-content-wrapper'>
					{$content}
					</div>
					</div>
					</div> <!-- .tanlinell-simple-slider -->
					";
				} elseif ($slidertype == 'images') {
					$class .= ' tanlinell_slidertype_images';
					$output = "
					<div class='" . esc_attr( "tanlinell-image-slider{$class}" ) . "'{$id}>
					<div class='tanlinell-image-slides'>
					<div class='tanlinell-tabs-content-wrapper'>
					{$content}
					</div>
					</div>
					</div> <!-- .tanlinell-image-slider -->
					";
				}
				
				return $output;
				}
				
				add_shortcode('single_tabcontainer', 'tanlinell_single_tabcontainer');
				function tanlinell_single_tabcontainer($atts, $content = null) {
					$content = tanlinell_content_helper($content);
				
					$output = "
					<div class='featured_single_tabs'><ul class='tanlinell-single-tabs-control'>
					{$content}
					</ul></div> <!-- .tanlinell-tabs-control -->";
				
					return $output;
					}
					
					add_shortcode('single_tabtext', 'tanlinell_single_tabtext');
					function tanlinell_single_tabtext($atts, $content = null) {
						extract(shortcode_atts(array(
								"id" => '',
								"class" => '',
								"tablink" => ''
						), $atts));
					
						$content = tanlinell_content_helper($content);
					
						$id = ($id <> '') ? " id='" . esc_attr( $id ) . "'" : '';
						$class = ($class <> '') ? esc_attr( ' ' . $class ) : '';
					
						$output = "
						<li{$id} class='tabs-selected'><a href='". esc_attr( $tablink ) ."'>
						{$content}
						</a></li>";
					
						return $output;
					}
					add_shortcode('single_tabcontent', 'tanlinell_single_tabcontent');
					function tanlinell_single_tabcontent($atts, $content = null) {
						extract(shortcode_atts(array(
								"id" => '',
								"class" => ''
						), $atts));
							
						$content = tanlinell_content_helper($content);
							
						$id = ($id <> '') ? " id='" . esc_attr( $id ) . "'" : '';
						$class = ($class <> '') ? esc_attr( ' ' . $class ) : '';
							
											
						$output = "
						<div{$id} class='box-tabbed-content clearfix tabs-body{$class}' id='featured-content'>
						{$content}
						</div>";
							
						return $output;
					}
	add_action('admin_init', 'tanlinell_init_shortcodes');
	function tanlinell_init_shortcodes(){
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			if ( in_array(basename($_SERVER['PHP_SELF']), array('post-new.php', 'page-new.php', 'post.php', 'page.php') ) ) {
				add_filter('mce_buttons', 'tanlinell_filter_mce_button');
				add_filter('mce_external_plugins', 'tanlinell_filter_mce_plugin');
				//add_action('admin_head','tanlinell_add_simple_buttons');
				add_action('edit_form_advanced', 'tanlinell_advanced_buttons');
				add_action('edit_page_form', 'tanlinell_advanced_buttons');
			}
		}
	}
	
	function tanlinell_filter_mce_button($buttons) {
		array_push( $buttons, '|', 'tanlinell_tabs' );
		array_push( $buttons, '|', 'tanlinell_single_tabs' );
		return $buttons;
	}
	
	function tanlinell_filter_mce_plugin($plugins) {
		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '.dev' : '';
	
		$plugins['tanlinell_quicktags'] = get_template_directory_uri(). "/shortcodes/js/editor_plugin.dev.js";
	
		return $plugins;
	}
	
	function tanlinell_advanced_buttons(){
		$themename = 'imex'; ?>
		<script type="text/javascript">
			var defaultSettings = {},
				outputOptions = '',
				selected ='',
				content = '';
			
			
			
			
			defaultSettings['tabs'] = {
				tabtext: {
					name: '<?php esc_html_e( 'Tab Text', $themename ); ?>',
					defaultvalue: '',
					description: '',
					type: 'text',
					clone: 'cloned'
				},
				tabcontent: {
					name: '<?php esc_html_e( 'Tab Content', $themename ); ?>',
					defaultvalue: '<?php esc_html_e( 'Content goes here', $themename ); ?>',
					description: '<?php esc_html_e( 'Paste image url here, if you chose "images" slider type', $themename ); ?>',
					type: 'textarea',
					clone: 'cloned'
				}
			}

			defaultSettings['singletab'] = {
					single_tabtext: {
						name: '<?php esc_html_e( 'Tab Text', $themename ); ?>',
						defaultvalue: '',
						description: '',
						type: 'text',
						clone: 'cloned'
					},
					single_tablink: {
						name: '<?php esc_html_e( 'Tab Link', $themename ); ?>',
						defaultvalue: '',
						description: '',
						type: 'text',
						clone: 'cloned'
					},
					single_tabcontent: {
						name: '<?php esc_html_e( 'Tab Content', $themename ); ?>',
						defaultvalue: '<?php esc_html_e( 'Content goes here', $themename ); ?>',
						description: '<?php esc_html_e( 'Paste image url here, if you chose "images" slider type', $themename ); ?>',
						type: 'textarea',
						clone: 'cloned'
					}
				}
			
			
			
			function CustomButtonClick(tag){
				
				var index = tag;
				
					for (var index2 in defaultSettings[index]) {
						if (defaultSettings[index][index2]['clone'] === 'cloned')
							outputOptions += '<tr class="cloned">\n';
						else if (index === 'button' && index2 === 'icon')
							outputOptions += '<tr class="hidden">\n';
						else
							outputOptions += '<tr>\n';
						outputOptions += '<th><label for="tanlinell-' + index2 + '">'+ defaultSettings[index][index2]['name'] +'</label></th>\n';
						outputOptions += '<td>';
						
						if (defaultSettings[index][index2]['type'] === 'select') {
							var optionsArray = defaultSettings[index][index2]['options'].split('|');
							
							outputOptions += '\n<select name="tanlinell-'+index2+'" id="tanlinell-'+index2+'">\n';
							
							for (var index3 in optionsArray) {
								selected = (optionsArray[index3] === defaultSettings[index][index2]['defaultvalue']) ? ' selected="selected"' : '';
								outputOptions += '<option value="'+optionsArray[index3]+'"'+ selected +'>'+optionsArray[index3]+'</option>\n';
							}
							
							outputOptions += '</select>\n';
						}
						
						if (defaultSettings[index][index2]['type'] === 'text') {
							cloned = '';
							if (defaultSettings[index][index2]['clone'] === 'cloned') cloned = "[]";
							outputOptions += '\n<input type="text" name="tanlinell-'+index2+cloned+'" id="tanlinell-'+index2+'" value="'+defaultSettings[index][index2]['defaultvalue']+'" />\n';
						}
						
						if (defaultSettings[index][index2]['type'] === 'textarea') {
							cloned = '';
							if (defaultSettings[index][index2]['clone'] === 'cloned') cloned = "[]";
							outputOptions += '<textarea name="tanlinell-'+index2+cloned+'" id="tanlinell-'+index2+'" cols="40" rows="10">'+defaultSettings[index][index2]['defaultvalue']+'</textarea>';
						}
						
						outputOptions += '\n<br/><small>'+ defaultSettings[index][index2]['description'] +'</small>';
						outputOptions += '\n</td>';
						
					}
				
			
				var width = jQuery(window).width(),
					tbHeight = jQuery(window).height(),
					tbWidth = ( 720 < width ) ? 720 : width;
				
				tbWidth = tbWidth - 80;
				tbHeight = tbHeight - 84;
	
				var tbOptions = "<div id='tanlinell_shortcodes_div'><form id='tanlinell_shortcodes'><table id='shortcodes_table' class='form-table tanlinell-"+ tag +"'>";
				tbOptions += outputOptions;
				tbOptions += '</table>\n<p class="submit">\n<input type="button" id="shortcodes-submit" class="button-primary" value="Ok" name="submit" /></p>\n</form></div>';
				
				var form = jQuery(tbOptions);
				
				var table = form.find('table');
				form.appendTo('body').hide();
				
				
				if (tag === 'tabs') {
					$moreTabs = jQuery('<p><a href="#" id="tanlinell_add_more_tabs"><?php esc_html_e( '+ Add One More Tab', $themename ); ?></a></p>').appendTo('form#tanlinell_shortcodes tbody');
					$moreTabsLink = jQuery('a#tanlinell_add_more_tabs');
					
					$moreTabsLink.bind('click',function() {
						var clonedElements = jQuery('form#tanlinell_shortcodes .cloned');
											
						newElements = clonedElements.slice(0,2).clone();
									
						var cloneNumber = clonedElements.length,
							labelNum = cloneNumber / 2;
						
						newElements.each(function(index){
							if ( index === 0 ) jQuery(this).css({'border-top':'1px solid #eeeeee'});
							
							var label = jQuery(this).find('label').attr('for'),
								newLabel = label + labelNum;
						
							jQuery(this).find('label').attr('for',newLabel);
							jQuery(this).find('input, textarea').attr('id',newLabel);
						});
						
						newElements.appendTo('form#tanlinell_shortcodes tbody');
						$moreTabs.appendTo('form#tanlinell_shortcodes tbody');
						return false;
					});		
				}


				// Single tab
				
				if (tag === 'singletab') {
					//$moreTabs = jQuery('<p><a href="#" id="tanlinell_add_more_tabs"><?php esc_html_e( '+ Add One More Tab', $themename ); ?></a></p>').appendTo('form#tanlinell_shortcodes tbody');
					$moreTabsLink = jQuery('a#tanlinell_add_more_tabs');
					
					$moreTabsLink.bind('click',function() {
						var clonedElements = jQuery('form#tanlinell_shortcodes .cloned');
											
						newElements = clonedElements.slice(0,2).clone();
									
						var cloneNumber = clonedElements.length,
							labelNum = cloneNumber / 2;
						
						newElements.each(function(index){
							if ( index === 0 ) jQuery(this).css({'border-top':'1px solid #eeeeee'});
							
							var label = jQuery(this).find('label').attr('for'),
								newLabel = label + labelNum;
						
							jQuery(this).find('label').attr('for',newLabel);
							jQuery(this).find('input, textarea').attr('id',newLabel);
						});
						
						newElements.appendTo('form#tanlinell_shortcodes tbody');
						$moreTabs.appendTo('form#tanlinell_shortcodes tbody');
						return false;
					});		
				}
				
				
				form.find('#shortcodes-submit').click(function(){
								
					var shortcode = '['+tag;
									
					for( var index in defaultSettings[tag]) {
						var value = table.find('#tanlinell-' + index).val();
						if (index === 'content') { 
							content = value;
							continue;
						}
						
						if (defaultSettings[tag][index]['clone'] !== undefined) {
							content = 'cloned';
							continue;
						} 
						
						if ( value !== defaultSettings[tag][index]['defaultvalue'] )
							shortcode += ' ' + index + '="' + value + '"';
							
					}
					
					var $tanlinell_slidertype = jQuery('#tanlinell-slidertype').val();
					
					shortcode += '] ' + "\n";
					
					if (content != '') {
						
						if (tag === 'tabs') {
						
						
							var $tanlinell_form = jQuery('form#tanlinell_shortcodes'),
								tabsOutput = '',
								$tanlinell_slidertype = jQuery('#tanlinell-slidertype').val();
							
							if ($tanlinell_slidertype === 'images') {
								prefix = 'image';
								dimensions = ' width="' + jQuery('#tanlinell-imagewidth').val() + '"'+' height="' + jQuery('#tanlinell-imageheight').val() + '"';
							} else {
								prefix = '';
								dimensions = '';
							}
							
							tabsOutput += '['+prefix+'tabcontainer]\n';
							$tanlinell_form.find("input[name='tanlinell-tabtext[]']").each(function(){
								tabsOutput += '['+prefix+'tabtext]'+jQuery(this).val()+'[/'+prefix+'tabtext]\n';
							});
							tabsOutput += '[/'+prefix+'tabcontainer]\n';						
							
							if ($tanlinell_slidertype === 'simple' || $tanlinell_slidertype === 'images') tabsOutput = '';
							
							if ($tanlinell_slidertype != 'simple' && $tanlinell_slidertype != 'images') tabsOutput += '[tabcontent]\n';
							$tanlinell_form.find("textarea[name='tanlinell-tabcontent[]']").each(function(){
								tabsOutput += '['+prefix+'tab'+dimensions+']'+jQuery(this).val()+'[/'+prefix+'tab]'+"\n";
							});
							
							if ($tanlinell_slidertype != 'simple' && $tanlinell_slidertype != 'images') tabsOutput += '[/tabcontent]\n';
							
							content = tabsOutput;
						}

						if (tag === 'singletab') {
							
							
							var $tanlinell_form = jQuery('form#tanlinell_shortcodes'),
								tabsOutput = '',
								$tanlinell_slidertype = jQuery('#tanlinell-slidertype').val();
							
							if ($tanlinell_slidertype === 'images') {
								prefix = 'image';
								dimensions = ' width="' + jQuery('#tanlinell-imagewidth').val() + '"'+' height="' + jQuery('#tanlinell-imageheight').val() + '"';
							} else {
								prefix = '';
								dimensions = '';
							}
							
							tabsOutput += '['+prefix+'single_tabcontainer]\n';
							$tanlinell_form.find("input[name='tanlinell-single_tabtext[]']").each(function(){
								tablink = $tanlinell_form.find("input[name='tanlinell-single_tablink[]']").val();
								tabsOutput += '['+prefix+'single_tabtext tablink="'+tablink+'"]'+jQuery(this).val()+'[/'+prefix+'single_tabtext]\n';
							});

							/*$tanlinell_form.find("input[name='tanlinell-single_tablink[]']").each(function(){
								tabsOutput += '['+prefix+'single_tablink]'+jQuery(this).val()+'[/'+prefix+'single_tablink]\n';
							});*/
							tabsOutput += '[/'+prefix+'single_tabcontainer]\n';						
							
							if ($tanlinell_slidertype === 'simple' || $tanlinell_slidertype === 'images') tabsOutput = '';
							
							if ($tanlinell_slidertype != 'simple' && $tanlinell_slidertype != 'images') tabsOutput += '[single_tabcontent]\n';
							$tanlinell_form.find("textarea[name='tanlinell-single_tabcontent[]']").each(function(){
								tabsOutput += '['+prefix+'tab'+dimensions+']'+jQuery(this).val()+'[/'+prefix+'tab]'+"\n";
							});
							
							if ($tanlinell_slidertype != 'simple' && $tanlinell_slidertype != 'images') tabsOutput += '[/single_tabcontent]\n';
							
							content = tabsOutput;
						}
						
						if (tag === 'author') {
							var $tanlinell_form = jQuery('form#tanlinell_shortcodes');
							
							imageurl = $tanlinell_form.find('#tanlinell-imageurl').val();
							timthumb = $tanlinell_form.find('#tanlinell-timthumb').val();
							content = $tanlinell_form.find('#tanlinell-content').val();
							
							shortcode = "[author]\n[author_image timthumb='"+timthumb+"']"+imageurl+"[/author_image]\n[author_info]"+content+"[/author_info]\n";
							content = '';
						}
					
						shortcode += content;
						shortcode += '[/'+tag+'] ' + "\n";
					}
	
					tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode + ' ');
					
					tb_remove();
				});
				
				tb_show( 'ET ' + tag + ' Shortcode', '#TB_inline?width=' + tbWidth + '&height=' + tbHeight + '&inlineId=tanlinell_shortcodes_div' );
				jQuery('#tanlinell_shortcodes_div').remove();
				outputOptions = '';
			}
			
			jQuery(document).ready(function(){
				var buttonTypeField = jQuery('table.tanlinell-button select#tanlinell-type');
							
				buttonTypeField.live('change',function() {
					var optionsSmallButton = ['blue','lightblue','teal','silver','black','pink','purple','orange','green','red'],
						optionsBigButton = ['blue','purple','orange','green','red','teal'],
						options = '';
					
					if (jQuery(this).val() === 'big') {
						for (var i = 0; i < optionsBigButton.length; i++) {
							options += '<option value="' + optionsBigButton[i] + '">' + optionsBigButton[i] + '</option>';
						}
						
						if (!jQuery('select#tanlinell-icon').parents('tr.hidden').length) jQuery('select#tanlinell-icon').parents('tr').addClass('hidden');
						if (jQuery('select#tanlinell-color').parents('tr.hidden').length) jQuery('select#tanlinell-color').parents('tr').removeClass('hidden');
					}
					
					if (jQuery(this).val() === 'small') {
						for (var i = 0; i < optionsSmallButton.length; i++) {
							options += '<option value="' + optionsSmallButton[i] + '">' + optionsSmallButton[i] + '</option>';
						}
						if (!jQuery('select#tanlinell-icon').parents('tr.hidden').length) jQuery('select#tanlinell-icon').parents('tr').addClass('hidden');
						if (jQuery('select#tanlinell-color').parents('tr.hidden').length) jQuery('select#tanlinell-color').parents('tr').removeClass('hidden');
					}
					
					if (jQuery(this).val() === 'icon') {
						if (jQuery('select#tanlinell-icon').parents('tr.hidden').length) jQuery('select#tanlinell-icon').parents('tr').removeClass('hidden');
						
						if (!jQuery('select#tanlinell-color').parents('tr.hidden').length) jQuery('select#tanlinell-color').parents('tr').addClass('hidden');
					}
					
					if (options !== '') jQuery(this).parents('tbody').find('select#tanlinell-color').html(options);
				});
				
				var tabTypeField = jQuery('table.tanlinell-tabs select#tanlinell-slidertype');
				tabTypeField.live('change',function() {
					if (jQuery(this).val() === 'images') {
						if (!jQuery('.tanlinell-tabs #tanlinell-imagewidth').length) { 
							$heightImage = jQuery('<tr><th><label for="tanlinell-imageheight"><?php esc_html_e( 'Image Height', $themename ); ?></label></th><td><input type="text" value="" id="tanlinell-imageheight" name="tanlinell-imageheight"><br><small></small></td></tr>').prependTo('form#tanlinell_shortcodes tbody');
							$widthImage = jQuery('<tr><th><label for="tanlinell-imagewidth"><?php esc_html_e( 'Image Width', $themename ); ?></label></th><td><input type="text" value="" id="tanlinell-imagewidth" name="tanlinell-imagewidth"><br><small></small></td></tr>').prependTo('form#tanlinell_shortcodes tbody');
						}
						
						if (typeof $heightImage != 'undefined') $heightImage.show();
						if (typeof $widthImage != 'undefined') $widthImage.show();
						
						jQuery('input[name^="tanlinell-tabtext"]').parents('tr.cloned').hide(); //hide tab text
					} else {
						if (typeof $heightImage != 'undefined') $heightImage.hide();
						if (typeof $widthImage != 'undefined') $widthImage.hide();
						
						if(jQuery(this).val() != 'simple') jQuery('input[name^="tanlinell-tabtext"]').parents('tr.cloned:hidden').show(); //show tab text
						else jQuery('input[name^="tanlinell-tabtext"]').parents('tr.cloned').hide();
					}
				});
			});
		</script>
	<?php }