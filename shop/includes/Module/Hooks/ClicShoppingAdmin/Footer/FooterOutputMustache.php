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

  namespace ClicShopping\OM\Module\Hooks\ClicShoppingAdmin\Footer;

  class FooterOutputMustache
  {
    /**
     * @return string
     */
    public function display(): string
    {
      $output = '<!-- Mustache Script start-->' . "\n";
      $output .= '<script defer src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/3.1.0/mustache.min.js"></script>' . "\n";
      $output .= '<!--Mustache end -->' . "\n";

      return $output;
    }
  }