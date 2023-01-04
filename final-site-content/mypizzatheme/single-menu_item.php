<?php
get_header();
while(have_posts()) {
    the_post();  
?>

<div class="wide-container single-product-container">
                <section class="section single-product-info">
                    <div class="single-product-card">
                        <div class="single-product-text">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                            <p><span>Ingredients:</span> 
                            <?php echo get_field('ingredients'); ?>
                            </p>
                            <p><span>Calories:</span> 
                            <?php echo get_field('calories_per_100g'); ?> cal / 100g</p>
                            <p><span>Price:</span> 
                            <?php echo round(get_field('price'), 2); ?> &#163; </p>
                        </div>
                        <div class="single-product-image">
                           <?php echo the_post_thumbnail('medium-large');?>
                        </div>
                    </div>
                </section>

            
    
            <section class="section recommended-products-section">
                <h2>Best to try with</h2>
                <section class="category-section">
                    <div class="category-cards-container">
                        <?php 
                         $relatedMenuItems = get_field('best_to_try_with');
                         foreach($relatedMenuItems as $relatedItem) {
                        ?>

                            <div class="category-card recommended-products-card" style="background-image:url( <?php echo get_the_post_thumbnail_url($relatedItem);?>)">
                                <div class="card-description">
                                    <h3><?php echo get_the_title($relatedItem); ?></h3>
                                </div>
                                <div class="see-info-btn">
                                    <a href="<?php echo get_the_permalink($relatedItem); ?>">See info</a>
                                </div>
                            </div>
                    
                    <?php } ?>
                    </div> 
            </section>
        </section>
        </div>

<?php };
get_footer(); 
?>