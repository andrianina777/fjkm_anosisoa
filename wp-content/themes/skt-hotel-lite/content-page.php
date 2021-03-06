<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package SKT Hotel Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); 
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_attr__( 'Pages:', 'skt-hotel-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( esc_attr__( 'Edit', 'skt-hotel-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
