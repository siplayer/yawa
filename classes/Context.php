<?php
class Context
{
	
	/* @var Context */
    protected static $instance;

    /** @var Cart */
    public $cart;

    /** @var Cookie */
    public $cookie;

    /** @var Country */
    public $country;

    /** @var Employee */
    public $employee;

    /** @var AdminController|FrontController */
    public $controller;

    /** @var Language */
    public $language;

    /** @var Currency */
    public $currency;


    /** @var Shop */
    public $magazin;


    /** @var Smarty */
    public $smarty;

    /** @var Mobile_Detect */
    public $mobile_detect;

    /**
     * Mobile device of the customer
     *
     * @var bool|null
     */
    protected $mobile_device = null;

    /** @var bool|null */
    protected $is_mobile = null;

    /** @var bool|null */
    protected $is_tablet = null;

    /** @var int */
    const DEVICE_COMPUTER = 1;

    /** @var int */
    const DEVICE_TABLET = 2;

    /** @var int */
    const DEVICE_MOBILE = 4;


    /**
     * Sets Mobile_Detect tool object
     *
     * @return Mobile_Detect
     */
    public function getMobileDetect()
    {
        if ($this->mobile_detect === null) {
            require_once(_YS_TOOL_DIR_.'mobile_Detect/Mobile_Detect.php');
            $this->mobile_detect = new Mobile_Detect();
        }
        return $this->mobile_detect;
    }
    
    public static function getContext()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Context();
        }

        return self::$instance;
    }

}