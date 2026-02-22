<?php
/**
 * The template for displaying all pages
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header('topnav');
?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">
  <div style="max-width:740px; margin:0 auto; padding:2.5rem 1.5rem 4rem;">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>

        <article <?php post_class(''); ?>>

          <!-- Title -->
          <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight text-slate-700 dark:text-slate-50 mb-3">
            <?php single_post_title(); ?>
          </h1>

          <!-- Divider -->
          <div class="border-b border-slate-100 dark:border-slate-800 mb-8"></div>

          <!-- Page Content -->
          <div class="single_content prose prose-slate dark:prose-invert max-w-none
          text-slate-700 dark:text-slate-300
          leading-relaxed text-base mb-8">
            <?php the_content(); ?>
          </div>

          <!-- Page links (multi-page posts) -->
          <?php wp_link_pages([
            'before' => '<div class="flex items-center gap-2 my-6 text-sm font-semibold text-slate-500 dark:text-slate-400">Pages:',
            'after' => '</div>',
            'link_before' => '<span class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">',
            'link_after' => '</span>',
          ]); ?>

        </article>

        <!-- Comments -->
        <?php if (comments_open() || get_comments_number()): ?>
          <div class="mt-10 pt-8 border-t border-slate-100 dark:border-slate-800">
            <?php comments_template(); ?>
          </div>
        <?php endif; ?>

      <?php endwhile; else: ?>
      <?php get_template_part('404'); ?>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>