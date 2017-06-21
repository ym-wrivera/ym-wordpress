# Mergebot #
**Contributors:** deliciousbrains  
**Tags:** data, database, merging, mysql, migration, development, merge, wordpress database merging, merging solution  
**Requires at least:** 4.0  
**Tested up to:** 4.7.3  
**Stable tag:** 0.3.2-beta  
**License:** GPLv3  

WordPress database merging made easy

## Description ##

Mergebot is the complete solution for merging your databases when developing with different environments for a site.

> <strong>Mergebot App</strong><br>
> The Mergebot plugin integrates with the Mergebot application. You must have a Mergebot account in order to take advantage of this plugin. <a href="https://mergebot.com/?utm_source=wordpress.org&utm_medium=web&utm_campaign=wp-plugin-readme" rel="friend" title="Mergebot App">Click here to create your account</a>.

Mergebot allows you to make changes to a local copy of your site, then apply those changes to the live site without losing any changes that have be made on the live site in that time, effectively merging your databases.

For example, you manage an ecommerce site for a client. If you take a copy of the site and add some pages, you cannot simply migrate the local database to live as it would overwrite any orders that have come in on the live site. With Mergebot, those changes are recorded locally and then safely applied to the live site without interfering with any new live data.

Mergebot safely handles relationships between WordPress data as well as detecting conflicts with changes made on the live site, allowing you to resolve them before applying the changes.

For more information check out <a href="https://mergebot.com/?utm_source=wordpress.org&utm_medium=web&utm_campaign=wp-plugin-readme" rel="friend" title="Mergebot App">the Mergebot site</a>.

### Requirements ###

* Mergebot app account
* PHP version 5.3.0 or greater

## Installation ##

1. Create an account over at <a href="https://mergebot.com/?utm_source=wordpress.org&utm_medium=web&utm_campaign=wp-plugin-readme" rel="friend" title="Mergebot App">mergebot.com</a>
1. Install the plugin on both the local and live sites
1. Follow the instructions for configuration <a href="https://app.mergebot.com/docs#/installation?utm_source=wordpress.org&utm_medium=web&utm_campaign=wp-plugin-readme" rel="friend" title="Mergebot installation doc">here</a>

As the plugin is a client for the Mergebot application it is essential the plugin stays up-to-date. By default, when we release a new version on WordPress.org the plugin will be auto-updated.

This can be disabled using the following constant in your wp-config.php file:
`define( 'MERGEBOT_DISABLE_AUTO_UPDATES', true ); `

## Screenshots ##

Coming soon

## Changelog ##

No changelog during beta