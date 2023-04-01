<section class="blog-post container">
  <article class="row align-items-center flex-column">

    <?php if ($article_heading = get_field('article_heading')) : ?>
      <div class="blog-post__heading col-12 col-md-10 col-lg-8 cta__item slide-in-animation">
        <?= $article_heading; ?>
      </div>
    <?php endif; ?>

    <?php if ($article_subheading = get_field('article_subheading')) : ?>
      <div class="blog-post__subheading col-12 col-md-10 col-lg-8 cta__item slide-in-animation">
        <?= $article_subheading; ?>
      </div>
    <?php endif; ?>

    <div class="blog-post__info col-10 col-lg-6 cta__item slide-in-animation">
      <p><?= get_the_date('d F Y'); ?></p>
      <p>autor: <?php the_author(); ?></p>
    </div>
    <div class="blog-post__article col-10 col-lg-6 cta__item slide-in-animation">
      <div class="container">
        <?= the_content(); ?>
      </div>
      
    </div>
  </article>
</section>