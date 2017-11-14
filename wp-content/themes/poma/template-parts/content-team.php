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
    
    <div class="teamHeader" style="background-size: 100%;background: url('<?php echo $backgroundImg[0] ?>');">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p class="teamDescription"> <?php the_content(); ?></p>
</div>
       
	</header>
	<div class="entry-content">

                            <div class= " teamMembers">

                        <?php 
                            $fields = CFS()->get( 'team_members' ); ?>
                    


                            <?php  $i=0;
                            foreach($fields[$i] as $field) {
                            $group="d-direction-row";
                                if($i % 2 !== 0){$group ="d-direction-row-reverse text-align-right";}  ?>

                                <div class="flex  <?php echo $group ?> ">

                                    <div class= "width-50" style="height:70vh;background:  url('<?php echo $fields[$i][picture]; ?>');background-size:cover; background-position:center;">
                                    </div>


                                    <div class= "width-50 padding-med flex flex-direction-column align-self-center">
                                        <span class="goldText padding-top-med lato400"> <?php echo $fields[$i][role]; ?></span>
                                        <span class="whiteText oswald medFont padding-top-med"><?php echo $fields[$i][name] ?></span>
                                        <span class="whiteText smFont padding-top-med lato400 greyText"><?php echo $fields[$i][bio]; ?></span>
                                            <div class= "flex padding-top-med ">
                                                <a href="<?php echo $fields[$i][instagram_url]; ?>"> <i class="fa fa-instagram greenText " aria-hidden="true"></i>  </a>
                                                <a href="<?php echo $fields[$i][twitter_url] ;?>"> <i class="fa fa-twitter greenText" aria-hidden="true"></i> </a>
                                                <a href=" <?php echo$fields[$i][facebook_url];?> "> <i class="fa fa-facebook greenText" aria-hidden="true"></i> </a>
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


 



