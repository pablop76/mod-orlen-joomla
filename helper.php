<?php
/**
 * Helper class for Orlen module
 * 
 * @package    Joomla
 * @subpackage Modules
 * @link https://web-service.com.pl
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModOrlenHelper
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    

    public function getRates($cache_time){
        $cache = JFactory::getCache('modOrlen', '');
		$cache->setCaching(true);
		$cache->setLifeTime($cache_time);
		$rates = $cache->get('rates');

		$cache = JFactory::getCache('modOrlen', '');
		$cache->setCaching(true);
		$cache->setLifeTime($cache_time);
		$rates = $cache->get('rates');

		if(!$rates) {
			$rates = $this->_getOrlenRate();
			$cache->store($rates, 'rates');
		}

		return $rates;
	}
    private function _getOrlenRate(){
		$date  = date('d.m.Y');
		$rates = [];
		$currency = json_decode(file_get_contents('https://tool.orlen.pl/api/wholesalefuelprices'));
		if (is_array($currency)) {
			foreach($currency as $v){
				switch ($v->productName){
					case 'Pb95':
						$ratePb95 = $v->value;
						break;
					case 'Pb98':
						$ratePb98 = $v->value;
						break;
					case 'ONEkodiesel':
						$rateONEkodiesel = $v->value;
						break;
					case 'ONArctic2':
						$rateONArctic2 = $v->value;
						break;
                    case 'OnEkoterm':
                        $rateOnEkoterm = $v->value;
                        break;    
				}
			}

			$rates = [
				'Pb95'   => $ratePb95,
				'Pb98'   => $ratePb98,
				'ONEkodiesel'   => $rateONEkodiesel,
				'ONArctic2'   => $rateONArctic2,
				'OnEkoterm'   => $rateOnEkoterm,
				'date'  => $date
			];

		}

		return $rates;
	}
}