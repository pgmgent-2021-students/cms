<?php get_header(); ?>

<div class="container">
carteroo
    <?php the_content() ?>

    <!-- Afzonderlijk ophalen -->
    <?php woocommerce_cart_totals() ?>
</div>

<?php get_footer(); ?>