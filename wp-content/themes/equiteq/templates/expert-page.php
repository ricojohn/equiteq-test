<?php
/* Template Name: Expert Page */
get_header();
$id = get_the_ID();
$page = get_post($id);
?>

<?php

/**Hero */
// hm_get_template_part('template-parts/hero', ['page' => $page]);

?>

<section class="bg-dark-blue">
    <div class="container text-white no-pad-gutters">
        <h3 class="text-uppercase mb-4"><?php echo $page->intro_title ?></h3>
        <div class="row">
            <div class="col-md-8 mb-4">
                <?php echo $page->post_content ?>
            </div>
        </div>
        <form method="GET">
        <!--May implement the search and filter here-->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="filters-left row">
                        <div class="col-md-4 mb-4">
                             <!-- Industry Filter -->
                            <select name="industry_filter" class="form-select" onchange="this.form.submit()">
                                <option value="">Sector</option>
                                <?php
                                $industries = get_posts(['post_type' => 'industry', 'numberposts' => -1]); // Fetch all industries
                                foreach ($industries as $industry) {
                                    $selected = (isset($_GET['industry_filter']) && $_GET['industry_filter'] == $industry->ID) ? 'selected' : '';
                                    echo '<option value="' . $industry->ID . '" ' . $selected . '>' . $industry->post_title . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <!-- Location Filter -->
                            <select name="location_filter" class="form-select" onchange="this.form.submit()">
                                <option value="">Location</option>
                                <?php
                                $locations = get_posts(['post_type' => 'location', 'numberposts' => -1]); // Fetch all locations
                                foreach ($locations as $location) {
                                    $selected = (isset($_GET['location_filter']) && $_GET['location_filter'] == $location->ID) ? 'selected' : '';
                                    echo '<option value="' . $location->ID . '" ' . $selected . '>' . $location->post_title . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <!-- Search by Title -->
                     <div class="filters-right">
                            <input type="text" name="search_title" placeholder="Search by Name" value="<?php echo isset($_GET['search_title']) ? esc_attr($_GET['search_title']) : ''; ?>" onchange="this.form.submit()">
                     </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!--May implement the experts profile list here-->
<section class="bg-white">
    <div class="container text-white no-pad-gutters ">
        <div class="row">
            <?php
                $location_filter = isset($_GET['location_filter']) ? $_GET['location_filter'] : '';
                $industry_filter = isset($_GET['industry_filter']) ? $_GET['industry_filter'] : '';
                $search_title = isset($_GET['search_title']) ? sanitize_text_field($_GET['search_title']) : '';

                $args = [
                    'post_type' => 'expert',
                    'numberposts' => -1,
                    'meta_query' => []
                ];

                // Filter by title (search query)
                if (!empty($search_title)) {
                    $args['s'] = $search_title;
                }
                
                // Filter by location
                if (!empty($location_filter)) {
                    $args['meta_query'][] = [
                        'key' => 'profile_location',
                        'value' => $location_filter,
                        'compare' => '='
                    ];
                }

                // Filter by industry
                if (!empty($industry_filter)) {
                    $args['meta_query'][] = [
                        'key' => 'expertise_of_the_profile',
                        'value' => $industry_filter,
                        'compare' => '='
                    ];
                }
                
                $experts = get_posts($args);
            
                foreach ($experts as $expert) {
                    $expert_location = get_field('profile_location', $expert->ID);
                    $expert_industry = get_field('expertise_of_the_profile', $expert->ID);
                    $expert_img = get_field('profile_image', $expert->ID);
            ?>
                <div class="col-md-3 mb-4">
                    <div class="card team-card text-center">
                            <a href="<?php echo get_permalink($expert->ID) ?>" >
                            <img src="<?php echo $expert_img['url']?>" alt="" class="img img-fluid rounded-circle">
                            </a>
                            <div class="card-body">
                                <a href="<?php echo get_permalink($expert->ID) ?>" class="card-title">
                                    <?php echo $expert->post_title?>
                                </a>
                                    <div class="position_title"><?php echo get_field('position_title', $expert->ID)?></div>
                                    <div class="expert_location"><em><?php echo  $expert_location->post_title?></em></div>
                            </div>
                        
                        <div class="">
                            <div class="icons">
                                <ul class="d-flex list-unstyled justify-content-center">
                                    <li><a href="<?php echo get_field('profile_email')?>" ><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo get_field('profile_contact_no')?>" ><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php echo get_field('linkedin_url')?>" target="_blank" ><i class="fa fa-linkedin" aria-hidden="true"></a></i>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
        <!--May implement the search and filter here-->
        
    </div>
</section>
<?php
get_footer();
?>