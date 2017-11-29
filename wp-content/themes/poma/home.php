<?php
/**

 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');?>
<div class="main-wrap "> 

<div class="teamHeader flex align-items-center" style="background-size: 100%;background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo $backgroundImg[0] ?>'); background-position:center;">
        <div class="width-50 padding-lg padding-left-xlg  transparentBlackBg">
                <h1 class="entry-title oswald goldText med-lgFont uppercase letterSpacingMed med-lgFont"><?php single_post_title(); ?></h1>
        </div>
</div>
    <!-- <div class = "blogHeader text-align-center flex justify-content-center align-items-center  goldText blackBackground">
        <h1 class ="oswald lgFont"> BLOG </h1>
        
    </div> -->
	<main class="main-content flex flex-wrap  padding-right-xxlg padding-left-xxlg  ">
        
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'blog' ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php
		if ( function_exists( 'foundationpress_pagination' ) ) :
			foundationpress_pagination();
		elseif ( is_paged() ) :
		?>
			<nav id="post-nav">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
			</nav>
		<?php endif; ?>

	</main>


</div>

<?php get_footer();
