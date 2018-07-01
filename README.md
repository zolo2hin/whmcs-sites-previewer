# WHMCS Sites Previewer

Module builds preview for main service site for displaying somewhere at client area.

## Requirements

* WHMCS >= 5.3
* PHP >= 5.4 with:
  * CURL
  * exec
  * yaml
* libfontconfig

## Installation
1. Unzip the archieve and put files into folder `/modules/addons/whmcs_sites_previewer`
2. Give execute permissions to file `/modules/addons/whmcs_sites_previewer/src/phantomjs`
3. Create `/images/site_previews` folder and give user permission to write into it

## Usage

After you are doing all the installation steps you can use previews on ``clientarea.php?action=products`` page and others where ``$services`` variable is available by adding preview image:
```
<img scr="{$service.preview}" />
```
