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

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\CLICSHOPPING;

  if ($CLICSHOPPING_MessageStack->exists('main')) {
    echo $CLICSHOPPING_MessageStack->get('main');
  }

  require_once($CLICSHOPPING_Template->getTemplateFiles('breadcrumb'));

  echo HTML::form('advanced_search', CLICSHOPPING::link(null, 'Search&Q'), 'post', 'id="advanced_search" role="form"', ['session_id' => true]);
?>

<script src="<?php echo CLICSHOPPING::link($CLICSHOPPING_Template->getTemplateDefaultJavaScript('clicshopping/general.js')); ?>"></script>
<section class="advanced_search" id="advanced_search">
  <div class="contentContainer">
    <div class="contentText">
      <div class="page-title"><h1><?php echo CLICSHOPPING::getDef('heading_search_criteria'); ?></h1></div>
      <?php echo $CLICSHOPPING_Template->getBlocks('modules_advanced_search'); ?>
      <div class="separator"></div>
        <div class="control-group">
          <div class="controls">
            <div class="buttonSet">
              <span class="float-md-right"><label for="buttonSearch"><?php echo HTML::button(CLICSHOPPING::getDef('button_search'), null, null, 'success'); ?></label></span>
            </div>
          </div>
      </div>
    </div>
    <div class="separator"></div>
  </div>
</section>
</form>
