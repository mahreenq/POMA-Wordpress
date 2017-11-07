
<?php echo '<h1 class="text-align-center padding-bottom-lg padding-top-lg"> FEATURED ARTISTS</h1>'; ?>

<?php echo '<div class="allArtistsHomePage flex width-100 ">'; ?>
<?php
$args = array( 'post_type' => 'artists', 'posts_per_page' => 4 );
   $loop = new WP_Query( $args );
   $i=0;
   while ( $loop->have_posts() ) : $loop->the_post(); ?>

   <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

   <div class="artistHomePage" style="width:25%;height:40vh;background:  url('<?php echo $backgroundImg[0]; ?>');background-size:cover;">

   <div class="artistTitleHome  ">
        <?php the_title(); ?>
    </div>'


<div class="padding-bottom-lg">
  <?php  echo '<a href="'.get_permalink().'"> READ MORE </a>';  ?>

  </div>

</div>

<?php  endwhile; ?>
</div>



<?php echo '<div class="padding-bottom-lg"><a href="http://localhost:8888/pieceofminearts/?post_type=artists"> MORE ARTISTS </a> </div>'; ?>


