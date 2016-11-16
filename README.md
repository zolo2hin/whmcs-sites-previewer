# WHMCS Sites Previewer

Module builds previews of all client sites and provides their for all clientarea pages which contain in template variables field named 'services'.

## Requirements

* WHMCS >= 5.3
* PHP >= 5.4 supports:
  * CURL
  * exec
* libfontconfig

## Installation
1. Unzip the archieve and put files into folder /modules/addons/
2. Give execute permissions to file /modules/addons/sites_previewer/src/phantomjs
3. Create /images/site_previews folder and give user permission to write into
4. Place hook_sites_previewer.php into /includes/hooks/ to activate module logic

## Usage
After you are doing all the installation steps you can use previews on ``clientarea.php?action=products`` page and others where ``$services`` variable is available by adding preview image:
```
<img scr="{$service.preview}" />
```
