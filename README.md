# Algolia Index

Manages algolia index (with ms-support and mixed indexes). This is intended to be used by delvelopers. This plugin provide the following set of features:

 - Replaces algolia search on the front-end with algolia. 
 - Index all public searchable posts on post update or creation.
 - WpCLI jobs to bulk index all posts on the site. 
 - Support mixed indices (multiple wordpress sites in the same index). 
 - Large record splitting (content field). 
 - Implements "needs update" check before querying algolia, to save costly updates. The functionality is not implemented on split records. 

 ## Installation

 1. Install with: "composer require helsingborg-stad/algolia-index"
 2. Run composer install inside the plugin. 
 3. Add required definitions of constants.  
 3. Run wp-cli job "wp algolia-index build"

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
- AlgoliaIndex/RecordToLarge: Turn off record to large repoting by returning false. To disable record splitting. Only compatbile with business plans, not reccommended!. 
- AlgoliaIndex/IndexablePostTypes: What posttypes to index. 
- AlgoliaIndex/HitsPerPage: Number of hits per page.
- AlgoliaIndex/AttributesToSnippet: What attributes to snippet.
- AlgoliaIndex/SnippetEllipsisText: Suffix for snippet.
- AlgoliaIndex/BackendSearchActive: Send false to disable backend search.

## Actions
- AlgoliaIndex/IndexPostId: Trigger reindex on a post id. 

## WP CLI

- wp algolia-index build: Index all pages/posts on site. To clear index* before build, add flag --clearindex=true. 

* This action is not fully compatible with multiple sites in one shared index! Sites that share the same index will be cleared but not reindexed.