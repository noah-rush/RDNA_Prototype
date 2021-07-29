<?php
   /*
   Plugin Name: RDNA Content Audit
   Plugin URI: http://my-awesomeness-emporium.com
   description: >-
  a plugin to create awesomeness and spread joy
   Version: 1.0
   Author: Noah Rush
   Author URI: http://mrtotallyawesome.com
   License: GPL2
   */
?>

<?php

$RDNA_PAGE=40;
add_action( 'admin_menu', 'rdna_page' );
function rdna_page() {
    $hookname = add_menu_page(
        'RDNA Content Audit',
        'RDNA Content Audit',
        'manage_options',
        'rdna',
        'rdna_backend_page',
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}
?>
<?php
function rdna_backend_page() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

      <button id = "run-audit">Run Content Audit</button>
      <select>
        <option>All Content</option>
        <option>Year to Date</option>
        <option>Last 6 Months</option>
        <option>One Month</option>
        <option>One Week</option>

      </select>
      <div class = "response"></div>
    </div>

    <?php
}
?>

<?php 

add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
   
        
   wp_enqueue_script( 'ajax-script', plugins_url( 'admin.js', __FILE__ ), array('jquery') );
   wp_enqueue_style( 'spacy-demo', plugins_url( 'spacy.css', __FILE__ ) );

   // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
   
wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ),'action' => 'run_audit' ) );
}
?>

<?php 

add_action( 'wp_ajax_run_audit', 'run_audit' );

function run_audit() {
   global $wpdb; // this is how you get access to the database
   $a = get_posts($args= array("posts_per_page"=>-1));
   $responses = array();
   $allText = "";
   foreach ($a as $key => $value) {
      $article = wpautop($value->post_content);
      $title = $value->post_title;
      $url = 'https://773ad99a358f.ngrok.io/api?title=' . urlencode($title) . '&article=' . urlencode($article);
      $response = json_decode(file_get_contents($url));
      $response->post_id = $value->ID;
      $allText .= " " . $article;
      $allText .= " " . $title;
      array_push($responses, $response);
   }



   $uniq_locales = [];
   foreach ($responses as $key => $value) {
    if (count($value->location[0]) > 0){
      if (array_key_exists($value->location[0]->address->address, $uniq_locales)){
        array_push($uniq_locales[$value->location[0]->address->address], $value);
      }else{
        $uniq_locales[$value->location[0]->address->address] = array();
        array_push($uniq_locales[$value->location[0]->address->address], $value);
      }
   }
 }

    $new_page = wp_insert_post(array("post_type"=>"page", "post_title"=>"RDNA TEMPLATE"));
    update_post_meta( $new_page, '_wp_page_template', '/code/wp-content/plugins/rdna//templates/rdna.php' );

   foreach ($uniq_locales as $key => $value) {
    $selector = "field_60915e1ecb883";
    $post_id = $new_page;
    $articles = array();
    foreach ($value as $key => $value) {
      array_push( $articles, $value->post_id);
    }
    $value = array("articles"=>$articles,
                  "field_60918a6e54efc" => $value->location[0]->address->lat,
                  "field_60918ab754efd" => $value->location[0]->address->lng,
                  'bbox_northeast' =>$value->location[0]->address->bbox->northeast[0] . ' ' . $value->location[0]->address->bbox->northeast[1] ,
                  'bbox_southwest' =>$value->location[0]->address->bbox->southwest[0] . ' ' . $value->location[0]->address->bbox->southwest[1] ,
                  'name' => substr($value->location[0]->address->address, 0, strpos($value->location[0]->address->address, ",")) 
                  ) ;
    add_row($selector, $value, $post_id);
   }


   $save_file = WP_PLUGIN_DIR . '/rdna/wordclouds/cloud1.jpg';
   $url = 'https://773ad99a358f.ngrok.io/allText?text=' . urlencode($allText);
   file_put_contents($save_file, file_get_contents($url));

   echo json_encode($responses);
   wp_die();
}


add_action( 'wp_ajax_load_news', 'load_news' );

function load_news() {
  $url = "https://newsapi.org/v2/everything?q=Apple&from=2021-05-01&sortBy=popularity&apiKey=" . "1f7fddec1c184951aedbb370f991ecde";
  $response = json_decode(file_get_contents($url));
  echo json_encode($response->articles[0]->content);
  // echo $response['articles'];
  wp_die();
}


function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCC_PVYUEGHrgB5ACQOlBmj0NtZyVCz4GY');
}
add_action('acf/init', 'my_acf_init');

function rdna_scripts() {
    wp_enqueue_style( 'leaflet', "https://unpkg.com/leaflet@1.7.1/dist/leaflet.css", array( ), '1.0.1' );
    wp_enqueue_style( 'slick', "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css", array( ), '1.0.1' );

    wp_enqueue_style( 'rdna_page', plugin_dir_url(__FILE__) . 'RDNA_assets/css/styles.css', array( ), '1.0.1' );


    wp_enqueue_script("slick", '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'),'1.0.0',  true);
    wp_enqueue_script("scrollreveal", "https://unpkg.com/scrollreveal", array('jquery'),'1.0.0',  true);

    wp_enqueue_script( 'leaflet', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'providers', plugin_dir_url(__FILE__) . 'RDNA_assets/js/leaflet-providers.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script("chartjs", 'https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js', array('jquery'), true);
    wp_enqueue_script( 'rdna_page', plugin_dir_url(__FILE__) . 'RDNA_assets/js/rdna_page.js', array( 'jquery' , 'slick', 'scrollreveal'), '1.0.1', true );
    


}
add_action( 'wp_enqueue_scripts', 'rdna_scripts' );

include 'class-plugin-template-include.php';
$templates = new Plugin_Templates_Loader();
?>
