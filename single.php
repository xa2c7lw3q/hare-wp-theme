<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="block single-news">
  <div class="kicker latin"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></div>
  <h1 class="h2"><?php the_title(); ?></h1>
  <div class="post-body"><?php the_content(); ?></div>
  <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>#news"><span>お知らせ一覧へ戻る</span></a>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>
