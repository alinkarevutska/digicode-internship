<?php 
get_header();
?>
    <section class="category-section section">
        <div class="wide-container">
            <h2 class="section-header"><?php echo single_term_title(); ?></h2>
            <div class="category-cards-container">

                <?php if(have_posts() ) : while(have_posts()) : the_post(); ?>
                    
                <div class="category-card" style="background-image:url( <?php echo get_the_post_thumbnail_url();?>)">
                    <div class="card-description">
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <div class="see-info-btn">
                        <a href="<?php the_permalink(); ?>">See info</a>
                    </div>
                </div>

                <?php endwhile; ?>
                <?php else: ?>
                    <p>Oops... We don't have anything in this category yet! <br>
                    But we will fix it soon ;)
                    </p> 
                    <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo site_url('/menu'); ?>" class="menu-link">Come back to Menu</a>
    </section>

<?php 
get_footer(); 
?>