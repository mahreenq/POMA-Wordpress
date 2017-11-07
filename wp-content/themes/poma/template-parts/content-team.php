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



   <?php $backgroundImg = the_post_thumbnail(); ?>
   <div class="lalala" >
   <?php the_post_thumbnail(); ?>
</div>



   <div class="" style="width:25%;height:40vh;background:  url('<?php the_post_thumbnail(); ?>');background-size:cover;">

   <div class=" ">
        <?php the_title(); ?>
    </div>'

</div>








 
<div class= " teamMembers">

        <?php 
        echo '<br>';
        echo '<br>';
        $fields = CFS()->get( 'team_members' );
        foreach ( $fields as $field ) {

            echo '<div class= "flex ">';

            echo '<div class= "width-50">';
            echo '<img src="'.$field['picture'].'">';
            echo '<br>';
            echo '</div>';

            echo '<div class= "width-50 padding-med flex flex-direction-column align-self-center">';
            echo '<span class="goldText padding-top-med lato400">'.$field['role'].'</span>' ;
           
            echo '<span class="whiteText oswald medFont padding-top-med">'.$field['name'].'</span>';
           
            echo '<span class="whiteText smFont padding-top-med lato400 greyText">'.$field['bio'].'</span>';
            echo '<br><br><br>';

            echo '<div class= "flex padding-top-med ">';
            echo '<a href="'.$field['instagram_url'].'"> <i class="fa fa-instagram greenText " aria-hidden="true"></i>  </a>';
            echo '<br>';
            echo '<a href="'.$field['twitter_url'].'"> <i class="fa fa-twitter greenText" aria-hidden="true"></i> </a>';
            echo '<br>';
            echo '<a href="'.$field['facebook_url'].'"> <i class="fa fa-facebook greenText" aria-hidden="true"></i> </a>';
            echo '</div>';


            echo '</div>';

            echo '</div>';

            
        }
        ?>


</div>




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

