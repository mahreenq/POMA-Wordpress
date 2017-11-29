<div class="width-100 flex justify-content-center">
<h1 class="text-align-center padding-bottom-med padding-top-med oswald oswald med-lgFont width-50 uppercase "> Follow our blog and keep up with the latest news </h1>
</div>

<div class="blogshomepage flex justify-content-space-around padding-top-lg padding-bottom-lg">

            <?php
            global $query_string;
                    query_posts ('posts_per_page=3');
            while ( have_posts() ) : the_post();  ?>
            <div class ="width-100 flex flex-direction-column align-items-center">
                <div class="bloghomepage width30 solidgreyborderallaround padding1rem margin-xsm " 
                style="width:85%;height:350px;background:  url('<?php the_post_thumbnail_url(); ?>');background-size:cover; background-position:center;">
                


                                                <?php if ( 'post' === get_post_type() ) : ?>
                                                <div class="entry-meta">
                                                </div><!-- .entry-meta -->


                                                <?php endif; ?>


                    </div>
        
                    <h3 class="uppercase oswald journalTitleHome text-align-center medFont "><?php the_title(); ?> </h3>
                    <?php
                    echo '<h4 class="lato400 greyText"><a   href="'.get_permalink().'"> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>READ ENTRY </a> </h4> '; ?>
            </div>

            <?php endwhile; ?>

</div>