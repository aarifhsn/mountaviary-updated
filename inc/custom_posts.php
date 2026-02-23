<?php

// function to register custom post type
function mountaviary_custom_posts_init()
{

    register_post_type(
        'mav_portfolio',
        array(
            'labels' => array(
                'name' => __('Portfolio', 'mountaviary'),
                'singular_name' => __('Portfolio', 'mountaviary'),
                'add_new' => __('Add New', 'mountaviary'),
                'add_new_item' => __('Add New Portfolio', 'mountaviary'),
                'new_item' => __('New Portfolio', 'mountaviary'),
                'edit_item' => __('Edit Portfolio', 'mountaviary'),
                'view_item' => __('View Portfolio', 'mountaviary'),
                'all_items' => __('All Portfolio', 'mountaviary'),
            ),
            'menu_icon' => 'dashicons-portfolio',
            'public' => true,
            'rewrite' => array('slug' => 'portfolio'),
            'capability_type' => 'post',
            'menu_position' => 6,
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail'),
        )
    );

    // Register Tech Stack Taxonomy (Tags)
    $tech_labels = array(
        'name' => _x('Portfolio Tags', 'Taxonomy General Name', 'mountaviary'),
        'singular_name' => _x('Portfolio Tag', 'Taxonomy Singular Name', 'mountaviary'),
        'menu_name' => __('Portfolio Tag', 'mountaviary'),
        'all_items' => __('All Portfolio Tags', 'mountaviary'),
        'parent_item' => __('Parent Portfolio Tag', 'mountaviary'),
        'parent_item_colon' => __('Parent Portfolio Tag:', 'mountaviary'),
        'new_item_name' => __('New Portfolio Tag Name', 'mountaviary'),
        'add_new_item' => __('Add New Tag', 'mountaviary'),
        'edit_item' => __('Edit Portfolio Tag', 'mountaviary'),
        'update_item' => __('Update Portfolio Tag', 'mountaviary'),
        'view_item' => __('View Portfolio Tag', 'mountaviary'),
    );

    register_taxonomy(
        'portfolio_tech_stack',
        array('mav_portfolio'),
        array(
            'labels' => $tech_labels,
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'rewrite' => array('slug' => 'portfolio_tech_stack'), // Adjust the slug as needed
            'show_in_rest' => true,
        )
    );

    $cat_labels = array(
        'name' => _x('Portfolio Categories', 'Taxonomy General Name', 'mountaviary'),
        'singular_name' => _x('Portfolio Category', 'Taxonomy Singular Name', 'mountaviary'),
        'menu_name' => __('Category', 'mountaviary'),
        'all_items' => __('All Categories', 'mountaviary'),
        'parent_item' => __('Parent Category', 'mountaviary'),
        'parent_item_colon' => __('Parent Category:', 'mountaviary'),
        'new_item_name' => __('New Category Name', 'mountaviary'),
        'add_new_item' => __('Add New Category', 'mountaviary'),
        'edit_item' => __('Edit Category', 'mountaviary'),
        'update_item' => __('Update Category', 'mountaviary'),
        'view_item' => __('View Category', 'mountaviary'),
    );

    // Register Portfolio Categories Taxonomy
    $cat_args = array(
        'labels' => $cat_labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'taxonomies' => array('portfolio_tech_stack'),
        'rewrite' => array('slug' => 'portfolio_tech_stack'), // Adjust the slug as needed
        'show_in_rest' => true,
    );

    register_taxonomy('portfolio_category', array('mav_portfolio'), $cat_args);

    register_post_type(
        'mav_service',
        array(
            'labels' => array(
                'name' => __('Services', 'mountaviary'),
                'singular_name' => __('Service', 'mountaviary'),
                'add_new' => __('Add New', 'mountaviary'),
                'add_new_item' => __('Add New Service', 'mountaviary'),
                'new_item' => __('New Service', 'mountaviary'),
                'edit_item' => __('Edit Service', 'mountaviary'),
                'view_item' => __('View Service', 'mountaviary'),
                'all_items' => __('All Service', 'mountaviary'),
            ),
            'menu_icon' => 'dashicons-index-card',
            'public' => true,
            'rewrite' => array('slug' => 'service'),
            'capability_type' => 'post',
            'menu_position' => 7,
            'supports' => array('title', 'editor'),
        )
    );

}

