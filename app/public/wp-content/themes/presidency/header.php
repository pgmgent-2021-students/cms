<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <nav class="navigation">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                    ?>

                <?php wp_nav_menu(array(
                    'theme_location' => 'header-nav'
                )) ?>

                <?php if(is_user_logged_in()) { ?>
                    <span><?php get_avatar(get_current_user_id(), 60) ?></span>
                    <a href="<?php echo wp_logout_url() ?>">Sign out</a>
                <?php } else { ?>
                    <a href="<?php echo wp_login_url() ?>">Sign in</a>
                <?php } ?>
            </nav>

            <input type="search" id="js-search"/>
        </header>
        <main>
