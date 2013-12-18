<?php
/*
 * SimplePie CakePHP Component
 * Copyright (c) 2007 Matt Curry
 * www.PseudoCoder.com
 *
 * Based on the work of Scott Sansoni (http://cakeforge.org/snippet/detail.php?type=snippet&id=53)
 *
 * @author      mattc <matt@pseudocoder.com>
 * @version     1.0
 * @license     MIT
 *
 */
class SimplepieComponent extends Component {
  var $cache;

  function __construct() {
    $this->cache = CACHE . 'rss' . DS;
  }

  function feed($feed_url) {

    //make the cache dir if it doesn't exist
    if (!file_exists($this->cache))
    {
      App::uses('Folder', 'Utility');
      App::uses('File', 'Utility');

      $folder = new Folder();
      $folder->create($this->cache); 
    }

    //include the vendor class
    App::import('vendor', 'simplepie');

    //setup SimplePie
    $feed = new SimplePie();
    $feed->set_feed_url($feed_url);
    $feed->set_cache_location($this->cache);
    $feed->enable_cache(true);
    $feed->set_cache_duration(600); //10min
 
    //retrieve the feed
    $feed->init();
    $feed->handle_content_type();

    //return
    if ($feed) {
      return $feed;
    } else {
      return false;
    }
  }
}
?>
