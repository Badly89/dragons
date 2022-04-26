<?php

/*
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2017 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
namespace s9e\TextFormatter\Parser\AttributeFilters;
class RegexpFilter
{
	public static function filter($attrValue, $regexp)
	{
		return \filter_var($attrValue, \FILTER_VALIDATE_REGEXP, [
			'options' => ['regexp' => $regexp]
		]);
	}
}