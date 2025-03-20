<?php

get_header();
$id = get_the_ID();
$expert = get_expert($id);
$page = get_post($id);
// $industry_expertises = maybe_unserialize($expert->industry_expertise);
$image = get_field('profile_image');
?>


<section>
    <section class="container no-pad-gutters">
        <div class="back mb-4 mb-md-5">
            <i class="fa fa-caret-left align-bottom" style="font-size: 22px;" aria-hidden="true"></i> <a
                href="http://localhost/wordpress/team/" class="btn-outline-success text-uppercase px-0 ml-2">Back to team</a>
        </div>
        <!--May implement the expert's profile here -->
        <div class="row align-items-start">
        <!-- Left: Profile Image -->
        <div class="col-md-3 text-center">
            <img src="<?php echo $image['url']; ?>" alt="Profile Image" class="profile-img img img-fluid rounded-circle">
        </div>

        <!-- Right: Profile Details -->
        <div class="col-md-9">
            <div class="profile-header">
                <h1><?php the_title(); ?></h1>
                <h5><?php the_field('position_title'); ?></h5>
                <p> <i class="fa fa-map-marker fa-lg text-green"></i> <strong><?php echo get_the_title(get_field('profile_location')); ?></strong></p>
            </div>

            <!-- Contact Icons -->
            <div class="icons mb-3">
              <ul class="d-flex list-unstyled">
                <li><a href="<?php echo get_field('profile_email')?>" ><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo get_field('profile_contact_no')?>" ><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo get_field('linkedin_url')?>" target="_blank" ><i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
            <?php echo $page->post_content ?>
        </div>

    </div>
</section>

<!--May implement the expert's industry expertise here -->

<?php
get_footer();