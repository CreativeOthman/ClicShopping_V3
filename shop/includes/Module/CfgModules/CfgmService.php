<?php
  /**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT
 *  @licence MIT - Portion of osCommerce 2.4
 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  use ClicShopping\OM\CLICSHOPPING;

  class CfgmService {
    public $code = 'service';
    public $directory;
    public $site = 'Shop';
    public $key = 'MODULE_SERVICES_INSTALLED';
    public $title;
    public $language_directory;
    public $template_integration = false;

    public function __construct() {

      $this->directory = CLICSHOPPING::BASE_DIR . 'Service/Shop/';
    }
  }