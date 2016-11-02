<?php

class Previewer {
    
    private $services;
    private $images;
    
    private $browser_size = [1200, 672];
    private $clip_size = [1200, 672];
    private $image_size = [100, 56];
    
    private $images_link = '/images/site_previews';
    
    private $module_path;

    public function __construct($services) {
        
        $this->module_path = dirname(__FILE__);
        
        foreach($services as $service) {
            if($image = $this->getImageDetails($service)) {
                $this->images[$service['id']] = $image;
            }
        }

        $this->buildImageFiles();

        $this->services = $services;
    }
    
    /**
     * 
     */
    private function buildImageFiles() {

        foreach($this->images as $image) {
            if( !file_exists($image['path']) ) {                
                
                if( $this->setClipCommand('http://'.$image['domain'], $image['path']) ) {
                    $this->setResizeCommand($image['path']);
                }
            }
        }
    }
    
    /**
     * Put new command into PhantomJS to create new site preview
     * 
     * @param type $address
     * @param type $file
     * @return type
     */
    private function setClipCommand($address, $file) {
        
        $returnCode = null;
        $output = [];
        
        $command = sprintf("%s/src/phantomjs %s %s %s %s %s %s %s", $this->module_path, $this->module_path.'/src/task.js', $address, $file, $this->browser_size[0], $this->browser_size[1], $this->clip_size[0], $this->clip_size[1] );

        exec(sprintf("%s 2>&1", escapeshellcmd($command)), $output, $returnCode);

        return $returnCode===0;
    }
    
    /**
     * Resize site preview
     * 
     * @param type $file
     * @return type
     */
    private function setResizeCommand($file) {
        
        $returnCode = null;
        $output = [];
        
        $command = sprintf("convert %s -resize %sx%s %s", $file, $this->image_size[0], $this->image_size[1], $file);
        
        exec(sprintf("%s 2>&1", escapeshellcmd($command)), $output, $returnCode);

        return $returnCode===0;
    }
    
    /**
     * Final image presence checking, flash images and return services
     * 
     * @return type
     */
    public function flash_images() {
        
        $services_count = count($this->services);
        
        // Finally check 
        for( $i=0; $i<$services_count; $i++) {
            
            if( empty($this->images[$this->services[$i]['id']]) || !file_exists($this->images[$this->services[$i]['id']]['path']) ) {
                $this->services[$i]['preview'] = '/modules/addons/sites_previewer/src/default.jpg';
            } else {
                $this->services[$i]['preview'] = $this->images[$this->services[$i]['id']]['link'];
            }
        }

        return $this->services;
    }
    
    /**
     * Returns domain details like path and linkto, or false, if domain incorrect
     * 
     * @param type $service
     * @return boolean
     */
    private function getImageDetails($service) {

        if(!empty($service['status']) && !empty($service['domain']) && $service['status'] == 'Active' && preg_match("/^[^-\._][a-z\d_\.-]+\.[a-z]{2,6}$/i", $service['domain'])) {
            
            $imagename = md5($service['id'].$service['domain']);
            
            return [
                'name' => $imagename,
                'domain' => $service['domain'],
                'path' => sprintf('%s%s/%s.jpg', dirname(dirname(dirname(dirname(__FILE__)))), $this->images_link, $imagename),
                'link' => sprintf('%s/%s.jpg', $this->images_link, $imagename)
            ];
        }
        
        return false;
    }
}