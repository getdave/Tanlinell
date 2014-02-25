<?php 
/**
 * Form Submission GA Tracking 
 */
function tanlinell_add_form_event_tracking($button, $form) {
		
	global $post;
	
	$dom = new DOMDocument();
    $dom->loadHTML($button);
    $input = $dom->getElementsByTagName('input')->item(0);
    if ($input->hasAttribute('onclick')) {
        $input->setAttribute("onclick","_gaq.push(['_trackEvent', '" . $form['title'] . "', 'Form Submission', '" . esc_attr($post->post_title) .' - '.$post->ID . "', 1.00, false]);".$input->getAttribute("onclick"));
    } else {
        $input->setAttribute("onclick","_gaq.push(['_trackEvent', '" . $form['title'] . "', 'Form Submission', '" . esc_attr($post->post_title) .' - '.$post->ID . "', 1.00, false]);");
    }
    return $dom->saveHtml();
	
}
add_filter("gform_submit_button", "tanlinell_add_form_event_tracking", 10, 2);
?>