<?php 
get_header();
while(have_posts()) {
    the_post();
?>
    <section class="section expanded-menu">
        <div class="wide-container">
            <nav class="menu-page-nav">
                <ul>
                    <?php 
                    $menuCategories = get_categories(array(
                        'taxonomy' => 'menu_categories',
                        'orderby'  => 'name',
                    ));
                    
                    foreach( $menuCategories as $category ){
                        $categoryLink = get_term_link($category->name, 'menu_categories');
                        echo "<li class='menu-page-item'>
                        <a href='$categoryLink'>$category->name</a>
                        </li>";
                    };
                    ?>
                </ul>
            </nav>
            <p class="expanded-menu-text">
            <?php the_content(); 
            ?>
            </p>
            </div>
    </section>
    
<?php };
contact_form_html();
get_footer();


