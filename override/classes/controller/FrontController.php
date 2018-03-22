<?php
/*
 * 
 */
class FrontController extends FrontControllerCore {
    public function setMedia()
    {
        $this->registerStylesheet('scrollbar', '/assets/css/jquery.mCustomScrollbar.css', ['media' => 'all', 'priority' => 1000]);
        $this->registerJavascript('cimagex', '/assets/js/cimagex.alpha.js', ['position' => 'bottom', 'priority' => 100]);
        $this->registerJavascript('scrollbar', '/assets/js/jquery.mCustomScrollbar.concat.min.js', ['position' => 'bottom', 'priority' => 100]);
        $this->registerJavascript('yengin', '/assets/js/yengin.js', ['position' => 'bottom', 'priority' => 100]);

        return parent::setMedia();
    }
}