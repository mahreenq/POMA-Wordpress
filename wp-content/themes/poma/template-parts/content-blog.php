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

	
	<?php echo '<a   href="'.get_permalink().'">' ; ?>
<article class="singleJournal  margin-top-med" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogImageArchive text-align-center flex flex-direction-column align-content-center justify-content-center goldText" style="background: url('<?php echo $backgroundImg[0]; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
	</div>

		
		
	<header >

	<?php if ( is_single() ) { ?>

		<?php 		
		the_title( '<h1 class="entry-title oswald">', '</h1>' );
		} else {
		
		the_title( '<h2 class="entry-title oswald"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
	?>
	<div class = "metaBlog">
		<?php foundationpress_entry_meta(); ?>
	</div>
	</header>

	<div class="entry-content blogExcerpt greyText lato400">
		<?php the_excerpt(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		<?php echo '<div class=" goldText"><a   href="'.get_permalink().'"> READ ENTRY </a> </div> '; ?>
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
<?php echo '</a>'; ?>
