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

/* Edit tablename */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/tablename'");
if (!count($data)) {
    echo "Jaijaz_boilerplate: Adding <b>Edit Tablename</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Edit Tablename', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/tablename', pg_parent=". Jojo::clean($_ADMIN_CONTENT_ID).", pg_order=4, pg_sitemapnav='no', pg_xmlsitemapnav='no', pg_index='no', pg_followto='no', pg_followfrom='yes'");
}

$data = Jojo::selectRow("SELECT pageid FROM {page} WHERE pg_url='admin/edit/tablename'");
$tablenamepageid = $data['pageid'];

/* Edit Products Categories */
$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_url='admin/edit/tablename_category'");
if (!count($data)) {
    echo "Jaijaz_boilerplate: Adding <b>Edit Tablename Categories</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='Edit Tablename Categoriess', pg_link='Jojo_Plugin_Admin_Edit', pg_url='admin/edit/tablename_category', pg_parent=".$tablenamepageid.", pg_order=4, pg_sitemapnav='no', pg_xmlsitemapnav='no', pg_index='no', pg_followto='no', pg_followfrom='yes'");
}

$data = Jojo::selectQuery("SELECT * FROM {page} WHERE pg_link='Jojo_Plugin_Jaijaz_boilerplugin'");
if (!count($data)) {
    echo "Jaijaz_boilerplate: Adding <b>BoilerPlate</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO {page} SET pg_title='BoilerPlate', pg_link='Jojo_Plugin_Jaijaz_boilerplugin', pg_url='boiler-plate'");
}
