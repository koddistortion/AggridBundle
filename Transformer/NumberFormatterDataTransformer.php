<?php
declare(strict_types=1);
/*
 * This file is part of the Stinger Soft AgGrid package.
 *
 * (c) Oliver Kotte <oliver.kotte@stinger-soft.net>
 * (c) Florian Meyer <florian.meyer@stinger-soft.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StingerSoft\AggridBundle\Transformer;

use StingerSoft\AggridBundle\Column\ColumnInterface;

/**
 * The NumberFormatterDataTransformer automatically formats a columns' value according to a defined locale, style and
 * pattern using PHPs number formatter capabilities for all NumberFormatterColumnType column types.
 *
 */
class NumberFormatterDataTransformer implements DataTransformerInterface {

	/**
	 * @param ColumnInterface $column
	 * @param                 $item
	 * @param mixed           $value
	 *            The value in the original representation
	 * @return mixed The value in the transformed representation
	 */
	public function transform(ColumnInterface $column, $item, $value) {
		$options = $column->getColumnOptions();
		if($options['number_formatter_pattern'] === null) {
			$formatter = new \NumberFormatter($options['number_formatter_locale'], $options['number_formatter_style']);
		} else {
			$formatter = new \NumberFormatter($options['number_formatter_locale'], $options['number_formatter_style'], $options['number_formatter_pattern']);
		}
		if($options['number_formatter_style'] === \NumberFormatter::CURRENCY) {
			return $formatter->formatCurrency($value, $options['number_formatter_currency']);
		}

		return $formatter->format($value);
	}
}