<?php

// Includes
require_once get_theme_file_path() .'/includes/codestar-framework/codestar-framework.php';
require get_template_directory() . '/includes/customize.php';
require get_template_directory() . '/includes/metabox_retos.php';

function gymfitness_setup() {
    // Imagenes Destacadas
    add_theme_support('post-thumbnails');

    // Titulos para SEO
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gymfitness_setup');


function gymfitness_scripts_styles() {
    // Archivos CSS
    if(is_front_page()){
        wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0' );
    }
    wp_enqueue_style('gridflex_css', get_template_directory_uri() . '/css/gridflex.min.css', array(), '1.1', 'all');
    wp_enqueue_style('general_css', get_template_directory_uri() . '/css/general.css', array(), '1.0', 'all');
    wp_enqueue_script('scripts-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true);
    if(is_front_page()) {
         wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
    }
    wp_enqueue_script('ajax-script-jquery', get_template_directory_uri() . '/js/ajax-script.js', array('jquery'), '1.0', true);
    wp_localize_script('ajax-script-jquery', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');


function gymfitness_init(){
    $labels = array(
        'name' => __('Retos', 'davidtheme'),
        'singular_name' => __('Reto', 'davidtheme'),
        'add_new' => __('Agregar Nuevo Reto', 'davidtheme'),
        'add_new_item' => __('Agregar Nuevo Reto', 'davidtheme'),
        'edit_item' => __('Editar Reto', 'davidtheme'),
        'featured_image' => __('Imagen Reto', 'davidtheme'),
        'all_items'      => __('Todos los Retos', 'davidtheme'),
        'search_items'       => __('Buscar Reto', 'davidtheme'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title','editor', 'thumbnail', 'revisions'),
        'has_archive' => true,
        'show_uri' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true
    );

    register_post_type('retos', $args);
}

add_action('init', 'gymfitness_init');

function insert_data_ajax_handler() {
    global $wpdb;
    $name_full = sanitize_text_field($_POST['name_full']);
    $nit = sanitize_text_field($_POST['nit']);
    $name_point = sanitize_text_field($_POST['name_point']);
    $name_equitment = sanitize_text_field($_POST['name_equitment']);
    $name_city = sanitize_text_field($_POST['name_city']);
    $name_promotor = sanitize_text_field($_POST['name_promotor']);
    $rtc = sanitize_text_field($_POST['rtc']);
    $capitan = sanitize_text_field($_POST['capitan']);
    $new_options = array('name_full' => $name_full, 'nit' => $nit, 'name_point' => $name_point, 'name_equitment' => $name_equitment, 'name_city' => $name_city, 'name_promotor' => $name_promotor, 'rtc' => $rtc, 'capitan' => $capitan, 'ip' => $_SERVER['REMOTE_ADDR']);
    
    $table_name = $wpdb->prefix . 'retos'; // Replace 'your_custom_table' with the actual table name

    $wpdb->insert($table_name, $new_options);

    if ($wpdb->last_error) {
        echo 'Error inserting data: ' . $wpdb->last_error;
    }else{
        $jsonFormatted = json_encode($new_options, JSON_PRETTY_PRINT);
        insertLogsReportExtern($jsonFormatted);
    }
    exit();
}


add_action('wp_ajax_insert_data_ajax', 'insert_data_ajax_handler');
add_action('wp_ajax_nopriv_insert_data_ajax', 'insert_data_ajax_handler');


function insertLogsReportExtern($jsonFormatted ){

$url = "https://app-edu-recaudocursos-php.azurewebsites.net/api-cursos/public/crear-logs";


$data = array(
    "identificador" => date('Y-m-d'), 
    "tipo" => "prueba legger david valenzuela", 
    "info" => $jsonFormatted 

);

$jsonData = json_encode($data);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
}

curl_close($ch);

echo $response;
} 



