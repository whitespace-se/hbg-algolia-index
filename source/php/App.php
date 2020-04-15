<?php

namespace AlgoliaIndex;

class App
{
    public function __construct()
    {
        //Warn for missing api-keys, end execution
        if(!defined('ALGOLIAINDEX_API_KEY')||!defined('ALGOLIAINDEX_API_KEY')) {
            add_action('admin_notices', array($this, 'displayAdminNotice'));
            return; 
        }
        
        //Run plugin
        new \AlgoliaIndex\Index(); 
        new \AlgoliaIndex\Search(); 

        //Cli api (bulk actions)
        if(defined('WP_CLI') && WP_CLI == true) {
            new \AlgoliaIndex\Bulk();
        }
    }

    /**
     * Throw warning for undefined constants. 
     *
     * @return void
     */
    public function displayAdminNotice(){
        echo '<div class="notice notice-error"><p>'; 
        _e("Required constants undefined, algolia will not run before setting ALGOLIAINDEX_APPLICATION_ID and ALGOLIAINDEX_API_KEY constants.", 'algolia-index');
        echo '</p></div>';
    }
    
}
