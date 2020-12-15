    </main>
    <footer>
        <nav class="navigation footer">
            <?php wp_nav_menu(array(
                'theme_location' => 'footer-nav'
            )) ?>
        </nav>
        <?php echo do_shortcode('[contact-form-7 id="1234" title="Contact form"]') ?>

        <?php if (is_active_sidebar( 'footer-form' )) { ?>
            <aside class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer-form' ); ?>
            </aside>
        <?php } ?>

        <div id="results" class="results hidden"></div>
        </footer>

        <?php wp_footer() ?>
    </body>
</html>