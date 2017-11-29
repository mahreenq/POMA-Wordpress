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


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <header >
    
    <div class="teamHeader flex align-items-center" style="background-size: 100%;background: url('<?php echo $backgroundImg[0] ?>');">
        <div class="width-50 padding-lg padding-left-xlg transparentBlackBg">
                <h1 class="entry-title oswald goldText med-lgFont"><?php the_title(); ?></h1>
                <h3 class="teamDescription "> <?php the_content(); ?></h3>
        </div>
</div>
       
	</header>
	<div class="entry-content blackBackground padding-right-xlg padding-left-xlg">

                            <div class= " teamMembers">

                        <?php 
                            $fields = CFS()->get( 'team_members' );
                    
                             ?>
                
                            <?php  $i=0;
                            foreach($fields as $field) {
                            $group="d-direction-row";
                                if($i % 2 !== 0){$group ="d-direction-row-reverse text-align-right";}  ?>

                                <div class="flex  <?php echo $group ?> ">

                                    <div class= "width-50" style="height:70vh;background:  url('<?php echo $field[picture]; ?>');background-size:cover; background-position:center;">
                                    </div>


                                    <div class= "width-50 padding-med flex flex-direction-column align-self-center">
                                        <span class="goldText padding-top-med lato400"> <?php echo $field[role]; ?></span>
                                        <span class="whiteText oswald medFont padding-top-med"><?php echo $field[name] ?></span>
                                        <span class="whiteText smFont padding-top-med lato400 greyText"><?php echo $field[bio]; ?></span>
                                            <div class= "flex padding-top-med <?php echo $group ?>  ">
                                                <a href="<?php echo $field[instagram_url]; ?>"> <i class="fa fa-instagram greenText padding-right-med " aria-hidden="true"></i>  </a>
                                                <a href="<?php echo $field[twitter_url] ;?>"> <i class="fa fa-twitter greenText padding-right-med" aria-hidden="true"></i> </a>
                                                <a href=" <?php echo$field[facebook_url];?> "> <i class="fa fa-facebook greenText padding-right-med" aria-hidden="true"></i> </a>
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
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>


 



