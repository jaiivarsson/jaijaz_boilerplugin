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


$table = 'tablename';
$query = "
    CREATE TABLE {tablename} (
        `tablenameid` int(11) NOT NULL auto_increment,
        `name` varchar(255) NOT NULL default '',
        `body` text NOT NULL,
        `body_code` text NOT NULL,
        `image` varchar(255) NOT NULL default '',
        `price` decimal(11,2) NOT NULL default '0.00',
        `displayorder` varchar(255) NOT NULL default '',
        `code` varchar(255) NOT NULL default '',
        `size` varchar(255) NOT NULL default '',
        `category` varchar(255) NOT NULL default '',
        PRIMARY KEY  (`tablenameid`)
        ) ENGINE=MyISAM CHARSET=utf8 COLLATE utf8_general_ci AUTO_INCREMENT=1000;
    ";


/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jaijaz_boilerplugin: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jaijaz_boilerplugin: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) Jojo::printTableDifference($table, $result['different']);



$table = 'tablename_category';
$query = "
    CREATE TABLE {tablename_category} (
        `tablenamecategoryid` int(11) NOT NULL auto_increment,
        `name` varchar(255) NOT NULL default '',
        `caturl` varchar(255) NOT NULL default '',
        PRIMARY KEY  (`tablenamecategoryid`)
        ) ENGINE=MyISAM CHARSET=utf8 COLLATE utf8_general_ci;
    ";


/* Check table structure */
$result = Jojo::checkTable($table, $query);

/* Output result */
if (isset($result['created'])) {
    echo sprintf("jaijaz_boilerplugin: Table <b>%s</b> Does not exist - created empty table.<br />", $table);
}

if (isset($result['added'])) {
    foreach ($result['added'] as $col => $v) {
        echo sprintf("jaijaz_boilerplugin: Table <b>%s</b> column <b>%s</b> Does not exist - added.<br />", $table, $col);
    }
}

if (isset($result['different'])) Jojo::printTableDifference($table, $result['different']);