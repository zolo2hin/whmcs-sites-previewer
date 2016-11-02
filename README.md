# WHMCS Sites Previewer

Module builds previews of all client sites and provides their for all clientarea pages which contain in template variables field named 'services'.

## Requirements

* PHP >= 5.4
* WHMCS >= 5.3

## Installation
1. Unzip the archieve and put files into /modules/addons/ folder
2. Create /images/site_previews folder and give user permission to write in it
3. Place hook_sites_previewer.php into /includes/hooks/ to activate module logic

## Usage
After you are doing all the installation steps you can use previews on ``clientarea.php?action=products`` page and others where ``$services`` variable is available by adding preview image:
```
<img scr="{$service.preview}" />
```
