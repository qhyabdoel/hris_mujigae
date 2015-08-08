<?php
class NumberFormatter extends CNumberFormatter
{
	public function __construct()
	{
        parent::__construct('en_US');
    }
 
    public function init()
	{
		
    }
 
    public function format($pattern,$value,$currency=null)
	{
		$format=$this->parseFormat($pattern);
		$result=$this->formatNumber($format,$value);
		/*if($currency===null)
			return $result;
		elseif(($symbol=$this->_locale->getCurrencySymbol($currency))===null)
			$symbol=$currency;*/
		$symbol='Rp ';
		return str_replace('¤',$symbol,$result);
	}
}