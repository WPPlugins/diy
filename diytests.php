<?php
/**
 * Plugin Name: Diy Plugin Test Suite
 * Plugin URI: http://github.com/onemanonelaptop/diy
 * Description: Field widget test suite for the diy plugin framework. When activated it adds one of every type of field to the options page, new post and new page screens
 * Version: 0.0.8
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

// Check if the DIY framework plugin is installed and prompt if necessary
if (!in_array( 'diy/diyplugin.php', (array) get_option( 'active_plugins', array() )) ) {      
        add_action('admin_notices', create_function('','echo "<div class=\"updated\"><p>This plugin requires the <em>Diy Plugin Framework</em> to operate, <a href=\"http://wordpress.org/extend/plugins/diy/\">install it now?</a></p></div>"; ')); 
} // end if

add_action( 'diy_init', 'testdiy_init' );

/**
 * Define the entire functionality inside the diy_init action which only called
 * if the diy plugin is present and activated.
 */
function testdiy_init() {  
    if ( !class_exists( 'TestDiy' ) ) {
        /**
         * Extend the diy framework and make a plugin
         */
        class TestDiy extends Diy {

                /*
                 * @var string The slug of the plugin (lowercase,hyphens)
                 */
                var $slug = 'diy';
                /*
                 * @var string What the plugin is being used for ('plugin','theme','meta')
                 */
                var $usage = 'plugin';
                /*
                 * @var string The title used on the options page
                 */
                var $settings_page_title = 'Diy Plugin Test Suite';
                /*
                 * @var string The link text used in the admin menu
                 */
                var $settings_page_link = 'Diy Plugin Tests';

                var $exportable = true;
                
                /**
                * Define the metaboxes and fields (called by parent class contructor)
                * For plugin specific functionality use the start() function
                * @access   public
                * @return   void
                */
                function init() {
                
                    // Add a metabox for the single field tests
                    $this->metabox(
                        array( 
                            'id' => 'field-tests-single',
                            'title' => 'Field Tests (Single)'
                        )
                    ); 
                    
                    // Add a metabox for the repeatable field tests
                    $this->metabox(
                        array( 
                            'id' => 'field-tests-multi',
                            'title' => 'Field Tests (Single)'
                        )
                    ); 
                    
                    // Checkbox field test
                    $this->field(
                        array(
                            "taxonomy" => "category", // the id of the metabox this field resides inside
                            "group" => "tax-checkbox-single", // The form field name
                            "title" => "Checkbox", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "checkbox",
                                    "description" => "Checkbox Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    
                    // Checkbox field test
                    $this->field(
                        array(
                            "taxonomy" => "category", // the id of the metabox this field resides inside
                            "group" => "tax-text-single", // The form field name
                            "title" => "Checkbox", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "text",
                                    "description" => "Checkbox Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                      // Color picker field test
                    $this->field(
                        array(
                            "taxonomy" => "category", 
                            "group" => "tax-color-single", // The form field name
                            "title" => "Color", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "color",
                                    "description" => "Color Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    
                    
                    // Checkbox field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-checkbox-single", // The form field name
                            "title" => "Checkbox", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "checkbox",
                                    "description" => "Checkbox Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
// Text field test
$this->field(
    array(
        "metabox" => "field-tests-single", // the id of the metabox this field resides inside
        "group" => "test-text-single", // The form field name
        "title" => "Text", // Title used when prompting for input
        "max" => "1",
        "fields" => array(
            "value" => array(
                "type" => "text",
                "description" => "Text Description",
                    "required" => true,
                    "placeholder" => 'This is a required field with a placeholder',
            )
        ) // end fields
    ) // end array
);
                    
                    // Textarea field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-textarea-single", // The form field name
                            "title" => "Textarea", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "textarea",
                                    "description" => "Textarea Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Select box field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-select-single", // The form field name
                            "title" => "Select", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "select",
                                    "description" => "Select Description",
                                    "selections" => array("0"=>"0","1"=>"1","2"=>"2")
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                     // Select box multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-radio-single", // The form field name
                            "title" => "Radio", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "radio",
                                    "description" => "Multi Radio Description",
                                    "selections" => array("0"=>"0","1"=>"1","2"=>"2")
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Color picker field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-color-single", // The form field name
                            "title" => "Color", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "color",
                                    "description" => "Color Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Attachment single
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-attachment-single", // The form field name
                            "title" => "Attachment", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "attachment",
                                    "description" => "Attachment Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // WYSIWYG field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-wysiwyg-single", // The form field name
                            "title" => "WYSIWYG", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "text",
                                    "description" => "WYSIWYG Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Date field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-date-single", // The form field name
                            "title" => "Date", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "date",
                                    "description" => "Date Description",
                                    "numberofmonths" => "4",
                                    "showothermonths" => "false",
                                    "dateformat" => "dd/mm/yy"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Suggest posts field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-suggest-post-single", // The form field name
                            "title" => "Suggest Posts", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Posts Description",
                                    "wp_query" => array("post_type" => "post"),
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Suggest pages field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-suggest-pages-single", // The form field name
                            "title" => "Suggest Pages", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Pages Description",
                                    "wp_query" => array("post_type" => "page"),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                    
                    // Suggest pages field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-suggest-all-users-single", // The form field name
                            "title" => "Suggest All Users", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest All Users Description",
                                    "wp_query" => array('orderby' => 'display_name'),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                    // Suggest pages field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-suggest-subscribers-users-single", // The form field name
                            "title" => "Suggest Subscribers", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Subscribers Description",
                                    "wp_query" => array('role' => 'subscriber'),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                    
                    // Suggest location field test
                     $this->field(
			array(
				"metabox" => "field-tests-single", // the id of the metabox this field resides inside
				"group" => "test-location-single", // The form field name
				"title" => "Location", // Title used when prompting for input
				"max" => "1",
				"fields" => array(
					"map" => array(
						"type" => "map",
						"title" => "Select the  location by clicking on the map",
						"label_style" => "block",
						"description" => "",
						"placeholder" => "",
						"width" => "",
						"height" => "250",
						"tooltip" => "",
						"latfield" => "test-location-single[0][latitude]",
						"longfield" => "test-location-single[0][longitude]"
					),
					"latitude" => array(
						"type" => "text",
						"title" => "Latitude",
						"label_style" => "inline",
						"label_width" => "100",
						"description" => "",
						"placeholder" => "",
						"width" => "",
						"height" => "",
						"tooltip" => ""
					),
					"longitude" => array(
						"type" => "text",
						"title" => "Longitude",
						"label_style" => "inline",
						"label_width" => "100",
						"description" => "",
						"placeholder" => "",
						"width" => "",
						"height" => "",
						"tooltip" => ""
					)
				) // end fields
			) // end array
                             );
                     
                     
                     $this->field(
                        array(
                            "metabox" => "field-tests-single", // the id of the metabox this field resides inside
                            "group" => "test-suggest-pages-single2", // The form field name
                            "title" => "Suggest Posts", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Posts Custom Filter",
                                    "wp_query" => array("post_type" => "page"),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                    // MULTI FIELD TESTS
                    
                     // Checkbox multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-checkbox-multi", // The form field name
                            "title" => "Checkbox", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "checkbox",
                                    "description" => "Multi Checkbox Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Text multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-text-multi", // The form field name
                            "title" => "Text", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "text",
                                    "description" => "Multi Text Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Textarea multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-textarea-multi", // The form field name
                            "title" => "Textarea", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "textarea",
                                    "description" => "Multi Textarea Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Color picker multiple and sortable field test
                    
                    
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi",
                            "group" => "test-color-multi", 
                            "title" => "Sortable Colors", 
                            "max" => "5",
                            "sortable" => true,
                            "fields" => array(
                                "value" => array(
                                    "type" => "color",
                                    "description" => "Choose a color"
                                )
                            )
                        )
                    ); 
                    
                    // Attachment multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-attachment-multi", // The form field name
                            "title" => "Attachment", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "attachment",
                                    "description" => "Multi Attachment Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Select box multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-select-multi", // The form field name
                            "title" => "Select", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "select",
                                    "description" => "Multi Select Description",
                                    "selections" => array("0"=>"0","1"=>"1","2"=>"2")
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                     // Select box multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-radio-multi", // The form field name
                            "title" => "Radio", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "radio",
                                    "description" => "Multi Radio Description",
                                    "selections" => array("0"=>"0","1"=>"1","2"=>"2")
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    // Date multiple field test
                     $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-date-multi", // The form field name
                            "title" => "Date", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "date",
                                    "description" => "Date Description",
                                    "numberofmonths" => "3",
                                    "showothermonths" => "false",
                                    "dateformat" => "dd/mm/yy"
                                )
                            ) // end fields
                        ) // end array
                    );
                      
                     // Google Map multiple field test
                     $this->field(
			array(
				"metabox" => "field-tests-multi", // the id of the metabox this field resides inside
				"group" => "test-location-multi", // The form field name
				"title" => "Location", // Title used when prompting for input
				"max" => "1",
				"fields" => array(
					"map" => array(
						"type" => "map",
						"title" => "Select the  location by clicking on the map",
						"label_style" => "block",
						"description" => "",
						"placeholder" => "",
						"width" => "",
						"height" => "250",
						"tooltip" => "",
						"latfield" => "test-location-multi[0][latitude]",
						"longfield" => "test-location-multi[0][longitude]"
					),
					"latitude" => array(
						"type" => "text",
						"title" => "Latitude",
						"label_style" => "inline",
						"label_width" => "100",
						"description" => "",
						"placeholder" => "",
						"width" => "",
						"height" => "",
						"tooltip" => ""
					),
					"longitude" => array(
						"type" => "text",
						"title" => "Longitude",
						"label_style" => "inline",
						"label_width" => "100",
						"description" => "",
						"placeholder" => "",
						"width" => "",
						"height" => "",
						"tooltip" => ""
					)
				) // end fields
			) // end array
                             );
                     
                     // Suggest posts multiple field test
                    $this->field(
                        array(
                            "metabox" => "field-tests-multi", // the id of the metabox this field resides inside
                            "group" => "test-suggest-post-multi", // The form field name
                            "title" => "Suggest Posts", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Posts Description",
                                    "wp_query" => array("post_type" => "post"),
                                )
                            ) // end fields
                        ) // end array
                    );
                       
                       
                    // *********************************************************  
                    // POST METABOX FIELD TEST
                    // *********************************************************
                      
                    $this->metabox(
                            array( 
                                'id' => 'field-post-tests-single',
                                'title' => 'Field Post Tests (Single)',
                                'post_type' => array('post','page')
                            )
                    ); 
                    
                 
                        
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-checkbox-single", // The form field name
                            "title" => "Checkbox", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "checkbox",
                                    "description" => "Checkbox Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-text-single", // The form field name
                            "title" => "Text", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "text",
                                    "description" => "Text Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-textarea-single", // The form field name
                            "title" => "Textarea", // Title used when prompting for input
                            "max" => "1",
                            "style" => "block",
                            "fields" => array(
                                "value" => array(
                                    "type" => "textarea",
                                    "description" => "Textarea Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-select-single", // The form field name
                            "title" => "Select", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "select",
                                    "description" => "Select Description",
                                    "selections" => array("0"=>"0","1"=>"1","2"=>"2")
                                )
                            ) // end fields
                        ) // end array
                    );

                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-color-single", // The form field name
                            "title" => "Colors", // Title used when prompting for input
                            "max" => "1",
                           
                            "fields" => array(
                                "value" => array(
                                    "type" => "color",
                                    "description" => "Color Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-attachment-single", // The form field name
                            "title" => "Attachment", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "attachment",
                                    "description" => "Attachment Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                   
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-date-single", // The form field name
                            "title" => "Date", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "date",
                                    "description" => "Date Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-post-single", // The form field name
                            "title" => "Suggest Posts", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Posts Description",
                                    "wp_query" => array("post_type" => "post"),
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-pages-single", // The form field name
                            "title" => "Suggest Pages", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Pages Description",
                                   "wp_query" => array("post_type" => "page"),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                     $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-users-single", // The form field name
                            "title" => "Suggest All Users", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest All Users",
                                    "wp_query" => array(),
                                )
                            ) // end fields
                        ) // end array
                    ); 

                    $this->field(
                        array(
                            "metabox" => "field-post-tests-single", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-subscribers-single", // The form field name
                            "title" => "Suggest Users (Subscriber)", // Title used when prompting for input
                            "max" => "1",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest All Subscribers",
                                    "wp_query" => array("role" => "subscriber"),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                    
                    /**
                     * Post Metabox Multiple Fields Test 
                     */
                    
                     
                     $this->metabox(
                            array( 
                                'id' => 'field-post-tests-multi',
                                'title' => 'Field Post Tests (multi)',
                                'post_type' => array('post','page')
                            )
                    ); 
                    
                 
                        
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-checkbox-multi", // The form field name
                            "title" => "Checkbox", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "checkbox",
                                    "description" => "Checkbox Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-text-multi", // The form field name
                            "title" => "Text", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "text",
                                    "description" => "Text Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-textarea-multi", // The form field name
                            "title" => "Textarea", // Title used when prompting for input
                            "max" => "5",
                            "style" => "block",
                            "fields" => array(
                                "value" => array(
                                    "type" => "textarea",
                                    "description" => "Textarea Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-select-multi", // The form field name
                            "title" => "Select", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "select",
                                    "description" => "Select Description",
                                    "selections" => array("0"=>"0","1"=>"1","2"=>"2")
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-color-multi", // The form field name
                            "title" => "Colors", // Title used when prompting for input
                            "max" => "5",
                           
                            "fields" => array(
                                "value" => array(
                                    "type" => "color",
                                    "description" => "Color Description",
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-attachment-multi", // The form field name
                            "title" => "Attachment", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "attachment",
                                    "description" => "Attachment Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                   
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-date-multi", // The form field name
                            "title" => "Date", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "date",
                                    "description" => "Date Description"
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-post-multi", // The form field name
                            "title" => "Suggest Posts", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Posts Description",
                                    "wp_query" => array("post_type" => "post"),
                                )
                            ) // end fields
                        ) // end array
                    );
                    
                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-pages-multi", // The form field name
                            "title" => "Suggest Pages", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest Pages Description",
                                   "wp_query" => array("post_type" => "page"),
                                )
                            ) // end fields
                        ) // end array
                    ); 
                    
                     $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-users-multi", // The form field name
                            "title" => "Suggest All Users", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest All Users",
                                    "wp_query" => array(),
                                )
                            ) // end fields
                        ) // end array
                    ); 

                    $this->field(
                        array(
                            "metabox" => "field-post-tests-multi", // the id of the metabox this field resides inside
                            "group" => "post-tests-suggest-subscribers-multi", // The form field name
                            "title" => "Suggest Users (Subscriber)", // Title used when prompting for input
                            "max" => "5",
                            "fields" => array(
                                "value" => array(
                                    "type" => "suggest",
                                    "description" => "Suggest All Subscribers",
                                    "wp_query" => array("role" => "subscriber"),
                                )
                            ) // end fields
                        ) // end array
                    ); 

                } // end function
                
                /**
                 * Plugin specific functions
                 * @return  void
                 */
                function start() {
                   
                }
                
                
                
        } // end class
        $testdiy = new TestDiy(__FILE__); 
    } // end if class exists
} // end init



