# Json Site Plugin

The **Json Site** Plugin is for [Grav CMS](http://github.com/getgrav/grav). It **forces** every pages to render in json, unless added in the ignore config.

_This plugin was based on [@btopro](https://github.com/btopro)'s [page-as-data](https://github.com/btopro/page-as-data)_ with [Adrian-Mazaud's pull req](https://github.com/btopro/page-as-data/pull/4). Please have a look at it if you need more than json type.

## Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `json-site`. You can find these files on [GitHub](https://github.com/bernierdb/grav-json-site).

OR
````bash
cd your/site/grav/user/plugins
git submodule add https://github.com/bernier-db/grav-json-site.git json-site
````
You should now have all the plugin files under

    /your/site/grav/user/plugins/json-site
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/json-site/json-site.yaml` to `user/config/plugins/json-site.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

- Enable or disable the plugin: _true/false_
```yaml
enabled: true 
```
- Url to fetch your basic site data such as published pages (for navigation menu), metadata, etc:
```yaml
route: /sitedata
````
- List of urls you want handled as usual. *Json-site* will ignore them
````yaml
routesIgnore:     
  - /sitemap
````

## Credits

Based on [https://github.com/btopro/page-as-data](https://github.com/btopro/page-as-data).

## To Do

- [x] Add possibility to exclude routes
- [x] Nested menu items