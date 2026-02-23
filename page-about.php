<?php
/**
 * Template Name: About Page
 *
 * @package Mountaviary
 * @since Mountaviary 1.0.0
 */

get_header('topnav');

// Pull from customizer
$name = get_theme_mod('mountaviary_about_username_text', 'I\'m Arif');
$designation = get_theme_mod('mountaviary_about_user_designation', 'Freelance Web Developer');
$content = get_theme_mod('mountaviary_about_user_content', '');
$profile = get_theme_mod('mountavaiary_about_profile', '');
$resume = get_theme_mod('mountaviary_about_resume_link', '#');

$user_info = [
    ['label' => 'Birthday', 'key' => 'user_birthday', 'icon' => 'fa-solid fa-cake-candles'],
    ['label' => 'Age', 'key' => 'user_age', 'icon' => 'fa-solid fa-hourglass-half'],
    ['label' => 'Address', 'key' => 'user_address', 'icon' => 'fa-solid fa-location-dot'],
    ['label' => 'Email', 'key' => 'user_email', 'icon' => 'fa-solid fa-envelope'],
    ['label' => 'Phone', 'key' => 'user_phone', 'icon' => 'fa-solid fa-phone'],
    ['label' => 'Nationality', 'key' => 'user_nationality', 'icon' => 'fa-solid fa-flag'],
    ['label' => 'Study', 'key' => 'user_study', 'icon' => 'fa-solid fa-graduation-cap'],
    ['label' => 'Degree', 'key' => 'user_degree', 'icon' => 'fa-solid fa-award'],
    ['label' => 'Interest', 'key' => 'user_interest', 'icon' => 'fa-solid fa-heart'],
    ['label' => 'Freelance', 'key' => 'user_freelance', 'icon' => 'fa-solid fa-briefcase'],
];

$socials = [
    ['mod' => 'github_url', 'icon' => 'fa-brands fa-github', 'label' => 'GitHub'],
    ['mod' => 'twitter_url', 'icon' => 'fa-brands fa-x-twitter', 'label' => 'Twitter'],
    ['mod' => 'linkedin_url', 'icon' => 'fa-brands fa-linkedin-in', 'label' => 'LinkedIn'],
    ['mod' => 'whatsapp_url', 'icon' => 'fa-brands fa-whatsapp', 'label' => 'WhatsApp'],
    ['mod' => 'facebook_url', 'icon' => 'fa-brands fa-facebook-f', 'label' => 'Facebook'],
    ['mod' => 'instagram_url', 'icon' => 'fa-brands fa-instagram', 'label' => 'Instagram'],
    ['mod' => 'telegram_url', 'icon' => 'fa-brands fa-telegram', 'label' => 'Telegram'],
    ['mod' => 'youtube_url', 'icon' => 'fa-brands fa-youtube', 'label' => 'YouTube'],
];
?>

