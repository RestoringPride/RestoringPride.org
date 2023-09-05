<?php
/**
 * Handle Trackbacks and Pingbacks Sent to WordPress
 *
 * @since 0.71
 *
 * @package WordPress
 * @subpackage Trackbacks
 */

if ( empty( $wp ) ) {
	require_once __DIR__ . '/wp-load.php';
	wp( array( 'tb' => '1' ) );
}

<<<<<<< HEAD
<<<<<<< HEAD
// Always run as an unauthenticated user.
wp_set_current_user( 0 );

=======
>>>>>>> fb785cbb (Initial commit)
=======
// Always run as an unauthenticated user.
wp_set_current_user( 0 );

>>>>>>> c058c778 (Combining with the latest source from WP)
/**
 * Response to a trackback.
 *
 * Responds with an error or success XML message.
 *
 * @since 0.71
 *
 * @param int|bool $error         Whether there was an error.
 *                                Default '0'. Accepts '0' or '1', true or false.
<<<<<<< HEAD
<<<<<<< HEAD
 * @param string   $error_message Error message if an error occurred. Default empty string.
 */
function trackback_response( $error = 0, $error_message = '' ) {
	header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ) );

=======
 * @param string   $error_message Error message if an error occurred.
 */
function trackback_response( $error = 0, $error_message = '' ) {
	header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ) );
>>>>>>> fb785cbb (Initial commit)
=======
 * @param string   $error_message Error message if an error occurred. Default empty string.
 */
function trackback_response( $error = 0, $error_message = '' ) {
	header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ) );

>>>>>>> c058c778 (Combining with the latest source from WP)
	if ( $error ) {
		echo '<?xml version="1.0" encoding="utf-8"?' . ">\n";
		echo "<response>\n";
		echo "<error>1</error>\n";
		echo "<message>$error_message</message>\n";
		echo '</response>';
		die();
	} else {
		echo '<?xml version="1.0" encoding="utf-8"?' . ">\n";
		echo "<response>\n";
		echo "<error>0</error>\n";
		echo '</response>';
	}
}

<<<<<<< HEAD
<<<<<<< HEAD
if ( ! isset( $_GET['tb_id'] ) || ! $_GET['tb_id'] ) {
	$post_id = explode( '/', $_SERVER['REQUEST_URI'] );
	$post_id = (int) $post_id[ count( $post_id ) - 1 ];
}

$trackback_url = isset( $_POST['url'] ) ? $_POST['url'] : '';
$charset       = isset( $_POST['charset'] ) ? $_POST['charset'] : '';
=======
// Trackback is done by a POST.
$request_array = 'HTTP_POST_VARS';

=======
>>>>>>> c058c778 (Combining with the latest source from WP)
if ( ! isset( $_GET['tb_id'] ) || ! $_GET['tb_id'] ) {
	$post_id = explode( '/', $_SERVER['REQUEST_URI'] );
	$post_id = (int) $post_id[ count( $post_id ) - 1 ];
}

<<<<<<< HEAD
$tb_url  = isset( $_POST['url'] ) ? $_POST['url'] : '';
$charset = isset( $_POST['charset'] ) ? $_POST['charset'] : '';
>>>>>>> fb785cbb (Initial commit)
=======
$trackback_url = isset( $_POST['url'] ) ? $_POST['url'] : '';
$charset       = isset( $_POST['charset'] ) ? $_POST['charset'] : '';
>>>>>>> c058c778 (Combining with the latest source from WP)

// These three are stripslashed here so they can be properly escaped after mb_convert_encoding().
$title     = isset( $_POST['title'] ) ? wp_unslash( $_POST['title'] ) : '';
$excerpt   = isset( $_POST['excerpt'] ) ? wp_unslash( $_POST['excerpt'] ) : '';
$blog_name = isset( $_POST['blog_name'] ) ? wp_unslash( $_POST['blog_name'] ) : '';

if ( $charset ) {
	$charset = str_replace( array( ',', ' ' ), '', strtoupper( trim( $charset ) ) );
} else {
	$charset = 'ASCII, UTF-8, ISO-8859-1, JIS, EUC-JP, SJIS';
}

// No valid uses for UTF-7.
if ( false !== strpos( $charset, 'UTF-7' ) ) {
	die;
}

// For international trackbacks.
if ( function_exists( 'mb_convert_encoding' ) ) {
	$title     = mb_convert_encoding( $title, get_option( 'blog_charset' ), $charset );
	$excerpt   = mb_convert_encoding( $excerpt, get_option( 'blog_charset' ), $charset );
	$blog_name = mb_convert_encoding( $blog_name, get_option( 'blog_charset' ), $charset );
}

<<<<<<< HEAD
<<<<<<< HEAD
// Escape values to use in the trackback.
=======
// Now that mb_convert_encoding() has been given a swing, we need to escape these three.
>>>>>>> fb785cbb (Initial commit)
=======
// Escape values to use in the trackback.
>>>>>>> c058c778 (Combining with the latest source from WP)
$title     = wp_slash( $title );
$excerpt   = wp_slash( $excerpt );
$blog_name = wp_slash( $blog_name );

if ( is_single() || is_page() ) {
<<<<<<< HEAD
<<<<<<< HEAD
	$post_id = $posts[0]->ID;
}

if ( ! isset( $post_id ) || ! (int) $post_id ) {
	trackback_response( 1, __( 'I really need an ID for this to work.' ) );
}

