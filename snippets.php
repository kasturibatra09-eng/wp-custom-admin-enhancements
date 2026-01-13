<?php
// Change posts per page on archive pages
add_action( 'pre_get_posts', function ( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_archive() ) {
        $query->set( 'posts_per_page', 12 );
    }
});
