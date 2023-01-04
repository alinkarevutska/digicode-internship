<?php get_header() ?>

    <section class="section about-section">
        <div class="wide-container">
            <h2 class="section-header">About</h2>
            <p class="about-info">
                Garibaldi's Pizza Restaurant was founded in blabla by Mr. Patrizio Garibaldi in Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo nisi sit eos ut maiores laboriosam assumenda vero officiis porro facilis.
            </p>
            <div class="about-chief">
                <div class="about-info">
                    <h3><span>The chef?</span> Mr. Italiano himself</h3> 
                    <a href="<?php echo site_url('about-us/our-chief');?>" class="about-link">More about Chief</a>
                </div>
                <div class="about-img-wrapper">
                    <img src="<?php 
                    echo get_theme_file_uri('/assets/images/chef.jpg');
                    ?>" 
                    alt="mr-italiano" class="about-chief-img">
                </div>
            </div>
           
            <div class="about-restaurant">
                <div class="about-info">
                    <h3>We are proud of our interiors.</h3>
                    <a href="<?php echo site_url('about-us/our-restaurant'); ?>" class="about-link">More about Restaurant</a>
                </div>
                <div class="about-img-wrapper">
                    <img src="<?php 
                    echo get_theme_file_uri('/assets/images/onepage_restaurant.jpg');
                    ?>" 
                    alt="garibaldi-restaurant">
                </div>
            </div>
           
            <div class="about-hours">
                <h2>Opening hours</h2>
                <div class="about-hours-schedule">
                    <p>Mon & Tue <span>closed</span></p>
                    <p>Wednesday 10:00 - 24.00</p>
                    <p>Thursday 10:00 - 24:00</p>
                    <p>Friday 10:00 - 12:00</p>
                    <p>Saturday 10:00 - 23:00</p>
                    <p>Sunday <span>closed</span></p>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();
//  $parentID = wp_get_post_parent_id(get_the_ID());
//  $pageChildren = get_pages(array('child_of' => get_the_ID()));
//  var_dump ($pageChildren) ;

// // echo get_permalink('about-us');
// // echo $parentID;
// // echo the_ID();

// foreach( $pageChildren as $child ){
// 	// echo get_page_link($child -> ID);
//     echo 'Title: '.($child -> post_title);
// }
?>