<?php
/**
 * Archive and taxonomy listing page size.
 *
 * @package ls-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sets the main query on archive and taxonomy listings to nine entries per page.
 *
 * The archive and taxonomy templates show their entries in a three-column card grid through a
 * Query Loop with `inherit` on. An inherited Query Loop ignores its own `perPage` attribute and
 * uses the main query instead, which takes its size from Settings > Reading (10 by default). Ten
 * entries leave a lone card in the fourth row of every full page, so the main query is set to
 * nine here, which is three full rows. The pagination block recalculates the page count from it.
 *
 * Only the listings those templates render are touched: category, tag, author and date archives,
 * and the taxonomies of the `project` post type. The blog page, the search results (also when a
 * search is narrowed by a category, date or author in the URL), the Work archive and WooCommerce
 * listings keep their own sizes.
 *
 * @param WP_Query $query The query being built.
 * @return void
 */
function ls_theme_set_archive_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() || $query->is_search() ) {
		return;
	}

	$project_taxonomies = get_object_taxonomies( 'project' );

	if (
		$query->is_category()
		|| $query->is_tag()
		|| $query->is_author()
		|| $query->is_date()
		|| ( ! empty( $project_taxonomies ) && $query->is_tax( $project_taxonomies ) )
	) {
		$query->set( 'posts_per_page', 9 );
	}
}
add_action( 'pre_get_posts', 'ls_theme_set_archive_posts_per_page' );
