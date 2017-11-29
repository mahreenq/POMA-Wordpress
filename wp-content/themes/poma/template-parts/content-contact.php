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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

<div class="eventsHeader flex align-items-center" 
                        style="   background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo $backgroundImg[0] ?>');" >
                        <div class="width-50 padding-lg padding-left-xlg transparentBlackBg">
                                <h1 class="entry-title oswald goldText lgFont"><?php the_title(); ?></h1>
                    
                        </div>
                </div>



	<div class="entry-content padding-right-xlg padding-left-xlg lato400 padding-top-lg smFont blackBackground goldText">
		<?php the_content(); ?>
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
