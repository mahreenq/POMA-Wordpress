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



                <div class="eventsHeader flex align-items-center" 
                        style="   background: url('<?php echo $backgroundImg[0] ?>');" >
                        <div class="width-50 padding-lg padding-left-xlg transparentBlackBg">
                                <h1 class="entry-title oswald goldText lgFont"><?php the_title(); ?></h1>
                                <h3 class="teamDescription aboutDesc padding-top-med"> <?php the_content(); ?></h3>
                        </div>
                </div>

		
                <div class="entry-content blackBackground padding-right-xlg padding-left-xlg">

                            <div class= " teamMembers">

                        <?php 
                            $fields = CFS()->get( 'events' );
                    
                             ?>
                
                            <?php  $i=0;
                            foreach($fields as $field) {
                            $group="d-direction-row";
                                if($i % 2 !== 0){$group ="d-direction-row-reverse text-align-right";}  ?>

                                <div class="flex padding-sm <?php echo $group ?> ">

                                    <div class= "width-50" style="height:500px;background:  url('<?php echo $field[picture]; ?>');background-size:cover; background-position:center;">
                                    </div>


                                    <div class= "width-50 padding-med flex flex-direction-column align-self-center">
                                        <span class="goldText padding-top-sm oswald medFont letterSpacingMed"> <?php echo $field[title]; ?></span>
                                        <span class="whiteText smFont padding-top-med lato400"><?php echo $field[description] ?></span>
                                        <span class=" smFont padding-top-med lato400 greyText"><?php echo date( 'F j, Y', strtotime( CFS()->get('my_date') ) ); ?></span>
                                        <span class="smFont padding-top-sm lato400 greyText"><?php echo $field[time]; ?></span>
                                        <span class="goldText smFont padding-top-med lato400 "><?php echo $field[venue]; ?></span>
                                        <span class="whiteText smFont padding-top-sm lato400 "><?php echo $field[address]; ?></span>
                                            <div class= "flex padding-top-med <?php echo $group ?>  ">
                                                <a href="<?php echo $field[external_link]; ?>"> MORE DETAILS </a>
                                   
                                            </div>
                                    </div>
                                </div>
                                
                        <?php  $i+=1; } ?>
                    </div>
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

	</footer>
</article>