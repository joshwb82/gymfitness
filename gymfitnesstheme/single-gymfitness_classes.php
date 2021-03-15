<?php get_header(); ?>

<main class="container page section with-sidebar">

    <div class="page-content">

      <?php get_template_part('template-parts/page', 'loop'); ?>

    </div>
    <!--//.page-content -->

    <?php get_sidebar(); ?>

</main>
<!--//.container -->

<?php get_footer(); ?>