<?php
/**
 * Plugin Name: Flux Test Suite
 * Plugin URI: http://github.com/onemanonelaptop/diy
 * Description: Test Suite
 * Version: 0.1.0
 * Author: Rob Holmes
 * Author URI: http://github.com/onemanonelaptop
 */
 
/* Copyright 2011 Rob Holmes ( email: rob@onemanonelaptop.com )

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_action( 'flux', 'diy_init' );

/**
 * Define the entire functionality inside the diy_init action which only called
 * if the diy plugin is present and activated.
 */
function diy_init() {
    
    // If the class doenst alreay exist
    if (!class_exists('Diy')) {

        // define the class
	class Diy {
            
            /**
             * Constructor 
             */
            function __construct() {
                
                // define all the forms used in the plugin
                $forms = $this->forms();
                
                // define all the pages used in the plugin
                $pages = $this->pages();
                
                /**
                 * PLUGIN DEFINITION
                 * The pattern used to create a plugin with the Plugin class
                 */
                $plugin = new Plugin(__FILE__);     // always pass in __FILE__
                $plugin->forms($forms)              // add the forms
                        ->pages($pages)             // add the pages
                        ->slug('diy')           // plugin slug
                        ->start();                  // start everything off

                /**
                 * Example of creating a custom post type using the Type class
                 */
                $transactions = new Type('test');

                // Transactions Post Type
                $transactions->name('Test')
                    ->singular_name('Test')
                    ->add_new('Add Test')
                    ->add_new_item('Add New Test')
                    ->edit_item('Edit Test')
                    ->new_item('New Test')
                    ->all_items('All Test')
                    ->view_item('View Test')
                    ->search_items('Search Test')
                    ->not_found('No test found')
                    ->not_found_in_trash('No tests found in Trash')
                    ->parent_item_colon('')
                    ->menu_name('Test')
                    ->is_public(true)
                    ->placeholder('Enter test name here') 
                    ->show_in_menu(true);          
                
            } // function
            
            
            /**
             * Define and return all the page definitions 
             * @return array
             */
            function pages() {
                $pages = array();

                // Start off with a top level menu
                $pages['diytest'] = array(
                    '#type'=>'menu',                
                    '#title'=>'DIY Field Tests',       
                    '#link_text'=>'DIY Field Tests', 
                );
                
                // Single field widget tests
                $pages['diytest']['single-field'] = array(
                    '#type'=>'options',
                    '#title'=>'Single Field Widget Tests',
                    '#link_text'=>'Single Field Tests',
                );
                
                // Nested and heirachial field widget tests
                 $pages['diytest']['heirarchial'] = array(
                    '#type'=>'options',
                    '#title'=>'Hierachial Tests',
                    '#link_text'=>'Hierachial Tests',
                );
                 
                // Multiple Field Tests
                $pages['diytest']['multi-field'] = array(
                    '#type'=>'options',
                    '#title'=>'Multi Field Tests',
                    '#link_text'=>'Multi Field Tests',
                );

                // Multile field group Tests
                $pages['diytest']['multi-group'] = array(
                    '#type'=>'options',
                    '#title'=>'Multi Group Tests',
                    '#link_text'=>'Multi Group Tests',
                );
                
                // Multile field group Tests
                $pages['diytest']['metabox-tests'] = array(
                    '#type'=>'options',
                    '#title'=>'Metabox Tests',
                    '#link_text'=>'Metabox Tests',
                );
                 
                return $pages;
                 
            } // function
            
            /**
             * Define and return all the form definitions
             * @return array 
             */
            function forms() {
                $forms = array();
                
                // Metabox for the Single Field Tests
                $forms['single-field'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Single Field Tests',
                    '#pages' => array('diy-field-tests_page_single-field'),
                    '#context' => 'normal',
                    '#settings' => array(
                        'always_open' => true
                    )
                );
                
                // Markup test
                $forms['single-field']['test-markup'] = array(
                    '#type' => 'item',
                    '#title' => 'Markup Test',
                    '#markup' => '<strong>This</strong> <em>is</em> some markup'
                );
                
                // Single Text Field Test
                $forms['single-field']['test-textfield'] = array(
                    '#type' => 'textfield',
                    '#title' => 'Text field',
                    '#description' => 'Text field description',
                    '#default_value' => 'Test Default Value'
                );
                
                // Single Textarea test
                $forms['single-field']['test-textarea'] = array(
                    '#type' => 'textarea',
                    '#title' => 'Textarea',
                );

                // Single Checkbox Test
                $forms['single-field']['test-checkbox'] = array(
                    '#type' => 'checkbox',
                    '#title' => 'Checkbox',
                );

                // Single Color Picker Test
                $forms['single-field']['test-color'] = array(
                    '#type' => 'color',
                    '#title' => 'Color',
                );
                
                // Single Select Box Test (integer values)
                $forms['single-field']['test-select-1'] = array(
                    '#type' => 'select',
                    '#title' => 'Select Options (integer values)',
                    '#options' => array(
                        '0' => 'No',
                        '1' => 'Yes'
                    ),
                    '#inline' => true
                );
                
                // Single Select Box Test (string values)
                $forms['single-field']['test-select-2'] = array(
                    '#type' => 'select',
                    '#title' => 'Select Options (integer values)',
                    '#options' => array(
                        'no' => 'No',
                        'yes' => 'Yes'
                    ),
                    '#inline' => true
                );
                
                // Single Multiselect Test
                $forms['single-field']['test-select-3'] = array(
                    '#type' => 'select',
                    '#title' => 'Multi Select',
                    '#options' => array(
                        'no' => 'No',
                        'yes' => 'Yes'
                    )
                );
                
                // Single Radio Buttons Test
                $forms['single-field']['test-select-4'] = array(
                    '#type' => 'radios',
                    '#title' => 'Radios',
                    '#options' => array(
                        'no' => 'No',
                        'yes' => 'Yes'
                    )
                );

               
                
                // Single Attachment Test
                $forms['single-field']['test-attachment'] = array(
                    '#type' => 'attachment',
                    '#title' => 'Attachment',
                    '#description' => 'Choose an attachment from the existing attachments on the site. You can add new attachments by using the upload button or by dragging a file from the desktop onto the field widget'
                );
                
                // Suggest Posts
                
                // Suggest Pages
                
                // Suggest Users by role
                
                // Suggest All Users
                
                
                // Single Google Map Test
                $forms['single-field']['test-map'] = array(
                    '#type' => 'map',
                    '#title' => 'Map',
                    '#settings' => array(
                        'latfield' => 'single-field[test-map][latitude]',
                        'longfield' => 'single-field[test-map][longitude]'
                    )
                );
                $forms['single-field']['test-map']['latitude'] = array(
                    '#type' => 'textfield',
                    '#title' => 'Latitude',
                    '#description' => 'Latitude'
                );
                $forms['single-field']['test-map']['longitude'] = array(
                    '#type' => 'textfield',
                    '#title' => 'Longitude',
                    '#description' => 'Longitude'
                );
                
                
                $forms['single-dates'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Date Tests',
                    '#pages' => array('diy-field-tests_page_single-field'),
                    '#context' => 'normal'
                );
                
                // Single Default Date Test
                $forms['single-dates']['test-date'] = array(
                    '#type' => 'date',
                    '#title' => 'Date',
                    '#inline' => true
                );
                 // Single Default Date Test
                $forms['single-dates']['test-date-1'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (1 Month)',
                    '#settings' => array(
                        'numberofmonths' => '1'
                    ),
                    '#inline' => true
                );
                
                // Single Default Date Test
                $forms['single-dates']['test-date-2'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (2 Months)',
                    '#settings' => array(
                        'numberofmonths' => '2'
                    ),
                    '#inline' => true
                );
                
                // Single Default Date Test
                $forms['single-dates']['test-date-3'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (3 Months)',
                    '#settings' => array(
                        'numberofmonths' => '3'
                    ),
                    '#inline' => true
                );
                
                // Single UK Format Date Test
                $forms['single-dates']['test-date-4'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (UK Format)',
                    '#settings' => array(
                        'format' => 'dd/mm/yy'
                    ),
                    '#inline' => true
                );
                
                // Single US Format Date Test
                $forms['single-dates']['test-date-4'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (UK Format)',
                    '#settings' => array(
                        'dateformat' => 'mm/dd/yy'
                    ),
                    '#inline' => true
                );
                
                // Single ISO Format Date Test
                $forms['single-dates']['test-date-5'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (ISO Format)',
                    '#settings' => array(
                        'dateformat' => 'yy-mm-dd'
                    ),
                    '#inline' => true
                );
                // Single ISO Format Date Test
                $forms['single-dates']['test-date-6'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (No Other Months)',
                    '#settings' => array(
                        'numberofmonths' => '4',
                        'showothermonths' => '0'
                    ),
                    '#inline' => true
                );
                 // Single Always Visible Date Test
                $forms['single-dates']['test-date-7'] = array(
                    '#type' => 'date',
                    '#title' => 'Date (Always Visible)',
                    '#settings' => array(
                        'numberofmonths' => '4',
                        'showothermonths' => '1'
                    ),
                    '#inline' => true
                );
                
                /**
                 * Multi Field Tests 
                 * Any fieed can become a multi field by settings its parent to multigroup
                 */
                
                $forms['multi-field'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Single Field Tests',
                    '#pages' => array('tests_page_multi-field'),
                    '#context' => 'normal',
                    '#settings' => array(
                        'always_open' => true
                    )
                );

                $forms['multi-field']['test-group'] = array(
                    '#type' => 'multigroup',
                    '#cardinality' => 5
                );
                  
                $forms['multi-field']['test-group']['test-multi-text'] = array(
                      '#type' => 'textfield',
                    '#title' => 'Text field',
                    '#description' => 'Text field description',
                    '#default_value' => 'Test Default Value'
                );

              

                $forms['multi-field']['test-group2'] = array(
                    '#type' => 'multigroup',
                    '#cardinality' => 5
                );
                  
                $forms['multi-field']['test-group2']['test-multi-textarea'] = array(
                      '#type' => 'textarea',
                    '#title' => 'Text area',
                    '#description' => 'Text area description',
                    '#default_value' => 'Test area Default Value'
                );
                
                $forms['multi-field']['test-group3'] = array(
                    '#type' => 'multigroup',
                    '#cardinality' => 5
                );
                  
                $forms['multi-field']['test-group3']['test-multi-text'] = array(
                      '#type' => 'textfield',
                    '#title' => 'Text',
                    '#description' => 'Text area description',
                    '#default_value' => 'Test area Default Value'
                );
                  $forms['multi-field']['test-group3']['test-multi-text2'] = array(
                      '#type' => 'textfield',
                    '#title' => 'Text',
                    '#description' => 'Text area description',
                    '#default_value' => 'Test area Default Value'
                );
                
                  
                  
                  
                $forms['details'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Property Details',
                    '#pages' => array('tests_page_multi-field'),
                    '#context' => 'normal'
                );  
                $forms['details']['dimensions'] = array(
                    '#type' => 'textfield',
                    '#title' => 'Property Reference',
                    '#description' => 'Enter a unique reference number for this property'
                );  
                $forms['details']['type'] = array(
                    '#type' => 'select',
                    '#title' => 'Sale / Rent',
                    '#description' => 'Is the property for sale or rent',
                    '#options' => array(
                        'sale' => 'Sale',
                        'rent' => 'Rent',
                        'both' => 'Sale &amp; Rent'
                    )
                );    
                
                
                $forms['rooms'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Rooms',
                    '#pages' => array('tests_page_multi-field'),
                    '#context' => 'normal'
                );
                $forms['rooms']['dimensions'] = array(
                    '#type' => 'multigroup',
                    '#cardinality' => 100
                );
                
                $forms['rooms']['dimensions']['name'] = array(
                     '#type' => 'textfield',
                    '#title' => 'Room Name',
                    '#size' => 40,
                    '#description' => 'Name of the room e.g. Entrance Hall'
                );
                  
                $forms['rooms']['dimensions']['length'] = array(
                     '#type' => 'textfield',
                    '#title' => 'Length',
                    '#size' => 10,
                    '#description' => 'Longest dimension',
                     '#field_suffix' => 'm'
                );
                  $forms['rooms']['dimensions']['breadth'] = array(
                    '#type' => 'textfield',
                    '#title' => 'Breadth',
                      '#size' => 10,
                    '#description' => '2nd longest dimension',
                    '#field_suffix' => 'm'
                ); 
                  
                $forms['rooms']['dimensions']['photo'] = array(
                    '#type' => 'attachment',
                    '#title' => 'Photo',
                    '#description' => 'Upload or select a photo.',
                    '#size' => 40
                );
                  
                $forms['rooms']['dimensions']['description'] = array(
                     '#type' => 'textarea',
                    '#title' => 'Description',
                     '#description' => 'Short description of the rooms features',
                      '#rows' => 2,
                    '#cols' => 130
                );
                  
               
                
                
                /**
                 * METABOX VISIBILITY TESTS 
                 */
                
                
                // A metabox that is always open
                $forms['metabox-test-open'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Always Open',
                    '#pages' => array('tests_page_metabox-tests'),
                    '#context' => 'normal',
                    '#settings' => array(
                        'always_open' => true
                    )
                );
                $forms['metabox-test-open']['test-markup'] = array(
                    '#type' => 'item',
                    '#title' => 'Markup Test',
                    '#markup' => '<strong>This</strong> <em>is</em> some markup'
                );
                
                
                // A metabox that starts off closed
                $forms['metabox-test-start-closed'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Start Closed',
                    '#pages' => array('tests_page_metabox-tests'),
                    '#context' => 'normal',
                    '#settings' => array(
                        'always_open' => true
                    )
                );
                $forms['metabox-test-open']['test-markup'] = array(
                    '#type' => 'item',
                    '#title' => 'Markup Test',
                    '#markup' => '<strong>This</strong> <em>is</em> some markup'
                );
                
                // Metabox that starts off as open
                $forms['metabox-test-start-open'] = array(
                    '#type' => 'metabox',
                    '#title' => 'Start Open',
                    '#pages' => array('tests_page_metabox-tests'),
                    '#context' => 'normal',
                    '#settings' => array(
                        'always_open' => true
                    )
                );
                $forms['metabox-test-open']['test-markup'] = array(
                    '#type' => 'item',
                    '#title' => 'Markup Test',
                    '#markup' => '<strong>This</strong> <em>is</em> some markup'
                );
               
                return $forms;
            }
            
        } // class
        
        // start
        $diy = new Diy();
        
    } // exists
} // init