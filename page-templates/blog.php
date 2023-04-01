<?php 

/* Template Name: Blog */

get_header();
?>

<main class="main">
<?php get_template_part('/template-parts/banner'); ?>
<?php get_template_part('/template-parts/blog-posts'); ?>
<?php get_template_part('/template-parts/offer-part'); ?>
<?php get_template_part('/template-parts/contact'); ?>
<?php get_template_part('/template-parts/associates'); ?>
</main>

<?php
get_footer();
?>