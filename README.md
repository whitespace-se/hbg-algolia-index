# Algolia Index

Manages algolia index (with ms-support and mixed indexes). This is intended to be used by delvelopers. This plugin provide the following set of features:

 - Replaces algolia search on the front-end with algolia. 
 - Index all public searchable posts on post update or creation.
 - WpCLI jobs to bulk update all posts on the site. 
 - Support mixed indices (multiple wordpress sites in the same index). 

 TODO: Large record splitting. 

 ## Installation

 1. Install with: "composer require helsingborg-stad/algolia-index"
 2. Run composer install inside the plugin. 
 3. Add required definitions of constants.  
 3. Run wp-cli job "wp algolia-index bulk"

## Constants

- define('ALGOLIAINDEX_APPLICATION_ID', 'ALGOLIAAPPID'); - REQUIRED
- define('ALGOLIAINDEX_API_KEY', 'ALGOLIAAPIKEY'); - REQUIRED
- define('ALGOLIAINDEX_INDEX_NAME', 'INDEX'); - OPTIONAL

## Filters

- AlgoliaIndex/ShouldIndex: Add more rules to the should index function (removal not possible).
- AlgoliaIndex/Record: What data to send to algolia.
- AlgoliaIndex/Compare: What fields to compare to determine if a post has been updated.
- AlgoliaIndex/SearchableAttributes: What attriubutes in record to be searchable.
- AlgoliaIndex/GeneratedIndexName: Filter for the autogenerated index name.

## WP CLI

- wp algolia-index build: Index all pages/posts on site.
- wp algolia-index rebuild: Clear index. And run new build. *

* This action is not fully compatible with multiple sites in one shared index! Sites that share the same index will be cleared but not reindexed. 