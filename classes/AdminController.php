<?php
class AdminController
{
	
	 protected function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if ($class === null) {
            $class = substr(get_class($this), 0, -10);
        } elseif (strtolower(substr($class, -10)) == 'controller') {
            /* classname has changed, from AdminXXX to AdminXXXController, so we remove 10 characters and we keep same keys */
            $class = substr($class, 0, -10);
        }
        return Tools::displayError($string, 1, $htmlentities);
    }
}