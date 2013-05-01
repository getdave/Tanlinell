<?php if ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) {

    $args = array(
        'prev_next' => true,
        'add_fragment' => '',
        'type' => 'list',
        'before' => '<div class="pagination loop-pagination">', // Begin loop_pagination() arguments.
        'after' => '</div>',
        'echo' => true,
    );
    loop_pagination($args); 
}
?>