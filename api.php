<?php
/**
 * Jojo CMS - Jaijaz Boiler plate plugin
 *
 * Copyright 2012 Jaijaz
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Jai Ivarsson <jai@jaijaz.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jaijaz.co.nz Jaijaz
 * @package jaijaz_boilerplugin
 */

$_provides['pluginClasses'] = array(
        'Jojo_Plugin_Jaijaz_boilerplugin'       => 'Jaijaz - BoilerPlate'
        );

Jojo::registerUri('tablename/[cat:string]/[id:integer]/[string]', 'Jojo_Plugin_Jaijaz_boilerplugin');
Jojo::registerUri('tablename/[cat:string]', 'Jojo_Plugin_Jaijaz_boilerplugin');

/* Sitemap filter */
Jojo::addFilter('jojo_sitemap', 'sitemap', 'jaijaz_boilerplugin');

/* XML Sitemap filter */
Jojo::addFilter('jojo_xml_sitemap', 'xmlsitemap', 'jaijaz_boilerplugin');


/*
//Example option.
//If you need to add an option into Jojo using your plugin, copy-paste this code to make a start.
$_options[] = array(
    'id'          => 'my_example_option',
    'category'    => 'Examples',
    'label'       => 'An example option',
    'description' => 'This is a simple example option.',
    'type'        => 'text',
    'default'     => '',
    'options'     => '',
    'plugin'      => 'empty_plugin'
);
*/