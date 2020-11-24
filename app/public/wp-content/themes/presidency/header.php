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
            </nav>
        </header>
        <main>