add_action('init', 'mountaviary_custom_posts_init');

// posts by category function
// user can show specifiq category posts to a new page using this shortcode

function mount_postsbycategory($atts)
{
    $atts = shortcode_atts(array(
        'posts_per_page' => 5,
        'category_name' => 'curated',
    ), $atts);

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $the_query = new WP_Query(array(
        'category_name' => $atts['category_name'],
        'posts_per_page' => $atts['posts_per_page'],
        'paged' => $paged,
    ));

    $string = '';

    if ($the_query->have_posts()):

        $string .= '<div class="space-y-0">';

        while ($the_query->have_posts()):
            $the_query->the_post();

            $cats = get_the_category();
            $thumb = has_post_thumbnail()
                ? get_the_post_thumbnail(null, 'medium', [
                    'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.04]',
                ])
                : null;

            $cat_badge = '';
            if (!empty($cats)) {
                $cat_badge .= '<a href="' . esc_url(get_category_link($cats[0]->term_id)) . '"
                    class="inline-block px-2 py-0.5 rounded-md no-underline font-bold uppercase transition-colors
                        text-emerald-700 dark:text-emerald-400
                        bg-emerald-50 dark:bg-emerald-950
                        border border-emerald-200 dark:border-emerald-800
                        hover:bg-emerald-100 dark:hover:bg-emerald-900"
                    style="font-size:10px; letter-spacing:1.5px;">'
                    . esc_html($cats[0]->name) .
                    '</a>';
                $cat_badge .= '<span class="text-slate-200 dark:text-slate-700">·</span>';
            }

            $string .= '
            <article class="group flex gap-4 py-5 border-b border-slate-100 dark:border-slate-800 last:border-0">

              ' . ($thumb ? '
              <a href="' . esc_url(get_permalink()) . '"
                class="flex-shrink-0 overflow-hidden rounded-xl no-underline"
                style="width:96px; height:72px;">
                ' . $thumb . '
              </a>' : '') . '

              <div class="flex-1 min-w-0">

                <div class="flex items-center gap-2 mb-1.5">
                  ' . $cat_badge . '
                  <span class="text-xs text-slate-400 dark:text-slate-500">'
                . get_the_date('F j, Y') .
                '</span>
                </div>

                <h3 class="font-bold leading-snug text-slate-900 dark:text-slate-100 mb-1" style="font-size:15px;">
                  <a href="' . esc_url(get_permalink()) . '"
                    class="no-underline hover:text-slate-500 dark:hover:text-slate-300 transition-colors">
                    ' . esc_html(get_the_title()) . '
                  </a>
                </h3>

                <p class="text-xs leading-relaxed text-slate-400 dark:text-slate-500 line-clamp-2">
                  ' . wp_trim_words(get_the_excerpt(), 18, '…') . '
                </p>

              </div>
            </article>';

        endwhile;

        $string .= '</div>';

        // Pagination
        $links = paginate_links(array(
            'total' => $the_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '‹',
            'next_text' => '›',
            'type' => 'array',
        ));

        if ($links) {
            $string .= '<div class="flex items-center justify-center gap-1.5 mt-10">';
            foreach ($links as $link) {
                $string .= '<div>' . $link . '</div>';
            }
            $string .= '</div>';
        } else {
            $string .= '
        <div class="text-center py-12">
          <p class="text-4xl mb-4">📂</p>
          <p class="text-base font-semibold text-slate-700 dark:text-slate-300 mb-1">No posts found</p>
          <p class="text-sm text-slate-400 dark:text-slate-500">Nothing has been published in this category yet.</p>
        </div>';
        }
    endif;

    wp_reset_postdata();

    return $string;
}

add_shortcode('categoryposts', 'mount_postsbycategory');


