<footer class="site-footer container">

  <div class="footer-content">

    <!-- Add Main Menu -->
    <?php
        
        $args = array(
          'theme_location' => 'main-menu',
          'container' => 'nav',
          'container_class' => 'footer-menu'
        );
        wp_nav_menu($args);
      
      ?>
      <!--// -->

      <p class="copyright">&#169;<?php echo date('Y') . " " . get_bloginfo('name');?> All&nbsp;Rights&nbsp;Reservered</p>


  </div>
  <!--//.footer-content -->

</footer>
<!--//.site-footer -->

<!-- Loads JS files in footer -->
<?php wp_footer(); ?>

</body>
</html