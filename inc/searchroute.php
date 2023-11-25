<?php

function oforib_registerSearch() {
	register_rest_route('oforibeauty/v1', 'liveSearchResults', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => function($data) {
            $searchQuery = new WP_Query(array(
                'post_type' => array('post', 'page', 'product'),
                's' => sanitize_text_field($data['term'])
            ));

            $searchResults = array(
                'posts' => array(),
                'pages' => array(),
                'services' => array()
            );

            while ($searchQuery->have_posts()):
                $searchQuery->the_post();
                if (get_post_type() == 'post'):
                    array_push($searchResults['posts'], array(
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'authorName' => get_the_author()
                    ));
                elseif (get_post_type() == 'page' && (!is_front_page() && !is_home() && !is_account_page() && !is_cart() && !is_checkout() && !is_shop() && get_the_ID() != 20)): //Still includes pages I don't want barring Search page
                    array_push($searchResults['pages'], array(
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink()
                    ));
                elseif (get_post_type() == 'product'):
                    global $product;
                    array_push($searchResults['services'], array(
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'price' => $product->get_price_html()
                    ));
                endif;
            endwhile;

            return $searchResults;
        }
    ));
}

add_action('rest_api_init', 'oforib_registerSearch');