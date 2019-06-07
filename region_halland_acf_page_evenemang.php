<?php

	/**
	 * @package Region Halland ACF Page Evenemang
	 */
	/*
	Plugin Name: Region Halland ACF Page Evenemang
	Description: ACF-fält för extra fält nederst på en evenemangs-sida
	Version: 1.0.0
	Author: Roland Hydén
	License: MIT
	Text Domain: regionhalland
	*/

	// vid 'init', anropa funktionen region_halland_register_utbildning()
	add_action( 'init', 'region_halland_register_evenemang' );

	// Denna funktion registrerar en ny post_type och gör den synlig i wp-admin
	function region_halland_register_evenemang() {
		
		// Vilka labels denna post_type ska ha
		$labels = array(
	        'name' => _x( 'Evenemang', 'Post type general name', 'textdomain' ),
	        'singular_name' => _x( 'Evenemang', 'Post type singular name', 'textdomain' ),
	        'menu_name' => _x( 'Evenemang', 'Admin Menu text', 'textdomain' ),
	        'add_new' => __( 'Lägg till ny', 'textdomain' ),
    		'add_new_item' => __( 'Lägg till ny', 'textdomain' ),
    		'edit_item' => __( 'Editera', 'textdomain' )
	    );
		
		// Inställningar för denna post_type 
	    $args = array(
	        'labels' => $labels,
	        'rewrite' => array('slug' => 'evenemang'),
			'show_ui' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'public' => true,
			'query_var' => false,
			'menu_icon' => 'dashicons-megaphone',
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
	    );

	    // Registrera post_type
	    register_post_type('evenemang', $args);
	    
	}

	// Anropa function om ACF är installerad
	add_action('acf/init', 'my_acf_add_page_evenemang_field_groups');

	function my_acf_add_page_evenemang_field_groups() {

		if (function_exists('acf_add_local_field_group')):

			acf_add_local_field_group(array(
			    'key' => 'group_1000146',
			    'title' => 'Evenemangsinställningar',
			    'fields' => array(
        		    0 => array(
			        	'key' => 'field_1000147',
			            'label' => __('Ingress', 'regionhalland'),
			            'name' => 'name_1000148',
			            'type' => 'textarea',
			            'instructions' => __('Ingress. Max 200 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 200,
			            'rows' => 2,
			            'new_lines' => '',
			        ),
        		    1 => array(
			        	'key' => 'field_1000149',
			            'label' => __('Stad', 'regionhalland'),
			            'name' => 'name_1000150',
			            'type' => 'text',
			            'instructions' => __('Ange stad. Max 80 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 80,
			            'new_lines' => '',
			        ),
        		    2 => array(
			        	'key' => 'field_1000151',
			            'label' => __('Spelställe', 'regionhalland'),
			            'name' => 'name_1000152',
			            'type' => 'text',
			            'instructions' => __('Ange spelställe. Max 80 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 80,
			            'new_lines' => '',
			        ),
					3 => array( 
		          	  'key' => 'field_1000153', 
		              'label' => __('Speltid', 'regionhalland'), 
		              'name' => 'name_1000154', 
		              'type' => 'date_time_picker', 
		              'instructions' => __('Fyll i evenemangets speltid.', 'regionhalland'), 
		              'required' => 0, 
		              'conditional_logic' => 0, 
		              'wrapper' => array( 
		                  'width' => '', 
		                  'class' => '', 
		                  'id' => '', 
		              ), 
		              'display_format' => 'Y-m-d H:i', 
		              'return_format' => 'Y-m-d H:i', 
		              'first_day' => 1, 
		           	),
		        	4 => array(
			            'key' => 'field_1000155',
			            'label' => __('Information', 'halland'),
			            'name' => 'name_1000156',
			            'type' => 'repeater',
			            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en ny länk.', 'halland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'collapsed' => '',
			            'min' => 0,
			            'max' => 250,
			            'layout' => 'row',
			            'button_label' => '',
			            'sub_fields' => array(
				          0 => array(
				              'key' => 'field_1000157',
		            		  'label' => __('Länk', 'regionhalland'),
		            		  'name' => 'name_1000158',
		            		  'type' => 'link',
		            		  'instructions' => __('Länk för mer information.', 'regionhalland'),
		            		  'required' => 0,
		            		  'conditional_logic' => 0,
		            		  'wrapper' => array(
		                		'width' => '',
		                		'class' => '',
		                		'id' => '',
		            		  ),
		            		  'return_format' => 'array',
		        		  ),
			            ),
			        ),
		        	5 => array(
			            'key' => 'field_1000159',
			            'label' => __('Arrangörer', 'halland'),
			            'name' => 'name_1000160',
			            'type' => 'repeater',
			            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en ny länk.', 'halland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'collapsed' => '',
			            'min' => 0,
			            'max' => 250,
			            'layout' => 'row',
			            'button_label' => '',
			            'sub_fields' => array(
				          0 => array(
				              'key' => 'field_1000161',
		            		  'label' => __('Länk', 'regionhalland'),
		            		  'name' => 'name_1000162',
		            		  'type' => 'link',
		            		  'instructions' => __('Länk till arrangörer.', 'regionhalland'),
		            		  'required' => 0,
		            		  'conditional_logic' => 0,
		            		  'wrapper' => array(
		                		'width' => '',
		                		'class' => '',
		                		'id' => '',
		            		  ),
		            		  'return_format' => 'array',
		        		  ),
			            ),
			        ),
			    ),
			    'location' => array(
			        0 => array(
			            0 => array(
			                'param' => 'post_type',
			                'operator' => '==',
			                'value' => 'evenemang',
			            ),
			        )
			    ),
			    'menu_order' => 0,
			    'position' => 'normal',
			    'style' => 'default',
			    'label_placement' => 'top',
			    'instruction_placement' => 'label',
			    'hide_on_screen' => '',
			    'active' => 1,
			    'description' => '',
			));

		endif;

	}
	
	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_page_evenemang_activate() {
		
		// Vid aktivering, registrera post_type "kulturkatalog"
		region_halland_register_evenemang();

		// Tala om för wordpress att denna post_type finns
		// Detta gör att permalink fungerar
	    flush_rewrite_rules();
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_acf_page_evenemang_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_acf_page_evenemang_activate');

	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_acf_page_evenemang_deactivate');

?>