if ( empty( $title ) && empty( $trackback_url ) && empty( $blog_name ) ) {
	// If it doesn't look like a trackback at all.
	wp_redirect( get_permalink( $post_id ) );
	exit;
}

if ( ! empty( $trackback_url ) && ! empty( $title ) ) {
=======
	$tb_id = $posts[0]->ID;
=======
	$post_id = $posts[0]->ID;
>>>>>>> c058c778 (Combining with the latest source from WP)
}

if ( ! isset( $post_id ) || ! (int) $post_id ) {
	trackback_response( 1, __( 'I really need an ID for this to work.' ) );
}

if ( empty( $title ) && empty( $trackback_url ) && empty( $blog_name ) ) {
	// If it doesn't look like a trackback at all.
	wp_redirect( get_permalink( $post_id ) );
	exit;
}

<<<<<<< HEAD
if ( ! empty( $tb_url ) && ! empty( $title ) ) {
>>>>>>> fb785cbb (Initial commit)
=======
if ( ! empty( $trackback_url ) && ! empty( $title ) ) {
>>>>>>> c058c778 (Combining with the latest source from WP)
	/**
	 * Fires before the trackback is added to a post.
	 *
	 * @since 4.7.0
	 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c058c778 (Combining with the latest source from WP)
	 * @param int    $post_id       Post ID related to the trackback.
	 * @param string $trackback_url Trackback URL.
	 * @param string $charset       Character set.
	 * @param string $title         Trackback title.
	 * @param string $excerpt       Trackback excerpt.
	 * @param string $blog_name     Blog name.
<<<<<<< HEAD
	 */
	do_action( 'pre_trackback_post', $post_id, $trackback_url, $charset, $title, $excerpt, $blog_name );

	header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ) );

	if ( ! pings_open( $post_id ) ) {
=======
	 * @param int    $tb_id     Post ID related to the trackback.
	 * @param string $tb_url    Trackback URL.
	 * @param string $charset   Character Set.
	 * @param string $title     Trackback Title.
	 * @param string $excerpt   Trackback Excerpt.
	 * @param string $blog_name Blog Name.
=======
>>>>>>> c058c778 (Combining with the latest source from WP)
	 */
	do_action( 'pre_trackback_post', $post_id, $trackback_url, $charset, $title, $excerpt, $blog_name );

	header( 'Content-Type: text/xml; charset=' . get_option( 'blog_charset' ) );

<<<<<<< HEAD
	if ( ! pings_open( $tb_id ) ) {
>>>>>>> fb785cbb (Initial commit)
=======
	if ( ! pings_open( $post_id ) ) {
>>>>>>> c058c778 (Combining with the latest source from WP)
		trackback_response( 1, __( 'Sorry, trackbacks are closed for this item.' ) );
	}

	$title   = wp_html_excerpt( $title, 250, '&#8230;' );
	$excerpt = wp_html_excerpt( $excerpt, 252, '&#8230;' );

<<<<<<< HEAD
<<<<<<< HEAD
	$comment_post_id      = (int) $post_id;
	$comment_author       = $blog_name;
	$comment_author_email = '';
	$comment_author_url   = $trackback_url;
	$comment_content      = "<strong>$title</strong>\n\n$excerpt";
	$comment_type         = 'trackback';

	$dupe = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_author_url = %s",
			$comment_post_id,
			$comment_author_url
		)
	);

=======
	$comment_post_ID      = (int) $tb_id;
=======
	$comment_post_id      = (int) $post_id;
>>>>>>> c058c778 (Combining with the latest source from WP)
	$comment_author       = $blog_name;
	$comment_author_email = '';
	$comment_author_url   = $trackback_url;
	$comment_content      = "<strong>$title</strong>\n\n$excerpt";
	$comment_type         = 'trackback';

<<<<<<< HEAD
	$dupe = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_author_url = %s", $comment_post_ID, $comment_author_url ) );
>>>>>>> fb785cbb (Initial commit)
=======
	$dupe = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND comment_author_url = %s",
			$comment_post_id,
			$comment_author_url
		)
	);

>>>>>>> c058c778 (Combining with the latest source from WP)
	if ( $dupe ) {
		trackback_response( 1, __( 'There is already a ping from that URL for this post.' ) );
	}

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c058c778 (Combining with the latest source from WP)
	$commentdata = array(
		'comment_post_ID' => $comment_post_id,
	);

	$commentdata += compact(
		'comment_author',
		'comment_author_email',
		'comment_author_url',
		'comment_content',
		'comment_type'
	);
<<<<<<< HEAD
=======
	$commentdata = compact( 'comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type' );
>>>>>>> fb785cbb (Initial commit)
=======
>>>>>>> c058c778 (Combining with the latest source from WP)

	$result = wp_new_comment( $commentdata );

	if ( is_wp_error( $result ) ) {
		trackback_response( 1, $result->get_error_message() );
	}

	$trackback_id = $wpdb->insert_id;

	/**
	 * Fires after a trackback is added to a post.
	 *
	 * @since 1.2.0
	 *
	 * @param int $trackback_id Trackback ID.
	 */
	do_action( 'trackback_post', $trackback_id );
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> fb785cbb (Initial commit)
=======

>>>>>>> c058c778 (Combining with the latest source from WP)
	trackback_response( 0 );
}
