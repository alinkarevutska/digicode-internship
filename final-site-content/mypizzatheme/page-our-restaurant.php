<?php get_header() ?>

    <section class="section about-section">
        <div class="wide-container">
            <h2 class="section-header"><?php the_title(); ?></h2>
            <div class="our-restaurant">
            <?php the_content(); ?>
            <a href="<?php echo site_url('/about-us'); ?>" class="about-link">Back to About</a>
            </div>
           
            </div>
       
    </section>
   

<?php get_footer() ;
?>