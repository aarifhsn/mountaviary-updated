<?php
/* 
 * Template Name: Custom Front Page 
 */

get_header('part'); ?>

<?php if (get_option('front_page_user_info', 1)) { ?>
  <section id="home"
    class="devs_top_info min-h-[480px] md:min-h-screen flex justify-center items-center text-start px-4 lg:px-16 xl:px-32 2xl:px-12 pt-24 md:py-0 mb-12 md:my-2 bg-contain bg-center bg-no-repeat relative">
    <div class="devs_top_content w-4/5 md:w-5/6 lg:w-full">
      <h4 class="absolute top-0 right-4 font-semibold text-xs dark:text-white">🟢 Available <span
          class="text-blue-600">for</span> <span class="text-red-600">Remote</span> Work
      </h4>
      <h2 class="relative text-3xl md:text-5xl 2xl:text-6xl text-slate-700 dark:text-slate-300 font-extrabold ">
        <span
          class=" text-slate-500 text-xl md:text-2xl 2xl:text-4xl block"><?php echo esc_html(get_theme_mod('mountaviary_front_span_text')); ?></span>
        <span class="relative block mt-6"><?php echo esc_html(get_theme_mod('mountaviary_front_name_text')); ?></span>
        <!-- <span class="text-slate-400 text-2xl block mt-2">Building Scalable SaaS & Modern Web Apps</span> -->
      </h2>

      <p
        class="text-left text-xs lg:text-sm text-gray-500 dark:text-gray-300 my-3 md:my-6 font-medium leading-6 lg:leading-9 font-poppins">
        <?php echo esc_html(get_theme_mod('mountaviary_front_content')); ?>
      </p>

      <!-- Tech Stack -->
      <div class="flex flex-col sm:flex-row items-start gap-4 my-8">
        <div class="flex-shrink-0">
          <span class="text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase tracking-wide">⚡ Tech Stack</span>
        </div>
        <div class="flex flex-wrap gap-2">
          <?php
          $tech_stack = ['Laravel', 'React', 'NextJS', 'TypeScript', 'GraphQL', 'Docker', 'Prisma', 'WordPress', 'PHP', 'Tailwind', 'VUe JS', 'Alpine', 'Vanilla JS'];
          $limit = 6;
          $count = 0;

          foreach ($tech_stack as $stack) {
            $count++;
            // Add a hidden class for items beyond the limit
            $hiddenClass = ($count > $limit) ? 'hidden extra-stack' : '';
            echo '<span class="px-3 py-2 bg-gray-100 border border-gray-100 dark:border-gray-700 rounded-lg dark:bg-transparent dark:text-slate-200 text-sm font-semibold text-gray-700 hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-200 dark:hover:from-gray-800 dark:hover:to-gray-700 transition-all duration-300 whitespace-nowrap ' . $hiddenClass . '">' . $stack . '</span>';
          }
          ?>

          <?php if (count($tech_stack) > $limit): ?>
            <button id="toggleStackBtn"
              class="px-3 py-2 text-xs font-semibold text-gray-600 border-0 rounded-lg hover:bg-gray-600 hover:text-white transition-all duration-300">
              Show More...
            </button>
          <?php endif; ?>
        </div>
      </div>

      <div class="person_social_info mt-12">
        <?php if (get_option('front_work_portfolio_option', 1)) { ?>
          <div class="cont_marge flex my-8 text-slate-600 dark:text-slate-300">
            <h3 class="hello">
              <a class="p-4 font-semibold border hover:border-slate-600 dark:hover:border-slate-400 hover:text-slate-800 dark:hover:text-slate-100 border-slate-300 dark:border-slate-600 border-solid relative rounded"
                href="#contact">Let’s Work Together
              </a>
            </h3>
            <h3 class="my_work">
              <a class="px-7 py-4 font-semibold hover:text-slate-800 dark:hover:text-slate-100" href="#portfolio">View
                Projects
                <span class="ml-2 -rotate-45 absolute text-xs"><i class="fa-solid fa-arrow-right"></i></span>
              </a>
            </h3>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
<?php } ?>
<!--end devs_top_info-->

<!-- ABOUT SECTION -->
<section id="about" class="bg-gray-100 dark:bg-gray-900 py-16 lg:py-24 px-4">

  <div class="text-center mb-16">
    <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-100 uppercase">
      About Me
    </h2>
    <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold leading-8">
      Developer. Problem Solver. Available for Remote Work.
    </p>
  </div>


  <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-start font-poppins">

    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700">

      <!-- Tech tags — matches hero section tag style -->
      <div class="flex flex-wrap gap-2 mb-6">
        <span
          class="px-3 py-2 bg-gray-100 border border-gray-200 dark:border-gray-700 rounded-lg dark:bg-transparent dark:text-slate-200 text-sm font-semibold text-gray-700">Laravel</span>
        <span
          class="px-3 py-2 bg-gray-100 border border-gray-200 dark:border-gray-700 rounded-lg dark:bg-transparent dark:text-slate-200 text-sm font-semibold text-gray-700">React</span>
        <span
          class="px-3 py-2 bg-gray-100 border border-gray-200 dark:border-gray-700 rounded-lg dark:bg-transparent dark:text-slate-200 text-sm font-semibold text-gray-700">Next.js</span>
        <span
          class="px-3 py-2 bg-gray-100 border border-gray-200 dark:border-gray-700 rounded-lg dark:bg-transparent dark:text-slate-200 text-sm font-semibold text-gray-700">WordPress</span>
      </div>

      <!-- Heading -->
      <h3 class="text-2xl md:text-3xl font-bold text-slate-800 dark:text-slate-100 leading-tight mb-4">
        I build web apps that are ready for real users — not just demos.
      </h3>

      <!-- Client-focused paragraph -->
      <p class="text-sm leading-7 text-slate-500 dark:text-slate-400 mb-6">
        I help startups and growing businesses turn ideas into fast, reliable web applications.
        My core stack is <strong class="text-slate-700 dark:text-slate-200">Laravel + React</strong> for SaaS platforms,
        dashboards, and API-driven systems — with 6+ years of hands-on experience shipping
        production-ready solutions using Next.js, GraphQL, Docker, and WordPress.
      </p>

      <!-- Value bullets — clean, no colored dots -->
      <ul class="space-y-3 text-sm text-slate-500 dark:text-slate-400 mb-8 leading-7">
        <li class="flex items-start gap-3">
          <span class="text-green-500 font-bold mt-0.5">✓</span>
          Clean, maintainable architecture built to scale with your product
        </li>
        <li class="flex items-start gap-3">
          <span class="text-green-500 font-bold mt-0.5">✓</span>
          SaaS platforms, internal dashboards, and client-facing web apps
        </li>
        <li class="flex items-start gap-3">
          <span class="text-green-500 font-bold mt-0.5">✓</span>
          API integrations, performance tuning, and full deployment setup
        </li>
      </ul>
    </div>

    <div class="flex flex-col gap-6">

      <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700">

        <h4 class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-4">
          Currently Focused On
        </h4>
        <p class="text-xl font-bold text-slate-800 dark:text-slate-100 mb-6">
          SaaS & Full‑Stack Product Development
        </p>

        <div class="space-y-4 text-sm">
          <div class="flex justify-between items-center border-b border-slate-100 dark:border-slate-700 pb-3">
            <span class="text-slate-500 dark:text-slate-400">Backend</span>
            <span class="font-semibold text-slate-700 dark:text-slate-200">Laravel, REST APIs</span>
          </div>
          <div class="flex justify-between items-center border-b border-slate-100 dark:border-slate-700 pb-3">
            <span class="text-slate-500 dark:text-slate-400">Frontend</span>
            <span class="font-semibold text-slate-700 dark:text-slate-200">React, Next.js</span>
          </div>
          <div class="flex justify-between items-center border-b border-slate-100 dark:border-slate-700 pb-3">
            <span class="text-slate-500 dark:text-slate-400">DevOps</span>
            <span class="font-semibold text-slate-700 dark:text-slate-200">Docker, Deployments</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-slate-500 dark:text-slate-400">CMS</span>
            <span class="font-semibold text-slate-700 dark:text-slate-200">WordPress Engineering</span>
          </div>
        </div>
      </div>

      <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700">
        <div class="grid grid-cols-3 gap-4 text-center">
          <div>
            <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">6+</div>
            <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Years
              Exp.</div>
          </div>
          <div class="border-x border-slate-100 dark:border-slate-700">
            <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">40+</div>
            <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Projects
            </div>
          </div>
          <div>
            <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">100%</div>
            <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Remote
              Ready</div>
          </div>
        </div>
      </div>

      <!-- Availability badge -->
      <div
        class="bg-white dark:bg-slate-800 px-6 py-4 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700 flex items-center gap-3">
        <span class="text-lg">🟢</span>
        <div>
          <p class="text-sm font-semibold text-slate-800 dark:text-slate-100">Available for Freelance & Remote Work</p>
          <p class="text-xs text-slate-400 dark:text-slate-500">Open to full-time roles too — let's talk</p>
        </div>
        <a href="#contact"
          class="ml-auto text-xs font-semibold text-slate-600 dark:text-slate-300 border border-slate-300 dark:border-slate-600 px-3 py-1.5 rounded hover:border-slate-600 dark:hover:border-slate-300 transition-all whitespace-nowrap">
          Hire Me →
        </a>
      </div>

    </div>
  </div>
</section>
<!-- END ABOUT SECTION -->



<?php if (get_option('mountaviary_show_about_option', true)) { ?>
  <!--ABOUT SECTION-->
  <section id="" class="devs_about min-h-[480px] md:min-h-screen my-20 md:my-2 lg:mb-24 transition-all px-4">
    <div class="page_title my-4">
      <h3
        class="bg-slate-200 px-4 py-2 inline-block font-bold text-2xl text-slate-700 tracking-wider  uppercase border-l-4 border-solid border-l-red-500">
        DEV'S INFO
      </h3>
    </div>

    <div class="about_photo overflow-hidden ">
      <div class="about_photo_single grid grid-cols-2 relative ">
        <div class="flex justify-center items-center bg-bg-about bg-cover h-full ">
          <div class="my-2 font-poppins pl-10"><span
              class="block text-sm font-bold text-slate-400  uppercase ">Hello</span>
            <h3
              class="-mr-10 font-bold text-4xl md:text-6xl lg:text-8xl text-slate-100 z-40 relative tracking-wide block max-w-max ">
              <?php echo esc_html(get_theme_mod('mountaviary_about_username_text', 'I\'m Arif')); ?>
            </h3>
            <h5 class="text-slate-100 w-full sm:w-4/5">
              <?php echo esc_html(get_theme_mod('mountaviary_about_user_designation', 'A Freelance Web Developer. From Bangladesh')); ?>
            </h5>
          </div>
        </div>
        <div class="about_content">
          <img class="w-full h-auto"
            src="<?php echo esc_url(get_theme_mod('mountavaiary_about_profile', 'https://pixabay.com/get/g5d98e04901ad7b021a34314a0d48208c294242157632fc16dcd54a7f63dc784f3526f53aaa2668ed249f1fcca1912a3b50c6e2e55434a7159df6946739d2faf9_1280.png')); ?>"
            alt="pixabay" />
          <div class="author_info_text text-slate-600 bg-slate-200 font-medium leading-7 p-4 pt-7">
            <p>
              <?php echo esc_html(get_theme_mod('mountaviary_about_user_content', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.')); ?>
            </p>
            <h5 class="text-xs text-slate-100 font-semibold  mt-8 uppercase"><a
                class="p-4 inline-block bg-slate-800 hover:text-red-500 transition-all"
                href="<?php echo esc_url(get_theme_mod('mountaviary_about_resume_link')); ?>" target="_blank">View
                Resume</a></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="about_info my-4">
      <div class="about_content my-4 md:my-6 py-3 md:py-7 font-poppins">
        <div class="about_content_list mt-8 border-t-2 border-slate-300 p-0 sm:p-1 md:p-9 pt-12 leading-8 text-sm">
          <div class="left_list mt-8 md:mt-0">
            <ul class="columns-1 sm:columns-2 gap-0 sm:gap-x-6 md:gap-x-12">
              <?php
              $user_birthday = get_theme_mod('user_birthday');
              $user_age = get_theme_mod('user_age');
              $user_address = get_theme_mod('user_address');
              $user_email = get_theme_mod('user_email');
              $user_phone = get_theme_mod('user_phone');
              $user_nationality = get_theme_mod('user_nationality');
              $user_study = get_theme_mod('user_study');
              $user_degree = get_theme_mod('user_degree');
              $user_interest = get_theme_mod('user_interest');
              $user_freelance = get_theme_mod('user_freelance');

              $items = [
                'Birthday' => $user_birthday,
                'Age' => $user_age,
                'Address' => $user_address,
                'Email' => $user_email,
                'Phone' => $user_phone,
                'Nationality' => $user_nationality,
                'Study' => $user_study,
                'Degree' => $user_degree,
                'Interest' => $user_interest,
                'Freelance' => $user_freelance,
              ];
              foreach ($items as $label => $value) {
                if (!empty($value))
                  echo "<li><span class=\"min-w-[100px] mr-2 inline-block font-bold\">$label:</span><span class=\"text-slate-500\">$value</span></li>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>


<!--PORTFOLIO SECTION-->
<?php if (get_option('mountaviary_show_portfolio_option', true)) { ?>
  <?php
  // Get all portfolio categories
  $terms = get_terms([
    'taxonomy' => 'portfolio_category',
    'hide_empty' => true
  ]);

  // Find Laravel category or use first category as default
  $default_category = 'laravel'; // default slug
  $category_exists = false;
  if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
      if ($term->slug === 'laravel') {
        $category_exists = true;
        break;
      }
    }
    // If laravel doesn't exist, use first category
    if (!$category_exists && !empty($terms)) {
      $default_category = $terms[0]->slug;
    }
  }

  // Get only Laravel (or default category) projects - 6 max
  $args = array(
    'post_type' => 'mav_portfolio',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
  );
  $portfolio_query = new WP_Query($args);

  // Get total count for this category
  $total_count_args = array(
    'post_type' => 'mav_portfolio',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  );
  $total_query = new WP_Query($total_count_args);
  $total_projects = $total_query->found_posts;
  wp_reset_postdata();

  if ($portfolio_query->have_posts()):
    ?>

    <section id="portfolio" x-data="{ activeFilter: '<?php echo esc_js($default_category); ?>' }"
      class="relative portfolio_area min-h-screen py-12 px-4 bg-gray-200 dark:bg-gray-900">

      <!-- Section Header with Count -->
      <div class="text-center mb-12">
        <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-100 uppercase">
          <?php echo esc_html(get_theme_mod('mountaviary_portfolio_title_text', 'Recent Projects')); ?>
        </h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold">
          Showing <?php echo $portfolio_query->found_posts; ?> of <?php echo $total_projects; ?>
          <span class="capitalize"><?php echo str_replace('-', ' ', $default_category); ?></span> projects
        </p>
      </div>

      <!-- Category Filter Buttons (NO "All" button) -->
      <?php if ($terms && !is_wp_error($terms)): ?>
        <div class="flex flex-wrap justify-center gap-3 mb-12">
          <?php foreach ($terms as $term): ?>
            <button @click="activeFilter = '<?php echo esc_attr($term->slug); ?>'"
              :class="activeFilter === '<?php echo esc_attr($term->slug); ?>' ? 'bg-slate-800 dark:bg-slate-700 text-white' : 'bg-gray-300 dark:bg-slate-600 text-gray-800 dark:text-slate-200'"
              class="px-5 py-2.5 rounded-lg text-xs font-semibold uppercase tracking-wide transition-all duration-200 hover:bg-slate-700 hover:text-white">
              <?php echo esc_html($term->name); ?>
            </button>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <!-- Portfolio Grid -->
      <div class="portfolio_page max-w-6xl mx-auto">
        <?php while ($portfolio_query->have_posts()):
          $portfolio_query->the_post();

          // Get categories for this post
          $categories = get_the_terms(get_the_ID(), 'portfolio_category');
          $cat_slugs = [];
          if ($categories && !is_wp_error($categories)) {
            foreach ($categories as $cat) {
              $cat_slugs[] = $cat->slug;
            }
          }
          $cat_slugs_string = implode(' ', $cat_slugs);

          // Get tech stack tags
          $tags = get_the_terms(get_the_ID(), 'portfolio_tech_stack');
          ?>

          <div x-show="'<?php echo esc_attr($cat_slugs_string); ?>'.split(' ').includes(activeFilter)"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 scale-95"
            class="single_port bg-white dark:bg-slate-800 flex-col lg:flex-row flex items-center gap-6 py-12 px-4 lg:pr-4 rounded-2xl my-12 shadow-md border border-gray-100 dark:border-slate-700 relative group">

            <!-- Project Image -->
            <div class="relative w-full lg:w-1/2">
              <div class="h-80 lg:h-96 relative overflow-hidden rounded-xl">
                <?php if (has_post_thumbnail()): ?>
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array(
                    'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105'
                  )); ?>
                <?php else: ?>
                  <div
                    class="w-full h-full bg-gradient-to-br from-slate-200 to-slate-300 dark:from-slate-700 dark:to-slate-800 flex items-center justify-center">
                    <span class="text-slate-400 dark:text-slate-500 text-4xl">📁</span>
                  </div>
                <?php endif; ?>
              </div>

              <?php
              $portfolio_link = get_post_meta(get_the_ID(), 'project-link', true);
              if (!empty($portfolio_link)):
                ?>
                <!-- Overlay with View Project button -->
                <div
                  class="absolute inset-0 flex items-center justify-center bg-slate-900/80 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-all duration-300 rounded-xl">
                  <a href="<?php echo esc_url($portfolio_link); ?>" target="_blank"
                    class="px-6 py-3 bg-white hover:bg-gray-500 text-slate-900 hover:text-white font-bold text-sm uppercase tracking-wide rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    View Project →
                  </a>
                </div>
              <?php endif; ?>
            </div>

            <!-- Project Details -->
            <div class="w-full lg:w-1/2 space-y-4">

              <!-- Project Category Badge -->
              <?php if ($categories && !is_wp_error($categories)): ?>
                <div
                  class="inline-block bg-slate-100 dark:bg-slate-700 rounded-lg px-4 py-2 text-xs font-bold text-slate-700 dark:text-slate-200 uppercase tracking-wider">
                  <?php echo esc_html($categories[0]->name); ?>
                </div>
              <?php endif; ?>

              <!-- Project Title -->
              <h3 class="text-2xl lg:text-3xl font-bold text-slate-900 dark:text-white leading-tight">
                <?php the_title(); ?>
              </h3>

              <!-- Project Description -->
              <?php
              $project_description = get_post_meta(get_the_ID(), 'project_description', true);
              if (!empty($project_description)):
                ?>
                <div class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                  <?php echo wp_kses_post($project_description); ?>
                </div>
              <?php endif; ?>

              <!-- Tech Stack -->
              <?php if ($tags && !is_wp_error($tags)): ?>
                <div class="space-y-3">
                  <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">⚡ Tech
                      Stack</span>
                  </div>
                  <div class="flex flex-wrap gap-2">
                    <?php foreach ($tags as $tag): ?>
                      <span
                        class="px-3 py-1.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-lg text-xs font-semibold text-slate-700 dark:text-slate-300 hover:border-gray-400 dark:hover:border-gray-500 hover:text-gray-600 dark:hover:text-gray-400 transition-all duration-200">
                        <?php echo esc_html($tag->name); ?>
                      </span>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>

              <!-- Key Features -->
              <div class="space-y-3">
                <div class="flex items-center gap-2">
                  <span class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Key
                    Features</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                  <?php
                  $custom_features = get_post_meta(get_the_ID(), 'project_features', true);
                  $features = !empty($custom_features) ? explode(',', $custom_features) : [
                    'Responsive Design',
                    'Custom Development',
                    'Performance Optimization',
                    'Modern UI/UX'
                  ];

                  foreach (array_slice($features, 0, 6) as $feature):
                    ?>
                    <div class="flex items-start gap-2 text-slate-600 dark:text-slate-400 text-xs">
                      <span class="text-green-500 font-bold mt-0.5">✓</span>
                      <span><?php echo trim(esc_html($feature)); ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>

            </div>
          </div>
        <?php endwhile; ?>
      </div>

      <!-- View All Projects Button -->
      <?php if ($total_projects > 6): ?>
        <div class="flex justify-center mt-16">
          <a href="<?php echo esc_url(get_post_type_archive_link('mav_portfolio')); ?>"
            class="group inline-flex items-center gap-3 bg-slate-800 dark:bg-slate-700 hover:bg-gray-500 dark:hover:bg-gray-500 text-white font-bold text-sm uppercase tracking-wide px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
            <span>View All Projects</span>
            <span class="transform group-hover:translate-x-1 transition-transform duration-300">→</span>
          </a>
        </div>
      <?php endif; ?>

    </section>

  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
<?php } ?>
<!-- END OF PORTFOLIO SECTION -->

<!-- SERVICES SECTION -->
<?php if (get_option('mountaviary_show_service_option', true)) { ?>
  <?php
  $args = array('post_type' => 'mav_service', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC');
  $services_query = new WP_Query($args);

  if ($services_query->have_posts()):
    ?>

    <section id="service" class="font-poppins services_area bg-gray-100 dark:bg-gray-900 py-16 lg:py-24 px-4">

      <!-- Section Header — matches Portfolio/About/Blog pattern -->
      <div class="text-center mb-16">
        <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-100 uppercase">
          <?php echo esc_html(get_theme_mod('mountaviary_service_title_text', 'Services')); ?>
        </h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold leading-8">
          <?php echo esc_html(get_theme_mod('mountaviary_services_subtitle', 'What I Can Build For You')); ?>
        </p>
      </div>

      <!-- Services Grid -->
      <div class="services_page grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <?php while ($services_query->have_posts()):
          $services_query->the_post();
          $services_icon = get_post_meta($post->ID, 'service-icon', true);
          ?>
          <div
            class="single_serve bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-gray-400 dark:border-slate-700 flex flex-col gap-4">

            <!-- Icon + Title row -->
            <div class="flex items-center gap-4">
              <?php if (!empty($services_icon)) { ?>
                <div
                  class="service_icon flex-shrink-0 w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center text-slate-700 dark:text-slate-200 text-lg">
                  <span class="dashicons <?php echo esc_attr($services_icon); ?>"></span>
                </div>
              <?php } ?>

              <h3 class="services_title text-lg font-semibold text-slate-800 dark:text-slate-100 leading-7 flex-1">
                <a class="capitalize hover:text-red-500 transition-colors duration-200" href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </h3>
            </div>

            <!-- Divider -->
            <div class="border-t border-slate-100 dark:border-slate-700"></div>

            <!-- Description -->
            <p class="services_content text-sm leading-7 text-slate-500 dark:text-slate-400 font-normal">
              <?php echo wp_trim_words(get_the_content(), 15, '...'); ?>
            </p>

          </div>
        <?php endwhile; ?>
      </div>

      <!-- Stats strip — mirrors About section stats card -->
      <div class="max-w-6xl mx-auto mt-10">
        <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
              <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">6+</div>
              <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Years
                Experience</div>
            </div>
            <div class="border-x border-slate-100 dark:border-slate-700">
              <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">40+</div>
              <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Projects
                Delivered</div>
            </div>
            <div class="border-r border-slate-100 dark:border-slate-700">
              <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">100%</div>
              <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Remote
                Ready</div>
            </div>
            <div>
              <div class="text-3xl font-extrabold text-slate-800 dark:text-slate-100">🟢</div>
              <div class="text-xs text-slate-400 dark:text-slate-500 mt-1 font-semibold uppercase tracking-wide">Available
                Now</div>
            </div>
          </div>
        </div>
      </div>

    </section>

  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

<?php } ?>
<!-- END SERVICES AREA -->


<!-- BLOG SECTION  -->

<?php if (get_option('mountaviary_show_blog_option', true)) { ?>
  <?php
  $args = array('post_type' => 'post', 'posts_per_page' => get_theme_mod('front_blog_post_count'), 'ignore_sticky_posts' => 1);
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()):
    ?>
    <section id="blog"
      class="bg-gray-100 dark:bg-gray-900 px-4 py-12 font-poppins blog_posts min-h-[480px] md:min-h-screen my-20 md:mb-12 lg:mb-24">

      <!-- Section Header -->
      <div class="text-center mb-16">
        <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-200 uppercase">
          <?php echo esc_html(get_theme_mod('mountaviary_blog_title_text', 'Blog Posts')); ?>
        </h2>
      </div>

      <div class="blog_info_area blog-grid block">

        <?php while ($the_query->have_posts()):
          $the_query->the_post(); ?>

          <div class="blog-post bg-white dark:bg-gray-800 shadow-sm mb-8 rounded-lg box-border ">

            <?php if (has_post_thumbnail()): ?>
              <div class="thumbnail overflow-hidden">
                <a href="<?php the_permalink(); ?>">
                  <?php echo the_post_thumbnail('medium', array('class' => 'w-full h-auto hover:scale-110 duration-300 rounded-t-lg')); ?>
                </a>
              </div>
            <?php endif; ?>

            <div class="post_title pt-2 mt-2 text-xl px-8">
              <?php
              the_title('<h2 class="entry-title"><a class="font-semibold text-slate-700 dark:text-slate-100 leading-8 hover:text-slate-900" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            </div>
            <div class="author_info block md:flex items-center gap-x-2 gap-y-4 py-2 mt-2 px-8">
              <?php echo get_avatar(get_the_author_meta('ID'), $size = '28', $default = '', $alt = '', $args = array('class' => 'author_photo rounded-full')); ?>
              <h4
                class="author_name text-slate-500 dark:text-slate-300 hover:text-slate-900 dark:hover:text-slate-400 mr-3 text-xs font-bold">
                <?php the_author_posts_link(); ?>
              </h4>
              <h5 class="post_date text-slate-500 dark:text-slate-300 text-xs"><?php the_date('M d, Y'); ?></h5>
              <div>
                <ul class="post-categories block md:flex gap-2">
                  <?php
                  $categories = get_the_category();
                  if (!empty($categories)) {
                    foreach ($categories as $index => $category) {
                      $category_link = get_category_link($category->term_id);
                      echo '<li class="category-item category-' . esc_attr($index) . '">
                                        <a class="text-sm bg-slate-200 dark:bg-slate-900 py-1 px-2 rounded text-slate-700 dark:text-slate-300 hover:text-slate-900" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>
                                      </li>';
                    }
                  }
                  ?>
                </ul>
              </div>
            </div>
            <div class="blog_content py-3 px-8">
              <h4 class="text-sm font-normal leading-8 text-slate-500 dark:text-slate-300 hover:text-slate-950 mb-2">
                <?php the_excerpt(); ?>
              </h4>
            </div>
          </div>

        <?php endwhile; ?>

      </div>
    </section>

  <?php endif; ?>
  <!-- reset global post variable. After this point, we are back to the Main Query object -->
  <?php wp_reset_postdata(); ?>
<?php } ?>

<!-- CONTACT SECTION -->
<?php if (get_option('mountaviary_show_contact_option', true)) { ?>
  <section id="contact" class="font-poppins contact_section bg-gray-100 dark:bg-gray-900 py-16 lg:py-24 px-4">

    <!-- Section Header -->
    <div class="text-center mb-16">
      <h2 class="text-5xl font-bold mb-4 text-gray-800 dark:text-gray-100 uppercase">
        <?php echo esc_html(get_theme_mod('mountaviary_front_contact_page_title', 'Get In Touch')); ?>
      </h2>
      <p class="text-slate-500 dark:text-slate-400 text-sm font-semibold leading-8">
        Have a project in mind? I'm available and ready to help — reach out any way you prefer.
      </p>
    </div>

    <div class="max-w-6xl mx-auto space-y-6">

      <?php
      // Pull existing social/contact theme mods for quick-action buttons
      $whatsapp_url = get_theme_mod('whatsapp_url');
      $telegram_url = get_theme_mod('telegram_url');
      $email_url = get_theme_mod('email_url');
      $linkedin_url = get_theme_mod('linkedin_url');
      $github_url = get_theme_mod('github_url');
      ?>

      <!-- ── QUICK ACTIONS ROW ── -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

        <?php if ($whatsapp_url): ?>
          <a href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', $whatsapp_url)); ?>" target="_blank"
            class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 hover:border-green-400 dark:hover:border-green-500 rounded-2xl p-6 flex items-center gap-4 shadow-md hover:shadow-lg transition-all duration-300 group">
            <div
              class="w-12 h-12 bg-green-50 dark:bg-green-900/30 rounded-full flex items-center justify-center flex-shrink-0 text-xl group-hover:scale-110 transition-transform duration-300">
              💬
            </div>
            <div>
              <div class="text-xs text-slate-400 dark:text-slate-500 uppercase tracking-wide font-semibold mb-0.5">Fastest
                Reply</div>
              <div class="text-sm font-bold text-slate-800 dark:text-slate-100">WhatsApp Me</div>
              <div class="text-xs text-slate-400 dark:text-slate-500">Usually within 1 hour</div>
            </div>
          </a>
        <?php endif; ?>

        <?php
        $cont_email = get_theme_mod('mountaviary_front_contact_page_email') ?: $email_url;
        if ($cont_email): ?>
          <a href="mailto:<?php echo esc_attr($cont_email); ?>"
            class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 hover:border-slate-400 dark:hover:border-slate-400 rounded-2xl p-6 flex items-center gap-4 shadow-md hover:shadow-lg transition-all duration-300 group">
            <div
              class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center flex-shrink-0 text-xl group-hover:scale-110 transition-transform duration-300">
              ✉️
            </div>
            <div>
              <div class="text-xs text-slate-400 dark:text-slate-500 uppercase tracking-wide font-semibold mb-0.5">Email Me
              </div>
              <div class="text-sm font-bold text-slate-800 dark:text-slate-100 truncate max-w-[150px]">
                <?php echo esc_html($cont_email); ?>
              </div>
              <div class="text-xs text-slate-400 dark:text-slate-500">Detailed project discussion</div>
            </div>
          </a>
        <?php endif; ?>

        <?php if ($telegram_url): ?>
          <a href="<?php echo esc_url($telegram_url); ?>" target="_blank"
            class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 hover:border-blue-400 dark:hover:border-blue-500 rounded-2xl p-6 flex items-center gap-4 shadow-md hover:shadow-lg transition-all duration-300 group">
            <div
              class="w-12 h-12 bg-blue-50 dark:bg-blue-900/30 rounded-full flex items-center justify-center flex-shrink-0 text-xl group-hover:scale-110 transition-transform duration-300">
              <i class="fa-brands fa-telegram text-blue-400"></i>
            </div>
            <div>
              <div class="text-xs text-slate-400 dark:text-slate-500 uppercase tracking-wide font-semibold mb-0.5">Telegram
              </div>
              <div class="text-sm font-bold text-slate-800 dark:text-slate-100">Message Me</div>
              <div class="text-xs text-slate-400 dark:text-slate-500">Quick & async friendly</div>
            </div>
          </a>
        <?php endif; ?>

        <?php if ($linkedin_url): ?>
          <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank"
            class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 hover:border-blue-600 dark:hover:border-blue-400 rounded-2xl p-6 flex items-center gap-4 shadow-md hover:shadow-lg transition-all duration-300 group">
            <div
              class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 rounded-full flex items-center justify-center flex-shrink-0 text-xl group-hover:scale-110 transition-transform duration-300">
              <i class="fa-brands fa-linkedin-in text-blue-600 dark:text-blue-400"></i>
            </div>
            <div>
              <div class="text-xs text-slate-400 dark:text-slate-500 uppercase tracking-wide font-semibold mb-0.5">LinkedIn
              </div>
              <div class="text-sm font-bold text-slate-800 dark:text-slate-100">Connect With Me</div>
              <div class="text-xs text-slate-400 dark:text-slate-500">Professional inquiries</div>
            </div>
          </a>
        <?php endif; ?>

      </div>
      <!-- ── END QUICK ACTIONS ── -->

      <!-- ── AVAILABILITY BADGE ── -->
      <div
        class="bg-white dark:bg-slate-800 px-6 py-4 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700 flex flex-col sm:flex-row items-start sm:items-center gap-3">
        <span class="text-lg">🟢</span>
        <div class="flex-1">
          <p class="text-sm font-bold text-slate-800 dark:text-slate-100">Currently available for new projects</p>
          <p class="text-xs text-slate-400 dark:text-slate-500">Open to freelance contracts, long-term collaborations, and
            full-time remote roles</p>
        </div>
        <?php if ($github_url): ?>
          <a href="<?php echo esc_url($github_url); ?>" target="_blank"
            class="text-xs font-semibold text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-600 px-3 py-1.5 rounded hover:border-slate-500 dark:hover:border-slate-300 transition-all whitespace-nowrap flex items-center gap-1.5">
            <i class="fa-brands fa-github"></i> GitHub
          </a>
        <?php endif; ?>
      </div>
      <!-- ── END AVAILABILITY BADGE ── -->

      <!-- ── MAIN CONTACT AREA: Form + Info ── -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Contact Form — 2/3 width -->
        <div
          class="lg:col-span-2 bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700">
          <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 mb-1">Send a Message</h3>
          <p class="text-xs text-slate-400 dark:text-slate-500 mb-6">Fill out the form below and I'll get back to you
            within 24 hours.</p>
          <div class="contact_form text-slate-500 leading-8">
            <?php
            $contact_form_shortcode = get_theme_mod('mountaviary_contact_form');
            echo do_shortcode($contact_form_shortcode);
            ?>
          </div>
        </div>

        <!-- Info + Map — 1/3 width -->
        <div class="flex flex-col gap-6">

          <!-- Contact Info card -->
          <?php if (get_option('mountaviary_show_user_info_option', true)):
            $user_cont_phone = get_theme_mod('mountaviary_front_contact_page_phone');
            $user_cont_address = get_theme_mod('mountaviary_front_contact_page_location_text');
            $user_cont_email = get_theme_mod('mountaviary_front_contact_page_email');
            $info_items = [
              ['label' => 'Phone / WhatsApp', 'icon' => '📞', 'value' => $user_cont_phone],
              ['label' => 'Email', 'icon' => '✉️', 'value' => $user_cont_email],
              ['label' => 'Location', 'icon' => '📍', 'value' => $user_cont_address],
            ];
            $has_info = array_filter($info_items, fn($i) => !empty($i['value']));
            if ($has_info):
              ?>
              <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-md border border-gray-100 dark:border-slate-700">
                <h4 class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-5">Contact
                  Info</h4>
                <div class="space-y-5">
                  <?php foreach ($info_items as $item):
                    if (empty($item['value']))
                      continue; ?>
                    <div class="flex items-start gap-3">
                      <span class="text-base mt-0.5"><?php echo $item['icon']; ?></span>
                      <div>
                        <div class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wide">
                          <?php echo esc_html($item['label']); ?>
                        </div>
                        <div class="text-sm font-bold text-slate-700 dark:text-slate-200 mt-0.5">
                          <?php echo esc_html($item['value']); ?>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; endif; ?>

          <!-- Embedded Map -->
          <?php $map_url = get_theme_mod('mountaviary_frontpage_map_url', 'https://www.google.com/maps/embed/v1/place?q=Dhaka,+Bangladesh&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8');
          if ($map_url): ?>
            <div
              class="overflow-hidden rounded-2xl shadow-md border border-gray-100 dark:border-slate-700 flex-1 min-h-[200px]">
              <iframe class="w-full h-full min-h-[200px]" src="<?php echo esc_url($map_url); ?>" style="border:0"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          <?php endif; ?>

        </div>
      </div>
      <!-- ── END MAIN CONTACT AREA ── -->

    </div>
  </section>
<?php } ?>
<!-- END CONTACT SECTION -->

<?php get_footer(); ?>