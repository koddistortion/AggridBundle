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

namespace StingerSoft\AggridBundle\Grid;

use StingerSoft\AggridBundle\Helper\GridBuilderInterface;
use StingerSoft\AggridBundle\View\GridView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbstractGridType implements GridTypeInterface {

	/**
	 *
	 * {@inheritdoc}
	 * @see \StingerSoft\AggridBundle\Grid\GridTypeInterface::buildGrid()
	 */
	public function buildGrid(GridBuilderInterface $builder, array $gridOptions): void {
		// TODO: Implement buildGrid() method.
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \StingerSoft\AggridBundle\Grid\GridTypeInterface::buildGrid()
	 */
	public function buildView(GridView $view, GridInterface $grid, array $gridOptions, array $columns): void {
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \StingerSoft\AggridBundle\Grid\GridTypeInterface::buildGrid()
	 */
	public function getId(array $gridOptions): string {
		return str_replace('\\','_', __CLASS__);
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \StingerSoft\AggridBundle\Grid\GridTypeInterface::buildGrid()
	 */
	public function configureOptions(OptionsResolver $resolver): void {
	}

	/**
	 *
	 * {@inheritdoc}
	 * @see \StingerSoft\AggridBundle\Grid\GridTypeInterface::buildGrid()
	 */
	public function getParent(): ?string {
		return GridType::class;
	}

}