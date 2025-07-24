<?php
/**
 * The main template file
 *
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header();
?>

<!-- BLOG SECTION  -->
<section id="blog" class="blog_posts min-h-[100vh] my-8 font-poppins  px-4">


  <?php if (have_posts()): ?>

    <div class="blog_info_area blog-grid block">

      <?php /* Start the Loop */
      while (have_posts()):
        the_post(); ?>

        <div class="blog-post bg-slate-100 shadow-sm mb-8 rounded-lg box-border ">

          <?php if (has_post_thumbnail()): ?>
            <div class="thumbnail overflow-hidden">
              <a href="<?php the_permalink(); ?>">
                <?php echo the_post_thumbnail('medium', array('class' => 'w-full h-auto hover:scale-110 duration-300 rounded-t-lg')); ?>
              </a>
            </div>
          <?php endif; ?>

          <div class="post_title pt-2 mt-2 text-xl px-8">
            <?php
            the_title('<h2 class="entry-title"><a class="font-semibold text-slate-700 leading-8 hover:text-slate-900" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
          </div>
          <div class="author_info flex items-center gap-2  py-2 mt-2 px-8">
            <?php echo get_avatar(get_the_author_meta('ID'), $size = '28', $default = '', $alt = '', $args = array('class' => 'author_photo rounded-full')); ?>
            <h4 class="author_name text-slate-500 hover:text-slate-900 mr-3 text-xs font-bold">
              <?php the_author_posts_link(); ?>
            </h4>
            <h5 class="post_date text-slate-500 text-xs"><?php the_date('M d, Y'); ?></h5>
          </div>
          <div class="blog_content py-3 px-8">
            <h4 class="text-sm font-normal leading-8 text-slate-500 hover:text-slate-950 mb-2">
              <?php the_excerpt(); ?>
            </h4>

          </div>
        </div>
      <?php endwhile; ?>

    </div>

    <?php the_posts_navigation(array(
      'mid_size' => 1,
      'prev_text' => _x('&#8592 Previous Page', 'Navigation previous page', 'mountaviary'),
      'next_text' => _x('Next Page &#8594', 'Navigation Next page', 'mountaviary'),

    ));

  else: ?>
    <?php get_template_part('404'); ?>
  <?php endif; ?>
</section>

<?php get_footer(); ?>