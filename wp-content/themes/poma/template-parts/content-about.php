<?php
/**
 * The default template for displaying page content
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



                <div class="teamHeader aboutHeader flex align-items-center" style="background-size: cover; background-repeat: no-repeat;background-position: center;background: url('<?php echo $backgroundImg[0] ?>');" >
                        <div class="width-50 padding-lg padding-left-xlg transparentBlackBg">
                                <h1 class="entry-title oswald goldText lgFont"><?php the_title(); ?></h1>
                                <h3 class="teamDescription aboutDesc padding-top-med"> <?php the_content(); ?></h3>
                        </div>
                </div>

		
        <?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
          <h1 class="text-align-center padding-bottom-lg padding-top-lg oswald letterSpacingMed blackBackground goldText"> PROGRAMMING</h1>
                    <div class=" width-100 flex justify-content-center padding-bottom-lg bluegreyBackground padding-top-med padding-bottom-med">

                        <div class="allProgramming flex width-80 justify-content-space-around flex-wrap ">
                                <?php
                                    $args = array( 'post_type' => 'programs', 'posts_per_page' => 4 );
                                    $loop = new WP_Query( $args );
                                    $i=0;
                                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                                            <div class ="width-50 flex flex-direction-column align-items-center padding-bottom-lg ">

                                                    <div class="programmingAboutPage" style="width:95%;height:350px;background:  url('<?php echo $backgroundImg[0]; ?>');background-size:cover; ">
                                                                <div class="programmingTitleAboutPage text-align-center ">  <?php the_title(); ?> </div>'
                                                                <div class="padding-bottom-lg"> <?php  echo '<a href="'.get_permalink().'"> READ MORE </a>';  ?>   </div>
                                                    </div>

                                                    <div class="flex flex-direction-column align-items-center">
                                                       <h4 class="text-align-center smFont padding-bottom-sm padding-top-sm oswald medFont"> <?php the_title(); ?> </h4>
                                                       <div class="text-align-center width-80 smFont lato400"> <?php the_content(); ?> </div>
                                                    </div>
                                             </div>
                                <?php  endwhile; ?>
                        </div>
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