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

class Jojo_Plugin_Jaijaz_boilerplugin extends Jojo_Plugin
{
    function _getContent()
    {
        global $smarty;
        $content = array();
        $id = Jojo::getFormData('id', 0);
        $cat = Jojo::getFormData('cat', 0);
        if (empty($id) && empty($cat)) $smarty->assign('all', 'yes');
        
        /* get content if the id is set */
        if (!empty($id) && !empty($cat)) {
            $item = array();
            $item = Jojo::selectRow("SELECT p.*, c.name as catname, c.caturl FROM {tablename} p, {tablename_category} c WHERE p.category = c.tablenamecategoryid AND tablenameid=? LIMIT 1", $id);
            
            if (!count($item)) {
                if (!empty($cat)) {
                	Jojo::redirect(_SITEURL.'/tablename/'.$cat);
                } else {
                	Jojo::redirect(_SITEURL.'/tablename/');
                }
            }
            /* Add breadcrumb */
            $breadcrumbs = $this->_getBreadCrumbs();
            $breadcrumb = array();
            $breadcrumb['name'] = $item['catname'];
            $breadcrumb['url'] = 'tablename/' . $item['caturl'];
            $breadcrumbs[count($breadcrumbs)] = $breadcrumb;
            
            $breadcrumb = array();
            $breadcrumb['name'] = $item['name'];
            $breadcrumb['url'] = Jojo::rewrite('tablename', $id, $item['name'], '');
            $breadcrumbs[count($breadcrumbs)] = $breadcrumb;
            
            $smarty->assign('item', $item);
            $content['title']           = $item['name'];
            $content['seotitle']        = $item['name'];
            $content['metadescription'] = "A formula based on ".$item['name'];
            $content['content']         = $smarty->fetch('jaijaz_boilerplugin_detail.tpl');
            $content['breadcrumbs']     = $breadcrumbs;
        } elseif (!empty($cat)) {
            $category = Jojo::selectRow("SELECT * FROM {tablename_category} WHERE caturl = ?", $cat);
            $smarty->assign('catid', $category['tablenamecategoryid']);
            $items = Jojo::selectQuery("SELECT * FROM {tablename} p WHERE category=? ORDER BY displayorder, name", $categories['tablenamecategoryid']);
            $n = count($items);
			foreach ($items as $i => $item) {
				$items[$i]['id'] = $item['tablenameid'];
				$items[$i]['url'] = Jojo::rewrite('products', $item['tablenameid'], $item['name'], '');
			}
			$smarty->assign('items', $items);
            
            /* Add breadcrumb */
            $breadcrumbs = $this->_getBreadCrumbs();
            $breadcrumb = array();
            $breadcrumb['name'] = $data['name'];
            $breadcrumb['url'] = "products/".$categories['name'];
            $breadcrumbs[count($breadcrumbs)] = $breadcrumb;
            
            $content['title'] = $category['name'];
            $content['seotitle'] = $category['name'];
            $content['content'] = $smarty->fetch('jaijaz_boilerplugin_index.tpl');
        } else {
        
        /* get the content if there is no id set */
            $catlist = Jojo::selectQuery("SELECT * FROM {tablename_category} ORDER BY name");
            $smarty->assign('catlist', $catlist);
            /*
$products = Jojo::selectQuery("SELECT * FROM {products} ORDER BY displayorder, name");
            $n = count($products);
			for ($i=0;$i<$n;$i++) {
				$productid = $products[$i]['productid'];
				$products[$i]['id'] = $products[$i]['productid'];
				$products[$i]['url'] = Jojo::rewrite('products', $products[$i]['productid'], $products[$i]['name'], '');
			}
            $smarty->assign('products', $products);
*/
            $content['content'] = $smarty->fetch('jaijaz_boilerplugin_index.tpl');
        }

        return $content;
    }
    
    function getCorrectUrl()
    {
        //Assume the URL is correct
        return _PROTOCOL.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
    
    /**
     * Sitemap filter
     *
     * Receives existing sitemap and adds product pages pages
     */
    function sitemap($sitemap)
    {
        
        $catlist = Jojo::selectQuery("SELECT * FROM {tablename_category}");
        $items = Jojo::selectQuery("SELECT * FROM {tablename} ORDER BY displayorder, name");
        if (count($catlist)>0) {
        	foreach ($catlist as $c => $cat) {
        		$tree = new hktree();
        		$tree->addNode('index', 0, $catlist[$c]['name'], 'tablename/'.$catlist[$c]['caturl'].'/');
        		foreach ($products as $p => $product) {
        			if ($catlist[$c]['tablenamecategoryid'] == $items[$p]['category']) {
        				$tree->addNode($items[$p]['productid'], 0, $items[$p]['name'], Jojo::rewrite('tablename/'.$catlist[$c]['caturl'], $items[$p]['productid'], $items[$p]['name'], ''));
        			}
        		}
        		
        		$sitemapsection = array();
        		$sitemapsection['title']  = $catlist[$c]['name'];
        		$sitemapsection['tree']   = $tree->asArray();
        		$sitemapsection['order']  = 8;
        		$sitemapsection['header'] = '';
        		$sitemapsection['footer'] = '';
        		$sitemap[$catlist[$c]['name']]     = $sitemapsection;
        	}
        } else {
        	$tree = new hktree();
        	$tree->addNode('index', 0, 'Tablename', 'tablename/');
        	$tree->addNode($items[$p]['tablenameid'], 0, $items[$p]['name'], Jojo::rewrite('tablename/'.$catlist[$c]['caturl'], $items[$p]['tablenameid'], $items[$p]['name'], ''));
        	/* Add to the sitemap array */
        	$sitemapsection = array();
        	$sitemapsection['title']  = 'Tablename';
        	$sitemapsection['tree']   = $tree->asArray();
        	$sitemapsection['order']  = 8;
        	$sitemapsection['header'] = '';
        	$sitemapsection['footer'] = '';
        	$sitemap['tablename']     = $sitemapsection;
        }
        
        return $sitemap;
    } 
   
    /**
     * XML Sitemap filter
     *
     * Receives existing sitemap and adds gallery pages
     */
    function xmlsitemap($sitemap)
    {
        /* get and add the product categories */
        $catlist = Jojo::selectQuery("SELECT * FROM {tablename_category}");
        if (count($catlist)>0) {
        	foreach($catlist as $c) {
        	    $url           = _SITEURL . '/tablename/' . Jojo::cleanURL($c['name']);
        	    $lastmod       = '';
        	    $priority      = 0.6;
        	    $changefreq    = '';
        	    $sitemap[$url] = array($url, $lastmod, $changefreq, $priority);
        	}
        }
        
        /* Get practitioners from database */
        $items = Jojo::selectQuery("SELECT p.*, c.name as catname, c.caturl FROM {tablename} p, {tablename_category} c WHERE p.category = c.tablenamecategoryid ORDER BY p.displayorder, p.name");

        /* Add courses categories to sitemap */
        foreach($items as $i) {
            $url           = _SITEURL . '/' . Jojo::rewrite('tablename/'.$i['caturl'], $i['tablenameid'], $i['name'], ''); 
            $lastmod       = '';
            $priority      = 0.5;
            $changefreq    = '';
            $sitemap[$url] = array($url, $lastmod, $changefreq, $priority);
        }

        /* Return sitemap */
        return $sitemap;
    }

}