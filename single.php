<?php
/**
 * The Template for displaying all single posts
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header('topnav');
?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">
  <div style="max-width:840px; margin:0 auto; padding:2.5rem 1.5rem 4rem;">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>

        <article <?php post_class(''); ?>>

          <!-- Category + Date -->
          <div class="flex items-center gap-2 mb-4">
            <?php
            $categories = get_the_category();
            if (!empty($categories)):
              $cat = $categories[0];
              ?>
              <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="inline-block px-2 py-0.5 rounded-md no-underline font-bold uppercase transition-colors
                text-emerald-700 dark:text-emerald-400
                bg-emerald-50 dark:bg-emerald-950
                border border-emerald-200 dark:border-emerald-800
                hover:bg-emerald-100 dark:hover:bg-emerald-900" style="font-size:10px; letter-spacing:1.5px;">
                <?php echo esc_html($cat->name); ?>
              </a>
              <span class="text-slate-200 dark:text-slate-700">·</span>
            <?php endif; ?>
            <span class="text-xs text-slate-400 dark:text-slate-500">
              <?php the_date('M j, Y'); ?>
            </span>
          </div>

          <!-- Title -->
          <?php if (is_singular()): ?>
            <h1 class="leading-[3rem] text-3xl sm:text-4xl font-extrabold  text-slate-700 dark:text-slate-50 mb-4">
              <?php the_title(); ?>
            </h1>
          <?php else: ?>
            <h2 class="leading-[3rem] text-2xl font-extrabold  text-slate-700 dark:text-slate-50 mb-4">
              <a href="<?php echo esc_url(get_permalink()); ?>"
                class="no-underline hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                <?php the_title(); ?>
              </a>
            </h2>
          <?php endif; ?>

          <!-- Author -->
          <div class="flex items-center gap-2 mb-6 pb-6 border-b border-slate-100 dark:border-slate-800">
            <?php echo get_avatar(get_the_author_meta('ID'), 28, '', '', ['class' => 'rounded-full']); ?>
            <span class="text-xs font-semibold text-slate-500 dark:text-slate-400">
              <?php the_author_posts_link(); ?>
            </span>
          </div>

          <!-- Featured Image -->
          <?php if (has_post_thumbnail()): ?>
            <div class="overflow-hidden rounded-2xl mb-8 bg-slate-100 dark:bg-slate-800">
              <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
            </div>
          <?php endif; ?>

          <!-- Post Content -->
          <div class="single_content prose prose-slate dark:prose-invert max-w-none
          text-slate-700 dark:text-slate-300
          leading-[2rem] text-lg mb-8">
            <?php the_content(); ?>
          </div>

          <!-- Page links (multi-page posts) -->
          <?php wp_link_pages([
            'before' => '<div class="flex items-center gap-2 my-6 text-sm font-semibold text-slate-500 dark:text-slate-400">Pages:',
            'after' => '</div>',
            'link_before' => '<span class="px-3 py-1 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">',
            'link_after' => '</span>',
          ]); ?>

          <!-- Tags -->
          <?php
          $tags = get_the_tags();
          if ($tags): ?>
            <div class="flex flex-wrap items-center gap-2 pt-6 border-t border-slate-100 dark:border-slate-800 mb-6">
              <span class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600"
                style="letter-spacing:1.5px;">Tags</span>
              <?php foreach ($tags as $tag): ?>
                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="inline-block px-2.5 py-1 rounded-lg text-xs font-semibold no-underline transition-colors
                  text-slate-500 dark:text-slate-400
                  bg-slate-100 dark:bg-slate-800
                  hover:bg-slate-200 dark:hover:bg-slate-700
                  hover:text-slate-800 dark:hover:text-slate-200">
                  #<?php echo esc_html($tag->name); ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <!-- Prev / Next post navigation -->
          <div class="flex items-stretch justify-between gap-4 pt-6 border-t border-slate-100 dark:border-slate-800">
            <?php
            $prev = get_previous_post();
            $next = get_next_post();
            ?>

            <?php if ($prev): ?>
              <a href="<?php echo esc_url(get_permalink($prev)); ?>"
                class="group flex-1 flex flex-col gap-1 p-4 rounded-xl border border-slate-100 dark:border-slate-800 no-underline hover:border-slate-300 dark:hover:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600"
                  style="letter-spacing:1.5px;">‹ Previous</span>
                <span
                  class="text-sm font-semibold text-slate-700 dark:text-slate-300 group-hover:text-slate-700 dark:group-hover:text-slate-100 transition-colors leading-snug">
                  <?php echo esc_html(get_the_title($prev)); ?>
                </span>
              </a>
            <?php else: ?>
              <div class="flex-1"></div>
            <?php endif; ?>

            <?php if ($next): ?>
              <a href="<?php echo esc_url(get_permalink($next)); ?>"
                class="group flex-1 flex flex-col gap-1 p-4 rounded-xl border border-slate-100 dark:border-slate-800 no-underline hover:border-slate-300 dark:hover:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-900 transition-all text-right">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600"
                  style="letter-spacing:1.5px;">Next ›</span>
                <span
                  class="text-sm font-semibold text-slate-700 dark:text-slate-300 group-hover:text-slate-700 dark:group-hover:text-slate-100 transition-colors leading-snug">
                  <?php echo esc_html(get_the_title($next)); ?>
                </span>
              </a>
            <?php endif; ?>
          </div>

        </article>

        <!-- Comments -->
        <?php if (comments_open() || get_comments_number()): ?>
          <div class="mt-10 pt-8 border-t border-slate-100 dark:border-slate-800">
            <?php comments_template(); ?>
          </div>
        <?php endif; ?>

      <?php endwhile; else: ?>
      <h3 class="text-slate-500 dark:text-slate-400"><?php _e('404 Error: Not Found', 'mountaviary'); ?></h3>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>