// 1. Add Custom Meta Boxes
function add_portfolio_meta_boxes()
{
    add_meta_box(
        'portfolio-details',
        'Portfolio Details',
        'portfolio_details_meta_box_callback',
        'mav_portfolio',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_portfolio_meta_boxes');


// 2. Meta Box Callback Function
function portfolio_details_meta_box_callback($post)
{
    // Add nonce for security
    wp_nonce_field('save_portfolio_meta', 'portfolio_meta_nonce');

    // Get current values
    $project_features = get_post_meta($post->ID, 'project_features', true);
    $project_description = get_post_meta($post->ID, 'project_description', true);

    ?>
    <table class="form-table">

        <tr>
            <th scope="row">
                <label for="project_description">Project Description</label>
            </th>
            <td>
                <textarea id="project_description" name="project_description" rows="4" cols="50" class="large-text"
                    placeholder="A comprehensive project showcasing modern web development..."><?php echo esc_textarea($project_description); ?></textarea>
                <p class="description">Brief description of the project (will fallback to post content if empty)</p>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <label for="project_features">Key Features</label>
            </th>
            <td>
                <textarea id="project_features" name="project_features" rows="6" cols="50" class="large-text"
                    placeholder="Responsive Design,Custom Development,Performance Optimization,Modern UI/UX,Cross-browser Support,SEO Optimized"><?php echo esc_textarea($project_features); ?></textarea>
                <p class="description">Enter features separated by commas. If empty, default features will be used.</p>
            </td>
        </tr>
    </table>

    <style>
        .form-table th {
            width: 200px;
        }

        .form-table td {
            padding: 15px 10px;
        }

        .form-table input[type="url"],
        .form-table textarea {
            width: 100%;
            max-width: 500px;
        }
    </style>
    <?php
}

// 3. Save Meta Box Data
function save_portfolio_meta($post_id)
{
    // Check if nonce is valid
    if (!isset($_POST['portfolio_meta_nonce']) || !wp_verify_nonce($_POST['portfolio_meta_nonce'], 'save_portfolio_meta')) {
        return;
    }

    // Check if user has permission
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if not an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check post type
    if (get_post_type($post_id) != 'mav_portfolio') {
        return;
    }

    // Save fields
    // if (isset($_POST['project-link'])) {
    //     update_post_meta($post_id, 'project-link', esc_url_raw($_POST['project-link']));
    // }

    if (isset($_POST['project_features'])) {
        update_post_meta($post_id, 'project_features', sanitize_textarea_field($_POST['project_features']));
    }

    if (isset($_POST['project_description'])) {
        update_post_meta($post_id, 'project_description', sanitize_textarea_field($_POST['project_description']));
    }
}
add_action('save_post', 'save_portfolio_meta');

// 5. Add custom columns to admin list
function portfolio_custom_columns($columns)
{
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = $columns['title'];
    $new_columns['portfolio_image'] = __('Image', 'mountaviary');
    $new_columns['portfolio_category'] = __('Category', 'mountaviary');
    $new_columns['portfolio_tech_stack'] = __('Tech Stack', 'mountaviary');
    $new_columns['project_link'] = __('Project Link', 'mountaviary');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_mav_portfolio_posts_columns', 'portfolio_custom_columns');

// 6. Display custom column content
function portfolio_custom_column_content($column, $post_id)
{
    switch ($column) {
        case 'portfolio_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '—';
            }
            break;

        case 'portfolio_category':
            $categories = get_the_terms($post_id, 'portfolio_category');
            if ($categories && !is_wp_error($categories)) {
                $cat_names = array();
                foreach ($categories as $category) {
                    $cat_names[] = $category->name;
                }
                echo implode(', ', $cat_names);
            } else {
                echo '—';
            }
            break;

        case 'portfolio_tech_stack':
            $techs = get_the_terms($post_id, 'portfolio_tech_stack');
            if ($techs && !is_wp_error($techs)) {
                $tech_names = array();
                foreach ($techs as $tech) {
                    $tech_names[] = $tech->name;
                }
                echo implode(', ', array_slice($tech_names, 0, 3));
                if (count($tech_names) > 3) {
                    echo '...';
                }
            } else {
                echo '—';
            }
            break;

        case 'project_link':
            $link = get_post_meta($post_id, 'project-link', true);
            if ($link) {
                echo '<a href="' . esc_url($link) . '" target="_blank">View Project</a>';
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_mav_portfolio_posts_custom_column', 'portfolio_custom_column_content', 10, 2);

// 7. Make columns sortable (optional)
function portfolio_sortable_columns($columns)
{
    $columns['portfolio_category'] = 'portfolio_category';
    $columns['portfolio_tech_stack'] = 'portfolio_tech_stack';
    return $columns;
}
add_filter('manage_edit-mav_portfolio_sortable_columns', 'portfolio_sortable_columns');