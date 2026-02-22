<?php
/**
 * The main template file — Blog Homepage
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header('topnav');

$all_posts = [];
$featured_post = null;
$grid_posts = [];
$latest_posts = [];
$is_featured_present = false;

$paged = max(1, get_query_var('paged'));
$is_first_page = ($paged === 1);

// Only fetch featured on page 1
if ($is_first_page) {
  $featured_query = new WP_Query([
    'post_type' => 'post',
    'meta_key' => '_is_featured',
    'meta_value' => 1,
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
    'no_found_rows' => true,
  ]);

  if ($featured_query->have_posts()) {
    $featured_query->the_post();
    $featured_post = get_post();
    $is_featured_present = true;
  }
  wp_reset_postdata();
}

// Exclude featured from normal query
$exclude_ids = $is_featured_present ? [$featured_post->ID] : [];

$normal_query = new WP_Query([
  'post_type' => 'post',
  'post__not_in' => $exclude_ids,
  'posts_per_page' => 30,
  'paged' => $paged,
  'orderby' => 'date',
  'order' => 'DESC',
]);

if ($normal_query->have_posts()) {
  while ($normal_query->have_posts()) {
    $normal_query->the_post();
    $all_posts[] = get_post();
  }
}
wp_reset_postdata();

// Distribute
if ($is_first_page && $is_featured_present) {
  $grid_posts = array_slice($all_posts, 0, 4);
  $latest_posts = array_slice($all_posts, 4);
} elseif ($is_first_page) {
  $grid_posts = array_slice($all_posts, 0, 4);
  $latest_posts = array_slice($all_posts, 4);
} else {
  // Page 2+ — skip hero and grid entirely
  $grid_posts = [];
  $latest_posts = $all_posts;
}

?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">

  <!-- ═══════════════════════════ SECTION 1: HERO ═══════════════════════════ -->
  <?php if ($featured_post || !empty($grid_posts)): ?>
    <section class="py-10 px-4 sm:px-6 border-b pb-6 border-slate-100 dark:border-slate-800">
      <div style="max-width:1200px; margin:0 auto;">
        <div class="flex flex-col lg:flex-row gap-8 items-start">

          <!-- LEFT: large featured post -->
          <?php if ($featured_post):
            $feat_cats = get_the_category($featured_post->ID);
            $feat_thumb = get_the_post_thumbnail($featured_post->ID, 'large', [
              'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-[1.02]'
            ]);
            ?>
            <article class="group lg:w-[52%] flex-shrink-0">

              <a href="<?php echo esc_url(get_permalink($featured_post)); ?>"
                class="block overflow-hidden rounded-2xl mb-5 no-underline">
                <div class="relative overflow-hidden rounded-2xl bg-slate-100 dark:bg-slate-800"
                  style="aspect-ratio:16/10;">
                  <?php if ($feat_thumb):
                    echo $feat_thumb;
                  else: ?>
                    <div class="w-full h-full flex items-center justify-center text-5xl text-slate-300 dark:text-slate-600">✍️
                    </div>
                  <?php endif; ?>
                </div>
              </a>

              <div class="flex items-center gap-2 mb-3">
                <?php if (!empty($feat_cats)): ?>
                  <a href="<?php echo esc_url(get_category_link($feat_cats[0]->term_id)); ?>" class="inline-block px-2 py-0.5 rounded-lg no-underline font-bold uppercase transition-colors
                      text-emerald-700 dark:text-emerald-400
                      bg-emerald-50 dark:bg-emerald-950
                      border border-emerald-200 dark:border-emerald-800
                      hover:bg-emerald-100 dark:hover:bg-emerald-900" style="font-size:10px; letter-spacing:1.5px;">
                    <?php echo esc_html($feat_cats[0]->name); ?>
                  </a>
                  <span class="text-slate-200 dark:text-slate-700">·</span>
                <?php endif; ?>
                <span class="text-xs text-slate-400 dark:text-slate-500">
                  <?php echo get_the_date('F j, Y', $featured_post); ?>
                </span>
              </div>

              <h2
                class="text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-tight my-3 text-slate-900 dark:text-slate-50">
                <a href="<?php echo esc_url(get_permalink($featured_post)); ?>"
                  class="no-underline hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                  <?php echo esc_html(get_the_title($featured_post)); ?>
                </a>
              </h2>

              <p class="text-sm leading-relaxed text-slate-500 dark:text-slate-400">
                <?php echo wp_trim_words(get_the_excerpt($featured_post), 22, '…'); ?>
              </p>

            </article>
          <?php endif; ?>

          <!-- RIGHT: 2×2 grid -->
          <?php if (!empty($grid_posts)): ?>
            <div class="lg:flex-1 grid grid-cols-2 gap-4">
              <?php foreach ($grid_posts as $gp):
                $gp_cats = get_the_category($gp->ID);
                $gp_thumb = get_the_post_thumbnail($gp->ID, 'medium', [
                  'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.04]'
                ]);
                ?>
                <article class="group">
                  <a href="<?php echo esc_url(get_permalink($gp)); ?>"
                    class="block overflow-hidden rounded-xl mb-2.5 no-underline">
                    <div class="relative overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800" style="aspect-ratio:4/3;">
                      <?php if ($gp_thumb):
                        echo $gp_thumb;
                      else: ?>
                        <div class="w-full h-full flex items-center justify-center text-3xl text-slate-300 dark:text-slate-600">
                          ✍️</div>
                      <?php endif; ?>
                    </div>
                  </a>

                  <div class="flex items-center gap-1.5 my-2">
                    <?php if (!empty($gp_cats)): ?>
                      <a href="<?php echo esc_url(get_category_link($gp_cats[0]->term_id)); ?>" class="inline-block px-2 py-0.5 rounded no-underline font-bold uppercase transition-colors
                          text-emerald-700 dark:text-emerald-400
                          bg-emerald-50 dark:bg-emerald-950
                          border border-emerald-200 dark:border-emerald-800
                          hover:bg-emerald-100 dark:hover:bg-emerald-900"
                        style="font-size:10px; letter-spacing:1.5px;">
                        <?php echo esc_html($gp_cats[0]->name); ?>
                      </a>
                      <span class="text-slate-200 dark:text-slate-700">·</span>
                    <?php endif; ?>
                    <span class="text-slate-400 dark:text-slate-500" style="font-size:11px;">
                      <?php echo get_the_date('F j, Y', $gp); ?>
                    </span>
                  </div>

                  <h3
                    class="text-xl sm:text-2xl lg:text-2xl font-extrabold text-md leading-snug text-slate-900 dark:text-slate-100">
                    <a href="<?php echo esc_url(get_permalink($gp)); ?>"
                      class="no-underline hover:text-slate-500 dark:hover:text-slate-300 transition-colors">
                      <?php echo esc_html(get_the_title($gp)); ?>
                    </a>
                  </h3>
                </article>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </section>
  <?php endif; ?>

  <!-- ══════════════════════ SECTION 2: LATEST POSTS ══════════════════════ -->
  <?php if (!empty($latest_posts)): ?>
    <section class="py-12 px-4 sm:px-6 bg-white dark:bg-gray-950">
      <div style="max-width:1200px; margin:0 auto;">

        <!-- Section header -->
        <div class="flex items-end justify-between pb-4 mb-8 border-b border-slate-100 dark:border-slate-800">
          <div>
            <h2 class="text-xl font-extrabold text-slate-900 dark:text-slate-50">Latest Posts</h2>
            <p class="text-sm mt-0.5 text-slate-400 dark:text-slate-500">Stay ahead with the freshest content and
              insights.</p>
          </div>
          <a href="<?php echo esc_url(get_pagenum_link(2)); ?>" class="no-underline text-xs font-bold uppercase flex items-center gap-1 transition-colors
              text-slate-500 dark:text-slate-400
              hover:text-slate-900 dark:hover:text-white" style="letter-spacing:1.5px; white-space:nowrap;">
            View All <span>›</span>
          </a>
        </div>

        <!-- 4-column grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-20">
          <?php foreach ($latest_posts as $lp):
            $lp_cats = get_the_category($lp->ID);
            $lp_thumb = get_the_post_thumbnail($lp->ID, 'medium', [
              'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.04]'
            ]);
            ?>
            <article class="group flex flex-col">

              <a href="<?php echo esc_url(get_permalink($lp)); ?>"
                class="block overflow-hidden rounded-xl mb-3 flex-shrink-0 no-underline">
                <div class="relative overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800" style="aspect-ratio:4/3;">
                  <?php if ($lp_thumb):
                    echo $lp_thumb;
                  else: ?>
                    <div class="w-full h-full flex items-center justify-center text-3xl text-slate-300 dark:text-slate-600">✍️
                    </div>
                  <?php endif; ?>
                </div>
              </a>

              <div class="flex items-center gap-1.5 my-2">
                <?php if (!empty($lp_cats)): ?>
                  <a href="<?php echo esc_url(get_category_link($lp_cats[0]->term_id)); ?>" class="inline-block px-2 py-0.5 rounded no-underline font-bold uppercase transition-colors
                      text-emerald-700 dark:text-emerald-400
                      bg-emerald-50 dark:bg-emerald-950
                      border border-emerald-200 dark:border-emerald-800
                      hover:bg-emerald-100 dark:hover:bg-emerald-900" style="font-size:10px; letter-spacing:1.5px;">
                    <?php echo esc_html($lp_cats[0]->name); ?>
                  </a>
                  <span class="text-slate-200 dark:text-slate-700">·</span>
                <?php endif; ?>
                <span class="text-slate-400 dark:text-slate-500" style="font-size:11px;">
                  <?php echo get_the_date('F j, Y', $lp); ?>
                </span>
              </div>

              <h3 class=" leading-snug text-slate-900 dark:text-slate-100">
                <a href="<?php echo esc_url(get_permalink($lp)); ?>"
                  class="text-xl md:text-2xl font-bold no-underline hover:text-slate-500 dark:hover:text-slate-300 transition-colors text-md">
                  <?php echo esc_html(get_the_title($lp)); ?>


                </a>
                <div class="mt-1 text-sm leading-6 text-slate-500 dark:text-slate-400">
                  <?php echo wp_trim_words(get_the_excerpt($lp), 120, '…'); ?>
                </div>
              </h3>

            </article>
          <?php endforeach; ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

  <!-- No posts fallback -->
  <?php if (empty($all_posts)): ?>
    <?php get_template_part('404'); ?>
  <?php endif; ?>

  <!-- pagination -->
  <div class="py-10 flex items-center justify-center gap-4">
    <?php
    echo paginate_links(array(
      'total' => $normal_query->max_num_pages,
      'current' => max(1, get_query_var('paged')),
      'prev_text' => '‹ Prev',
      'next_text' => 'Next ›',
      'type' => 'list',
    ));
    ?>
  </div>

</main>

<?php get_footer(); ?>