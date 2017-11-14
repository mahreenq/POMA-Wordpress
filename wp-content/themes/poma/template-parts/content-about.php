<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
        <?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
          <h1 class="text-align-center padding-bottom-lg padding-top-lg"> PROGRAMMING</h1>

                        <div class="allArtistsHomePage flex width-100 justify-content-space-around ">
                                <?php
                                    $args = array( 'post_type' => 'programs', 'posts_per_page' => 4 );
                                    $loop = new WP_Query( $args );
                                    $i=0;
                                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                                            <div class ="width-32">

                                                    <div class="programmingAboutPage" style="width:100%;height:40vh;background:  url('<?php echo $backgroundImg[0]; ?>');background-size:cover;">
                                                                <div class="programmingTitleAboutPage  ">  <?php the_title(); ?> </div>'
                                                                <div class="padding-bottom-lg"> <?php  echo '<a href="'.get_permalink().'"> READ MORE </a>';  ?>   </div>
                                                    </div>

                                                    <div>
                                                        <?php the_title(); ?>
                                                        <?php the_content(); ?>
                                                    </div>
                                             </div>
                                <?php  endwhile; ?>
                        </div>

                        <!-- <div class="padding-bottom-lg">
                        <a href="http://localhost:8888/pieceofminearts/?post_type=programs"> MORE PROGRAMS </a> 
                        </div> -->
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

	</footer>
</article>