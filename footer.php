<footer class="footer cta__item slide-in-animation" style="background-image: url('<?= esc_url(get_field('footer_background', 'options')); ?>')">
  <?php if ($footer_buildings = get_field('footer_buildings', 'options')) : ?>
    <?= wp_get_attachment_image($footer_buildings, 'full', '', ['class' => 'footer__buildings']); ?>
  <?php endif; ?>
  <?php if ($footer_megaphone = get_field('footer_megaphone', 'options')) : ?>
    <?= wp_get_attachment_image($footer_megaphone, 'full', '', ['class' => 'footer__megaphone']); ?>
  <?php endif; ?>
  <div class="container">
    <?php if ($footer_logo = get_field('footer_logo', 'options')) : ?>

      <div class="footer__logo">
        <?= wp_get_attachment_image($footer_logo, 'full'); ?>
      </div>

    <?php endif; ?>

    <div class="row">

      <?php if ($footer_motto = get_field('footer_motto', 'options')) : ?>

        <div class="footer__motto col-12 col-xs-7 col-sm-4 col-lg-3">
          <?= $footer_motto; ?>
        </div>

      <?php endif; ?>

      <?php if (have_rows('contact_info', 'options')) : ?>

        <div class="footer__contact col-12 col-xs-5 col-sm-4 offset-sm-1 offset-md-2 col-lg-3 offset-lg-2">
          <?php if ($contact_info_heading = get_field('contact_info_heading', 'options')) : ?>

            <h3 class="footer__contact-heading">
              <?= $contact_info_heading; ?>
            </h3>

          <?php endif; ?>

          <div class="footer__contact-info-container">

            <?php while (have_rows('contact_info', 'options')) : the_row(); ?>

              <?php
              $type = get_sub_field('type');
              $is_link = get_sub_field('is_link');
              $info = get_sub_field('info');
              $info_url = $info['url'];
              $info_text = $info['title'];
              ?>

              <p class="footer__contact-info">
                <span class="footer__contact-info-type">
                  <?= $type; ?>:
                </span>

                <?php if ($is_link) : ?>
                  <a href="<?= esc_url($info_url); ?>">
                    <?= $info_text; ?>
                  </a>
                  <?php continue; ?>
                <?php endif; ?>

                <?= $info_text; ?>

              </p>

            <?php endwhile; ?>

          </div>

        </div>
      <?php endif; ?>
      <div class="footer__menu col-7 col-sm-3 col-md-2 col-lg-2">

        <?php if ($menu_heading = get_field('menu_heading', 'options')) : ?>
          <h3 class="footer__menu-heading">
            <?= $menu_heading; ?>
          </h3>
        <?php endif; ?>

        <?php
        wp_nav_menu($args = array(
          'menu' => 'nav-top',
          'menu_class' => 'footer__main-menu',
          'container' => ''
        ));
        ?>

      </div>

      <?php if (have_rows('footer_social', 'options')) : ?>

        <div class="footer__social col-5 offset-sm-2 col-sm-8 col-lg-2 offset-lg-0">

          <?php if ($footer_social_heading = get_field('footer_social_heading', 'options')) : ?>
            <h3 class="footer__social-heading">
              <?= $footer_social_heading; ?>
            </h3>
          <?php endif; ?>

          <div class="footer__social-links">
            <?php while (have_rows('footer_social', 'options')) : the_row(); ?>
              <?php
              $social_link = get_sub_field('social_link');
              $url = $social_link['url'];
              $title = $social_link['title'];
              $icon = get_sub_field('social_icon');
              ?>

              <a href="<?= $url; ?>" class="footer__social-link"><?= $title; ?></a>

            <?php endwhile; ?>
          </div>

          <?php reset_rows(); ?>

          <div class="footer__social-icons">
            <?php while (have_rows('footer_social', 'options')) : the_row(); ?>
              <?php
              $social_link = get_sub_field('social_link');
              $url = $social_link['url'];
              $icon = get_sub_field('social_icon');
              ?>
              <a href="<?= $url; ?>" class="footer__social-icon"><?= wp_get_attachment_image($icon, 'full'); ?></a>
            <?php endwhile; ?>
          </div>

        </div>

      <?php endif; ?>

    </div>
    <div class="footer__bottom">
      <p class="footer__copyrights">
        &copy; <?= date('Y'); ?> <?php if ($footer_copy = get_field('footer_copy', 'options')) echo $footer_copy; ?>
      </p>
      <a href="https://everywhere.pl" class="footer__everywhere">
        <img src="<?= get_template_directory_uri(); ?>/images/everywhere-logo.svg" alt="logo-everywhere">
      </a>
    </div>
  </div>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- Cookies -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/cookies/divante.cookies.min.js">
</script>
<script>
  window.jQuery.cookie || document.write(
    '<script src="<?php echo get_template_directory_uri(); ?>/cookies/jquery.cookie.min.js"><\/script>')
</script>
<script>
  jQuery(function($) {
    $.divanteCookies.render({
      privacyPolicy: true,
    });
  });
</script>

</body>

</html>