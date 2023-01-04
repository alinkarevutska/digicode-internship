<?php get_header(); ?>
<section class="section contact-section">
        <div class="wide-container">
            <h2 class="section-header">Contact</h2>
            <p class="contacts">Find us at <a href="https://g.page/garibaldispizzabolton?share">some address at some place</a> or call us at <a href="tel:+5050515122330">05050515-122330</a></p>
            <p class="services"><span>FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggest criteria of them all, booth look and taste.</p>
            <p class="reserve"><span>Reserve</span> a table, ask for today's special or just send us a message:</p>
            
            <form action="" method="GET" class="contact-form" novalidate>
              <input type="text" name="name" id="name" placeholder="Name">  
              <input type="number" name="people-quantity" id="people-quantity" min="1" step="1" placeholder="how many people">
              <input type="datetime-local" name="booking-time" id="booking-time">
              <input type="text" name="message" id="message" placeholder="message / special requirements">
              <button type="submit">Send Message</button>
            </form>
        </div>
    </section>
    <section class="location-section">
        <a href="https://g.page/garibaldispizzabolton?share" class="location_link" target="blank" title="Find us on the map!">
         <img src="<?php 
        echo get_theme_file_uri('/assets/images/map.jpg');
        ?>" alt="garibaldi-pizza-location">
        </a>
</section>
<?php
get_footer(); ?>