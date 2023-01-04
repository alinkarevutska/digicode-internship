<?php 

// adding styles and fonts to the theme
function my_theme_files() {
    wp_enqueue_style('my-styles', get_stylesheet_uri());
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/754ab2f32e.js');

    wp_register_style('google', 'https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap', array(), null, 'all');
    wp_enqueue_style('google');
}; 

add_action('wp_enqueue_scripts', 'my_theme_files');

function my_theme_js() {
    wp_enqueue_script('my-javascript', get_template_directory_uri().'/assets/my-script.js');
};
add_action('wp_footer', 'my_theme_js');

// adding theme feautures
function my_theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('menu_item'));
};

add_action('after_setup_theme', 'my_theme_features');



function contact_form_html() {
    ?>

    <section class="section contact-section">
        <div class="wide-container">
            <h2 class="section-header">Contact</h2>
            <p class="contacts">Find us at <a href="https://g.page/garibaldispizzabolton?share">some address at some place</a> or call us at <a href="tel:+5050515122330">05050515-122330</a></p>
            <p class="services"><span>FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggest criteria of them all, booth look and taste.</p>
            <p class="reserve"><span>Reserve</span> a table, ask for today's special or just send us a message:</p>
            
            <form action="<?php echo admin_url('admin-post.php'); ?>" method="POST" class="contact-form" novalidate>
            <input type="hidden" name="action" value="enroll"> 
            
                <input type="text" name="name" id="name" placeholder="Name *"> 
                <input type="email" name="email" id="email" placeholder="Email *"> 
                <input type="number" name="people-quantity" id="people-quantity" min="1" step="1" placeholder="how many people">
                <input type="datetime-local" name="booking-time" id="booking-time">
                <input type="text" name="message" id="message" placeholder="message / special requirements *">
                <input type="submit" name="contact-form-submit" value="send message"></input>
            </form>
        </div>
    </section>

<?php };

function checkTime($timeFromInput) {
    $now = time();
    $bookedTime = strtotime($timeFromInput);
    if($bookedTime > $now) {
        return true;
    } else {
        return false;
    };
};

function formateTime($time) {
    return date('Y-m-d', strtotime($time))
    ." ".
    date('H:i', strtotime($time));
};


function contact_form_handler() {
   $valid = true;

   if(isset($_POST['contact-form-submit'])) {

    if(!empty($_POST['name'])) {
        $name = sanitize_text_field($_POST['name']);
    } else {
        $valid = false;
    }

    if(!empty($_POST['email'])) {
        $email = sanitize_email($_POST['email']);
    } else {
        $valid = false;
    }

    if(!empty($_POST['message'])) {
        $message = sanitize_text_field($_POST['message']);
    } else {
        $valid = false;
    }

    $peopleQuantity = 'no people';
    if(!empty($_POST['people-quantity'])) {
        $peopleQuantity = $_POST['people-quantity'];
    }; 

    $bookingTime = 'no booking';
    if(!empty($_POST['booking-time'])) {
        if(checkTime($_POST['booking-time'])) {
            $bookingTime = formateTime($_POST['booking-time']);
        } else {
            $valid = false;
        }
    };

    $formContent = '';
        if($valid) {
            $formContent = 'Name: '.$name.'<br>';
            $formContent .= 'Email: '.$email.'<br>';
            $formContent .= 'Number of people: '.$peopleQuantity.'<br>';
            $formContent .= 'Booking time: '.$bookingTime.'<br>';
            $formContent .= 'Message / requirements: '.$message.'<br>';

            wp_insert_post(array(
                'post_title' => $name.' - '.wp_date('d.m.Y H:i'),
               'post_type' => 'form_message',
               'post_content' => $formContent,
               'post_status' => 'publish',
               'meta_input' => array(
                'email' => $email
               ),
            ));

            $name = $_POST['name'];
            wp_safe_redirect(site_url("form-submit?username=$name"));
            exit;
        } else {
            wp_safe_redirect(site_url("form-submit"));
	        exit;
        };
    };
};

add_action('admin_post_enroll', 'contact_form_handler');
add_action('admin_post_nopriv_enroll', 'contact_form_handler');
?>