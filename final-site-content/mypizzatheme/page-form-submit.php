<?php get_header();

$name = $_GET['username']; 
?>

<section class='form-submit-section <?php echo $name? 'success' : 'error' ?> section'>

    <div class='wide-container'>
        <h2 class='section-header'><?php echo $name? 'Thank you!' : 'Oops...'?></h2>
        <p><?php echo $name ? 'Dear '.$name.'!' : '' ?></p>
        <p><?php echo $name ? 'Thank you for your message, we will contact you soon!' : 
                         'Something went wrong. Please try again.' ?></p>
        <a href="<?php echo get_site_url() ?>" class="about-link">Back to Main</a>
    </div>
</section>

