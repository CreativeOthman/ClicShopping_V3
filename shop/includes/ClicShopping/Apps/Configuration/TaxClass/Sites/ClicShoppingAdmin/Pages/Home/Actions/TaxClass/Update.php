<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Configuration\TaxClass\Sites\ClicShoppingAdmin\Pages\Home\Actions\TaxClass;

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\Registry;

  class Update extends \ClicShopping\OM\PagesActionsAbstract
  {
    protected $app;

    public function __construct()
    {
      $this->app = Registry::get('TaxClass');
    }

    public function execute()
    {

      $tax_class_id = HTML::sanitize($_GET['tID']);
      $tax_class_title = HTML::sanitize($_POST['tax_class_title']);
      $tax_class_description = HTML::sanitize($_POST['tax_class_description']);

      $this->app->db->save('tax_class', [
        'tax_class_id' => (int)$tax_class_id,
        'tax_class_title' => $tax_class_title,
        'tax_class_description' => $tax_class_description,
        'last_modified' => 'now()'
      ], [
          'tax_class_id' => (int)$tax_class_id
        ]
      );


      $this->app->redirect('TaxClass&page=' . $_GET['page'] . '&tID=' . $tax_class_id);
    }
  }