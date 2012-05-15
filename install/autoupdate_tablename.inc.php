<?php
/**
 *                    Jaijaz Classes
 *                =====================
 *
 * Copyright 2010 Jaijaz <jai@jaijaz.co.nz>
 *
 * @author  Jai Ivarsson <jai@jaijaz.co.nz>
 */


$table = 'tablename';
$o = 1;

$default_td[$table]['td_displayfield'] = 'name';
$default_td[$table]['td_parentfield'] = '';
$default_td[$table]['td_rolloverfield'] = 'name';
$default_td[$table]['td_orderbyfields'] = 'displayorder, name';
$default_td[$table]['td_topsubmit'] = 'yes';
$default_td[$table]['td_filter'] = 'yes';
$default_td[$table]['td_deleteoption'] = 'yes';
$default_td[$table]['td_menutype'] = 'tree';
$default_td[$table]['td_categoryfield'] = 'category';
$default_td[$table]['td_categorytable'] = 'tablename_category';
$default_td[$table]['td_group1'] = '';
$default_td[$table]['td_help'] = '';

/* Product ID */
$field = 'tablenameid';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'ID';
$default_fd[$table][$field]['fd_type']     = 'readonly';
$default_fd[$table][$field]['fd_help']     = 'A unique ID, automatically assigned by the system';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* Name */
$field = 'name';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'Name of the item';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Code Body */
$field = 'body_code';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'texteditor';
$default_fd[$table][$field]['fd_options']  = 'body';
$default_fd[$table][$field]['fd_rows']     = '10';
$default_fd[$table][$field]['fd_cols']     = '50';
$default_fd[$table][$field]['fd_help']     = 'Full description of the item';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Body */
$field = 'body';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'hidden';
$default_fd[$table][$field]['fd_options']  = '';
$default_fd[$table][$field]['fd_rows']     = '10';
$default_fd[$table][$field]['fd_cols']     = '50';
$default_fd[$table][$field]['fd_help']     = 'Full description of the item';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* Image */
$field = 'image';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'fileupload';
$default_fd[$table][$field]['fd_help']     = 'Image of item';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'standard';

/* price */
$field = 'price';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'decimal';
$default_fd[$table][$field]['fd_help']     = 'Price of item';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'standard';

/* Order */
$field = 'displayorder';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'order';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_help']     = 'Order in which the item appears in the listing';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'standard';

/* Code */
$field = 'code';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_size']     = '20';
$default_fd[$table][$field]['fd_help']     = 'Unique code';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Name */
$field = 'size';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_size']     = '20';
$default_fd[$table][$field]['fd_help']     = 'Name of the product';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Category */
$field = 'category';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'dblist';
$default_fd[$table][$field]['fd_options']  = 'tablename_category';
$default_fd[$table][$field]['fd_required'] = 'no';
$default_fd[$table][$field]['fd_help']     = 'Category of the product';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'standard';


$table = 'tablename_category';
$o = 1;

$default_td[$table]['td_displayfield'] = 'name';
$default_td[$table]['td_parentfield'] = '';
$default_td[$table]['td_rolloverfield'] = 'name';
$default_td[$table]['td_orderbyfields'] = 'name';
$default_td[$table]['td_topsubmit'] = 'yes';
$default_td[$table]['td_filter'] = 'yes';
$default_td[$table]['td_deleteoption'] = 'yes';
$default_td[$table]['td_menutype'] = 'list';
$default_td[$table]['td_categoryfield'] = '';
$default_td[$table]['td_categorytable'] = '';
$default_td[$table]['td_group1'] = '';
$default_td[$table]['td_help'] = '';

/* Product Category ID */
$field = 'tablenamecategoryid';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'ID';
$default_fd[$table][$field]['fd_type']     = 'readonly';
$default_fd[$table][$field]['fd_help']     = 'A unique ID, automatically assigned by the system';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'advanced';

/* Name */
$field = 'name';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_type']     = 'text';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'Name of the item Category';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'basic';

/* Name */
$field = 'caturl';
$default_fd[$table][$field]['fd_order']    = $o++;
$default_fd[$table][$field]['fd_name']     = 'URL';
$default_fd[$table][$field]['fd_type']     = 'internalurl';
$default_fd[$table][$field]['fd_required'] = 'yes';
$default_fd[$table][$field]['fd_size']     = '40';
$default_fd[$table][$field]['fd_help']     = 'URL of the item Category';
$default_fd[$table][$field]['fd_tabname']  = 'Content';
$default_fd[$table][$field]['fd_mode']     = 'basic';