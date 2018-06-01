# Json Site Plugin

The **Json Site** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Force rendering of jpages as json

_This plugin is  mainly a simplified version of  [https://github.com/btopro/page-as-data](https://github.com/btopro/page-as-data)_. Please have a look at it if you need more than json type.

## Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `json-site`. You can find these files on [GitHub](https://github.com/bernierdb/grav-json-site).

You should now have all the plugin files under

    /your/site/grav/user/plugins/json-site
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/json-site/json-site.yaml` to `user/config/plugins/json-site.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true #enable or disable the plugin
route: /sitedata  #url to fetch your basic site data such as published pages, metadata, etc
routesIgnore: #list of urls you DON'T want in json, but handled as usual 
  - /sitemap
```

## Credits

Main code coming from [https://github.com/btopro/page-as-data](https://github.com/btopro/page-as-data)

## To Do

- [x] Add possibility to exclude routes
- [x] Nested menu items