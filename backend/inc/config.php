<?php //error_reporting(0);
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */
include 'database.php';
/* Template variables */
session_start();
$template = array(
    'name'          => 'Admin',
    'version'       => '1.1',
    'author'        => 'pixelcave',
    'robots'        => 'noindex, nofollow',
    'title'         => 'Admin Dashboard',
    'description'   => 'Admin Dashboard Template',
    // 'navbar-default'         for a light header
    // 'navbar-inverse'         for a dark header
    'header_navbar' => 'navbar-default',
    // ''                       empty for a static header
    // 'navbar-fixed-top'       for a top fixed header / fixed sidebars
    // 'navbar-fixed-bottom'    for a bottom fixed header / fixed sidebars
    'header'        => '',
    // ''                                               for a full main and alternative sidebar hidden by default (> 991px)
    // 'sidebar-visible-lg'                             for a full main sidebar visible by default (> 991px)
    // 'sidebar-partial'                                for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-partial sidebar-visible-lg'             for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-alt-visible-lg'                         for a full alternative sidebar visible by default (> 991px)
    // 'sidebar-alt-partial'                            for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-alt-partial sidebar-alt-visible-lg'     for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-partial sidebar-alt-partial'            for both sidebars partial which open on mouse hover, hidden by default (> 991px)
    // 'sidebar-no-animations'                          add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!
    'sidebar'       => 'sidebar-partial sidebar-visible-lg sidebar-no-animations',
    // ''                       empty for a static footer
    // 'footer-fixed'           for a fixed footer
    'footer'       => '',
    // ''                       empty for default style
    // 'style-alt'              for an alternative main style (affects main page background as well as blocks style)
    'main_style'    => '',
    // 'night', 'amethyst', 'modern', 'autumn', 'flatie', 'spring', 'fancy', 'fire' or '' leave empty for the Default Blue theme
    'theme'         => '',
    // ''                       for default content in header
    // 'horizontal-menu'        for a horizontal menu in header
    // This option is just used for feature demostration and you can remove it if you like. You can keep or alter header's content in page_head.php
    'header_content'=> '',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
	array(
        'name'  => 'Logout',
        'url'   => 'logout.php',
        'icon'  => 'gi gi-exit'
    ),
    array(
        'name'  => 'Dashboard',
        'url'   => 'index.php',
        'icon'  => 'gi gi-show_big_thumbnails'
    ),
	
    array(
        'name'  => 'Header',
        'url'   => 'manage_header.php',
        'icon'  => 'hi hi-list-alt'
    ),
    array(
        'name'  => 'Content Images',
        'url'   => 'content.php',
        'icon'  => 'hi hi-home'
    ),
    array(
        'name'  => 'Home Top Search',
        'url'   => 'searches.php',
        'icon'  => 'hi hi-home'
    ),
    

//    array(
//
//        'name'  => 'Home Page',
//
//        'icon'  => 'hi hi-home',
//
//        'sub'   => array(
//
//            array(
//
//                'name'  => 'Content Images',
//
//                'url'   => 'content.php'
//
//            ),
//
//            array(
//
//                'name'  => 'Top 10 Search',
//
//                'url'   => 'searches.php'
//
//            )
//
//        )
// 
//    ),
    array(
        'name'  => 'Footer',
        'url'   => 'manage_footer.php',
        'icon'  => 'hi hi-tasks'
    ),array(
        'name'  => 'Manage Clients',
        'url'   => 'clients.php',
        'icon'  => 'hi hi-tasks'
    ),
	array(

                'name'  => 'Manage Sliders',
				'icon'  => 'gi gi-picture',
                'url'   => 'all_slider.php'

    ),
	array(

                'name'  => 'Manage Videos',
				'icon'  => 'fa fa-video-camera',
                'url'   => 'manage_videos.php'

    ),
	array(
        'name'  => 'Manage Pages',
        'icon'  => 'gi gi-edit',
		'sub'   => array(

            array(

                'name'  => 'About Page',

                'url'   => 'about.php?id=1'

            ),
			array(

                'name'  => 'Advertise with us Page',

                'url'   => 'about.php?id=2'

            ),
			array(

                'name'  => 'Finance Page',

                'url'   => 'about.php?id=3'

            ),
			array(

                'name'  => 'Contact Page',

                'url'   => 'about.php?id=4'

            ),
			array(

                'name'  => 'Faq Page',

                'url'   => 'faq.php'

            ),
			array(

                'name'  => 'Guide New Car Page',

                'url'   => 'about.php?id=5'

            )

        )
    ),array(
        'name'  => 'Contact Details',
        'url'   => 'contact_detail.php',
        'icon'  => 'hi hi-earphone'
    ),array(
		'name'  => 'Manage Finance Page',
		'icon'  => 'hi hi-tasks',
		'url'   => 'manage_finance.php'
    ),array(
		'name'  => 'Manage Make(category)',
		'icon'  => 'gi gi-edit',
		'url'   => 'manage_category.php'
    ),array(
		'name'  => 'Manage Model',
		'icon'  => 'gi gi-picture',
		'url'   => 'manage_model.php'
    ),array(
		'name'  => 'Manage Sub-Model',
		'icon'  => 'fa-cloud-upload',
		'url'   => 'manage_sub_model.php'
    ),array(
		'name'  => 'Manage Cars',
		'icon'  =>  'gi gi-picture',
		'url'   => 'manage_cars.php'
    ),array(
		'name'  => 'Manage Reviews',
		'icon'  => 'gi gi-picture',
		'url'   => 'manage_review.php'
    ),array(
		'name'  => 'Manage Car Events',
		'icon'  => 'gi gi-edit',
		'url'   => 'manage_events.php',
                 'sub'   => array(

            array(

                'name'  => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Events',

                'url'   => 'manage_events.php'

            )

        )
    ),
	array(
		'name'  => 'Service Provider',
		'icon'  => 'hi hi-tasks',
		'url'   => 'providers.php',
      ),
	array(
		'name'  => 'Service Provider Gallery',
		'icon'  => 'hi hi-tasks',
		'url'   => 'manage_provider_gallery.php',
      ),
	  array(
		'name'  => 'Provider social Icons',
		'icon'  => 'hi hi-tasks',
		'url'   => 'provider_social_icon.php',
      ),array(
		'name'  => 'Manage Car Shop',
		'icon'  => 'gi gi-edit',
		'url'   => 'manage_shop_category.php',
                 'sub'   => array(

            array(

                'name'  => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage shop',

                'url'   => 'manage_shop_category.php'

            )

        )
    ),array(
		'name'  => 'Manage Product',
		'icon'  => 'gi gi-edit',
		'url'   => 'shop_product.php',
                 'sub'   => array(

            array(

                'name'  => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Product',

                'url'   => 'shop_product.php'

            )

        )
    ),array(
		'name'  => 'Manage Product Details',
		'icon'  => 'gi gi-edit',
		'url'   => 'manage_product.php',
                 'sub'   => array(

            array(

                'name'  => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Product',

                'url'   => 'manage_product.php'

            )

        )
    ),array(
		'name'  => 'manage country',
		'icon'  => 'hi hi-tasks',
		'url'   => 'manage_country.php',
      ),
	
	/*,
	
    array(

        'name'  => 'Product',

        'icon'  => 'fa fa-briefcase',

        'sub'   => array(

            array(

                'name'  => 'Add Product',

                'url'   => 'add_product.php'

            ),

            array(

                'name'  => 'Edit Product',

                'url'   => 'edit_product.php'

            )

        )

    )*/
   
);