<main class="bg-white dark:bg-gray-950 min-h-screen font-poppins">
    <div style="max-width:1200px; margin:0 auto; padding:3rem 1.5rem 5rem;">

        <!-- ── SECTION 1: HERO ───────────────────────────────────── -->
        <div
            class="flex flex-col lg:flex-row gap-10 lg:gap-16 items-start pb-12 mb-12 border-b border-slate-100 dark:border-slate-800">

            <!-- Profile Photo -->
            <div class="flex-shrink-0 mx-auto lg:mx-0">
                <?php if ($profile): ?>
                    <div class="overflow-hidden rounded-2xl bg-slate-100 dark:bg-slate-800"
                        style="width:200px; height:220px;">
                        <img src="<?php echo esc_url($profile); ?>" alt="<?php echo esc_attr($name); ?>"
                            class="w-full h-full object-cover" />
                    </div>
                <?php else: ?>
                    <div class="rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center"
                        style="width:200px; height:220px;">
                        <span class="text-5xl font-extrabold text-slate-300 dark:text-slate-600 font-poppins">
                            AH
                        </span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Intro -->
            <div class="flex-1">

                <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-2"
                    style="letter-spacing:1.5px;">About me</p>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-slate-50 mb-2">
                    <?php echo esc_html($name); ?>
                </h1>

                <p class="text-sm font-semibold text-emerald-600 dark:text-emerald-400 mb-5">
                    <?php echo esc_html($designation); ?>
                </p>

                <?php if ($content): ?>
                    <p class="text-sm leading-7 text-slate-500 dark:text-slate-400 mb-6 max-w-xl">
                        <?php echo esc_html($content); ?>
                    </p>
                <?php endif; ?>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center gap-3 mb-6">
                    <?php if ($resume && $resume !== '#'): ?>
                        <a href="<?php echo esc_url($resume); ?>" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold no-underline transition-all
                bg-slate-900 dark:bg-slate-100
                text-white dark:text-slate-900
                hover:bg-slate-700 dark:hover:bg-white">
                            <i class="fa-solid fa-file-arrow-down text-xs"></i> Download CV
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold no-underline transition-all
              border border-slate-200 dark:border-slate-700
              text-slate-600 dark:text-slate-300
              hover:border-slate-400 dark:hover:border-slate-500
              hover:text-slate-900 dark:hover:text-white">
                        <i class="fa-solid fa-paper-plane text-xs"></i> Hire Me
                    </a>
                </div>

                <!-- Social Icons -->
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($socials as $s):
                        $url = get_theme_mod($s['mod']);
                        if ($url): ?>
                            <a href="<?php echo esc_url($url); ?>" target="_blank"
                                aria-label="<?php echo esc_attr($s['label']); ?>" class="w-9 h-9 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700
                  text-slate-400 dark:text-slate-500 text-sm
                  hover:text-slate-800 dark:hover:text-slate-200
                  hover:bg-slate-100 dark:hover:bg-slate-800
                  hover:border-slate-300 dark:hover:border-slate-600
                  transition-all no-underline">
                                <i class="<?php echo esc_attr($s['icon']); ?>"></i>
                            </a>
                        <?php endif; endforeach; ?>
                </div>

            </div>
        </div>

        <!-- ── SECTION 2: PERSONAL INFO ─────────────────────────── -->
        <?php
        $filled_info = array_filter($user_info, fn($item) => get_theme_mod($item['key']));
        if (!empty($filled_info)):
            ?>
            <div class="mb-12">
                <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-6"
                    style="letter-spacing:1.5px;">Personal Info</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    <?php foreach ($filled_info as $item):
                        $value = get_theme_mod($item['key']);
                        ?>
                        <div class="flex items-center gap-3 p-4 rounded-xl border border-slate-100 dark:border-slate-800
              hover:border-slate-200 dark:hover:border-slate-700 transition-colors">
                            <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-lg
                bg-slate-100 dark:bg-slate-800
                text-slate-400 dark:text-slate-500 text-xs">
                                <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600"
                                    style="font-size:9px; letter-spacing:1.5px;">
                                    <?php echo esc_html($item['label']); ?>
                                </p>
                                <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 truncate">
                                    <?php echo esc_html($value); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- ── SECTION 3: PAGE CONTENT (from WP editor) ─────────── -->
        <?php if (have_posts()):
            while (have_posts()):
                the_post();
                $page_content = get_the_content();
                if ($page_content):
                    ?>
                    <div class="pb-12 mb-12 border-b border-slate-100 dark:border-slate-800">
                        <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600 mb-6"
                            style="letter-spacing:1.5px;">More About Me</p>
                        <div class="single_content prose prose-slate dark:prose-invert max-w-none
          text-slate-700 dark:text-slate-300 leading-relaxed text-sm">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endif; endwhile; endif; ?>

        <!-- ── SECTION 4: LATEST POSTS ──────────────────────────── -->
        <?php
        $recent = new WP_Query(['posts_per_page' => 3, 'no_found_rows' => true]);
        if ($recent->have_posts()):
            ?>
            <div>
                <div class="flex items-center justify-between mb-6">
                    <p class="text-xs font-bold uppercase tracking-widest text-slate-300 dark:text-slate-600"
                        style="letter-spacing:1.5px;">Recent Writing</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xs font-bold uppercase tracking-widest no-underline transition-colors
              text-slate-400 dark:text-slate-500
              hover:text-slate-800 dark:hover:text-white" style="letter-spacing:1.5px;">
                        View All ›
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <?php while ($recent->have_posts()):
                        $recent->the_post();
                        $cats = get_the_category();
                        $thumb = get_the_post_thumbnail(null, 'medium', [
                            'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.04]'
                        ]);
                        ?>
                        <article class="group flex flex-col">
                            <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-xl mb-3 no-underline">
                                <div class="overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800"
                                    style="aspect-ratio:4/3;">
                                    <?php if ($thumb):
                                        echo $thumb;
                                    else: ?>
                                        <div class="w-full h-full flex items-center justify-center">
                                            <!-- Light mode logo -->
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                style="width:20%; opacity:0.2;" class="block dark:hidden">
                                                <g transform="translate(9, 9) scale(0.513, 0.513)">
                                                    <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M0.001,60.789c-0.035-1.043,0.688-1.877,1.143-2.73c1.366-2.564,2.773-5.168,4.073-7.799c0.877-1.774,1.632-3.578,2.682-5.266c1.522-2.443,2.786-5.109,4.123-7.748c1.328-2.621,2.551-5.293,3.974-7.896c0.907-1.66,1.74-3.559,2.781-5.115c1.132-1.693,2.556-2.883,5.066-3.031c1.251-0.072,2.631,0.051,4.023,0.051c2.819,0,5.181,0.096,8.146,0c0.917-0.029,3.203-0.285,3.477,0.397c0.23,0.572-0.667,1.922-0.993,2.533C33.044,34.4,27.843,44.621,22.402,54.879c-1.497,2.822-2.565,5.977-6.358,6.408c-1.579,0.178-3.569,0.088-5.513,0.049c-2.601-0.051-5.559-0.049-8.245-0.049C1.479,61.287,0.464,61.498,0.001,60.789z" />
                                                    <path fill="#0F172A" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M59.852,60.84c-0.643,0.906-2.301,0.648-3.725,0.596c-2.814-0.105-5.394-0.051-8.344-0.051c-1.988,0-4.132,0.225-5.563-0.348c-2.343-0.936-3.468-3.621-4.619-5.91c-0.661-1.314-1.435-2.611-2.136-3.873c-0.689-1.24-1.352-2.598-2.086-3.975C33.049,46.66,32.7,46,32.336,45.293c-0.449-0.869-1.65-2.438-0.199-2.682c1.135-0.191,2.587,0,3.924,0c2.558,0,5.311-0.101,7.848,0c2.417,0.096,4.574-0.219,6.159,0.744c1.861,1.131,2.852,3.371,3.725,5.414c0.437,1.024,1.022,2.033,1.54,3.029c1.026,1.978,2.035,3.959,3.08,5.961C58.934,58.76,59.591,59.713,59.852,60.84z" />
                                                </g>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                style="width:20%; opacity:0.2;" class="hidden dark:block">
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

                            <div class="flex items-center gap-1.5 mb-1.5">
                                <?php if (!empty($cats)): ?>
                                    <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>" class="inline-block px-2 py-0.5 rounded-md no-underline font-bold uppercase transition-colors
                      text-emerald-700 dark:text-emerald-400
                      bg-emerald-50 dark:bg-emerald-950
                      border border-emerald-200 dark:border-emerald-800
                      hover:bg-emerald-100 dark:hover:bg-emerald-900" style="font-size:10px; letter-spacing:1.5px;">
                                        <?php echo esc_html($cats[0]->name); ?>
                                    </a>
                                    <span class="text-slate-200 dark:text-slate-700">·</span>
                                <?php endif; ?>
                                <span class="text-xs text-slate-400 dark:text-slate-500">
                                    <?php the_date('F j, Y'); ?>
                                </span>
                            </div>

                            <h3 class="font-bold leading-snug text-slate-900 dark:text-slate-100" style="font-size:14px;">
                                <a href="<?php the_permalink(); ?>"
                                    class="no-underline hover:text-slate-500 dark:hover:text-slate-300 transition-colors">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>