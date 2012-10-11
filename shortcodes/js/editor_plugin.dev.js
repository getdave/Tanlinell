(function(){
	tinymce.create('tinymce.plugins.tanlinellquicktags', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			
			ed.addButton('tanlinell_tabs', {
				title : 'Add Tabs',
				image : url + '/../images/icon-tabs.gif',
				onclick : function() {
					CustomButtonClick('tabs');
				}
			});
			
			ed.addButton('tanlinell_single_tabs', {
				title : 'Add Single Tab',
				image : url + '/../images/icon-tabs-single.png',
				onclick : function() {
					CustomButtonClick('singletab');
				}
			});
			
			
		},
		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : "Themes Shortcodes",
				version : "1.0"
			};
		}
	});
	
	tinymce.PluginManager.add('tanlinell_quicktags', tinymce.plugins.tanlinellquicktags); 
})()