<?php

/**
 * PluginsfGuardUser form.
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage filter
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: PluginsfGuardUserFormFilter.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
abstract class PluginsfGuardUserFormFilter extends BasesfGuardUserFormFilter
{
	public function configure(){
		$this->widgetSchema['created_at']->setOption(
		  'from_date', new sfWidgetFormInputDate()
		);
		$this->widgetSchema['created_at']->setOption(
		  'to_date', new sfWidgetFormInputDate()
		);
		$this->widgetSchema['last_login']->setOption(
		  'from_date', new sfWidgetFormInputDate()
		);
		$this->widgetSchema['last_login']->setOption(
		  'to_date', new sfWidgetFormInputDate()
		);
	}
}
