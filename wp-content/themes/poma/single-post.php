<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<h1 class="text-align-center padding-bottom-med padding-top-med oswald lgFont singleBlogHeading goldText"> BLOG </h1>

<div class="main-wrap flex">
    

	<main class="main-content width-75 padding-bottom-lg">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/single-blog' ); ?>
			<div class="commentsBlog">
            <?php comments_template(); ?>
            </div>
		<?php endwhile;?>
    </main>

    <div class="sidebarBlog width-25">
        <?php get_sidebar(); ?>
    </div>

</div>
<?php get_footer();
