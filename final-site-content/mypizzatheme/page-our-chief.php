<?php get_header() ?>

    <section class="section about-section">
        <div class="wide-container">
            <h2 class="section-header"><?php the_title(); ?></h2>
            <div class="about-chief our-chief">
                    <img src="<?php 
                    echo get_theme_file_uri('/assets/images/chef.jpg');
                    ?>" 
                    alt="mr-italiano" class="about-chief-img our-chief">
                <div class="about-info our-info">
                    <?php the_content(); ?>
                </div>
                <a href="<?php echo site_url('/about-us'); ?>" class="about-link">Back to About</a>
            </div>
        </div>
    </section>

<?php get_footer() ;
?>