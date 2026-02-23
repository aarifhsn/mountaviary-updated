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
    $featured_post = $featured_query->post;
    $is_featured_present = true;
  }
  wp_reset_postdata();
}

// Exclude featured from normal query
$exclude_ids = $is_featured_present ? [$featured_post->ID] : [];

$normal_query = new WP_Query([
  'post_type' => 'post',
  'post__not_in' => $exclude_ids,
  'posts_per_page' => get_theme_mod('homepage_posts_per_page', 30),
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
                    <div class="w-full h-full flex items-center justify-center bg-slate-100 dark:bg-slate-800">

                      <!-- Light mode logo -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="width:20%; opacity:0.2;"
                        class="block dark:hidden">
                        <g transform="translate(9, 9) scale(0.513, 0.513)">
                          <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                          <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                            d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                        </g>
                      </svg>

                      <!-- Dark mode logo -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="width:20%; opacity:0.2;"
                        class="hidden dark:block">
                        <g transform="translate(9, 9) scale(0.513, 0.513)">
                          <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                          <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                            d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                        </g>
                      </svg>

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
                  <?php echo get_the_date('M j, Y', $featured_post); ?>
                </span>
              </div>

              <h2
                class="text-2xl sm:text-3xl lg:text-4xl font-extrabold leading-tight my-3 text-slate-700 dark:text-slate-50">
                <a href="<?php echo esc_url(get_permalink($featured_post)); ?>"
                  class="no-underline hover:text-slate-600 dark:hover:text-slate-300 transition-colors">
                  <?php echo esc_html(get_the_title($featured_post)); ?>
                </a>
              </h2>

              <p class="text-sm leading-relaxed text-slate-500 dark:text-slate-400">
                <?php echo wp_trim_words(get_the_excerpt($featured_post), 150, '…'); ?>
              </p>

            </article>
            <?php wp_reset_postdata(); ?>
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
                        <div class="w-full h-full flex items-center justify-center bg-slate-100 dark:bg-slate-800">

                          <!-- Light mode logo -->
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="width:20%; opacity:0.2;"
                            class="block dark:hidden">
                            <g transform="translate(9, 9) scale(0.513, 0.513)">
                              <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                              <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                                d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                            </g>
                          </svg>

                          <!-- Dark mode logo -->
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="width:20%; opacity:0.2;"
                            class="hidden dark:block">
                            <g transform="translate(9, 9) scale(0.513, 0.513)">
                              <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                              <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                            </g>
                          </svg>

                        </div>
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
                      <?php echo get_the_date('M j, Y', $gp); ?>
                    </span>
                  </div>

                  <h3
                    class="text-xl sm:text-2xl lg:text-2xl font-extrabold text-md leading-snug text-slate-700 dark:text-slate-100">
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
            <h2 class="text-xl font-extrabold text-slate-700 dark:text-slate-50">Latest Posts</h2>
            <p class="text-sm mt-0.5 text-slate-400 dark:text-slate-500">Stay ahead with the freshest content and
              insights.</p>
          </div>
          <a href="<?php echo esc_url(get_pagenum_link(2)); ?>" class="no-underline text-xs font-bold uppercase flex items-center gap-1 transition-colors
              text-slate-500 dark:text-slate-400
              hover:text-slate-700 dark:hover:text-white" style="letter-spacing:1.5px; white-space:nowrap;">
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
                    <div class="w-full h-full flex items-center justify-center bg-slate-100 dark:bg-slate-800">

                      <!-- Light mode logo -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="width:20%; opacity:0.2;"
                        class="block dark:hidden">
                        <g transform="translate(9, 9) scale(0.513, 0.513)">
                          <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                          <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                            d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                        </g>
                      </svg>

                      <!-- Dark mode logo -->
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="width:20%; opacity:0.2;"
                        class="hidden dark:block">
                        <g transform="translate(9, 9) scale(0.513, 0.513)">
                          <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                          <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                            d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                        </g>
                      </svg>

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
                  <?php echo get_the_date('M j, Y', $lp); ?>
                </span>
              </div>

              <h3 class=" leading-snug text-slate-700 dark:text-slate-100">
                <a href="<?php echo esc_url(get_permalink($lp)); ?>"
                  class="text-xl md:text-2xl font-bold no-underline hover:text-slate-500 dark:hover:text-slate-300 transition-colors text-md">
                  <?php echo esc_html(get_the_title($lp)); ?>


                </a>
                <div class="mt-1 text-sm leading-6 text-slate-500 dark:text-slate-400">
                  <?php echo wp_trim_words(get_the_excerpt($lp), 150, '…'); ?>
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