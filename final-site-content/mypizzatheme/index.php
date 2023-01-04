<?php 
    get_header();
?>
    <main>
        <section class="section menu-section">
            <div class="wide-container">
                <h2 class="section-header">The menu</h2>

                <div class="menu-tab">
                    <button class="tablinks pizza" onclick="openMenu(event, 'Pizza')">Pizza</button>
                    <button class="tablinks salads" onclick="openMenu(event, 'Salads')">Salads</button>
                    <button class="tablinks starters" onclick="openMenu(event, 'Starters')">Starter</button>
                  </div>
                  
                <div id="Pizza" class="tabcontent"></div>
                <div id="Salads" class="tabcontent"></div>
                <div id="Starters" class="tabcontent"></div> 
            </div> 
        </section>
        <?php contact_form_html(); ?>
    </main>
    <?php wp_footer();
    get_footer();
    ?>
