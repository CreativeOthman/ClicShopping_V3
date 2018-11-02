<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT
 *  @licence MIT - Portion of osCommerce 2.4
 *
 *
 */

  use ClicShopping\OM\Registry;
  use ClicShopping\OM\CLICSHOPPING;

  class co_contact_us_form_button_process {
    public $code;
    public $group;
    public $title;
    public $description;
    public $sort_order;
    public $enabled = false;

    public function __construct() {
      $this->code = get_class($this);
      $this->group = basename(__DIR__);

      $this->title = CLICSHOPPING::getDef('modules_contact_us_form_button_process_title');
      $this->description = CLICSHOPPING::getDef('modules_contact_us_form_button_process_description');

      if ( defined('MODULES_CONTACT_US_FORM_BUTTON_PROCESS_STATUS') ) {
        $this->sort_order = (int)MODULES_CONTACT_US_FORM_BUTTON_PROCESS_SORT_ORDER;
        $this->enabled = (MODULES_CONTACT_US_FORM_BUTTON_PROCESS_STATUS == 'True');
      }
    }

    public function execute() {
      $CLICSHOPPING_Template = Registry::get('Template');

      if (isset($_GET['Info']) && isset($_GET['Contact']) && !isset($_GET['Success'])) {
        $content_width = (int)MODULES_CONTACT_US_FORM_BUTTON_PROCESS_CONTENT_WIDTH;

        $contact_us_form_button_process = '<!--  contact_us_form_button_process start -->' . "\n";
        $endform ='</form>';
        ob_start();
        require($CLICSHOPPING_Template->getTemplateModules($this->group . '/content/contact_us_form_button_process'));

        $contact_us_form_button_process .= ob_get_clean();

        $contact_us_form_button_process .= '<!-- contact_us_form_button_process end -->' . "\n";

        $CLICSHOPPING_Template->addBlock($contact_us_form_button_process, $this->group);
      }
    }

    public function isEnabled() {
      return $this->enabled;
    }

    public function check() {
      return defined('MODULES_CONTACT_US_FORM_BUTTON_PROCESS_STATUS');
    }

    public function install() {
      $CLICSHOPPING_Db = Registry::get('Db');


      $CLICSHOPPING_Db->save('configuration', [
          'configuration_title' => 'Do you want activate this module ?',
          'configuration_key' => 'MODULES_CONTACT_US_FORM_BUTTON_PROCESS_STATUS',
          'configuration_value' => 'True',
          'configuration_description' => 'Do you want activate this module in your shop ?',
          'configuration_group_id' => '6',
          'sort_order' => '1',
          'set_function' => 'clic_cfg_set_boolean_value(array(\'True\', \'False\'))',
          'date_added' => 'now()'
        ]
      );

      $CLICSHOPPING_Db->save('configuration', [
          'configuration_title' => 'Please select the width of the module',
          'configuration_key' => 'MODULES_CONTACT_US_FORM_BUTTON_PROCESS_CONTENT_WIDTH',
          'configuration_value' => '12',
          'configuration_description' => 'Select a number between 1 and 12',
          'configuration_group_id' => '6',
          'sort_order' => '1',
          'set_function' => 'clic_cfg_set_content_module_width_pull_down',
          'date_added' => 'now()'
        ]
      );


      $CLICSHOPPING_Db->save('configuration', [
          'configuration_title' => 'Sort order',
          'configuration_key' => 'MODULES_CONTACT_US_FORM_BUTTON_PROCESS_SORT_ORDER',
          'configuration_value' => '700',
          'configuration_description' => 'Sort order of display. Lowest is displayed first',
          'configuration_group_id' => '6',
          'sort_order' => '10',
          'set_function' => '',
          'date_added' => 'now()'
        ]
      );
    }

    public function remove() {
      return Registry::get('Db')->exec('delete from :table_configuration where configuration_key in ("' . implode('", "', $this->keys()) . '")');
    }

    public function keys() {
      return ['MODULES_CONTACT_US_FORM_BUTTON_PROCESS_STATUS',
              'MODULES_CONTACT_US_FORM_BUTTON_PROCESS_CONTENT_WIDTH',
              'MODULES_CONTACT_US_FORM_BUTTON_PROCESS_SORT_ORDER'
             ];
    }
  }