<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <header style="background-image: url(<?php 
        echo get_theme_file_uri('/assets/images/pizza.jpg');
        ?>)">
        <nav class="header-nav">
            <ul>
                <li>
                    <a <?php if(is_front_page()) {
                        echo 'class="selected"';
                    } ?>
                    href="<?php echo get_site_url()?>">Home</a>
                </li>
                <li>
                    <a <?php if(is_page('menu') || is_tax() || get_post_type() == 'menu_item' ){
                        echo 'class="selected"';
                    }; ?>
                    href="<?php echo site_url('/menu')?>">Menu</a>
                </li>
                <li>
                    <a  <?php if(is_page('about-us') || is_page('our-chief') || is_page('our-restaurant')  ) { 
                        echo 'class="selected"';
                    }; ?> 
                    href="<?php echo site_url('/about-us')?>">About</a>
                </li>
                <li>
                    <a <?php if(is_page('contact')){
                        echo 'class="selected"';
                    }; ?> 
                    href="<?php echo site_url('/contact')?>">Contact</a>
                </li>
            </ul>
        </nav>
        <a href="<?php echo get_site_url();?>" class="header-return-link" title="Come back to the main page">Garibaldi's pizza</a>
        <?php if (!is_page('menu')) { ?>
            <a href="<?php echo site_url('/menu');?>" 
            class="header-menu-link">Let me see the menu</a>
            <?php
            } else { ?>
                <h3 class="header-menu-title"> <?php echo the_title(); ?></h3>
                <?php
            }?>
        <p class="header-hours">Open from 10am to 12pm</p>
    </header>