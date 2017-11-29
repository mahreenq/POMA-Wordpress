<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<article class = "width-20 margin-xsm" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content ">
	<div class="artistsImageArchive text-align-center flex flex-direction-column align-content-center justify-content-center goldText" 
	style="background: url('<?php echo $backgroundImg[0]; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
	</div>
	<div class="text-align-center oswald medFont uppercase"><?php the_title(); ?></div>
		<div class="text-align-center smFont"><?php the_content(); ?></div>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<footer>
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>
