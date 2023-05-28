<?php
/**
 * Orlen Module Entry Point
 * 
 * @package    Joomla
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       https://web-service.com.pl
 * mod_orlen is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

 defined('_JEXEC') or die('Restricted access');

 require_once dirname(__FILE__) . '/helper.php';
 
 $moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
 $cache_time = htmlspecialchars($params->get('cache_time', 240));
 $rates = new ModOrlenHelper;
 $data = $rates->getRates($cache_time);
 
 require JModuleHelper::getLayoutPath('mod_orlen', $params->get('layout', 'default'));