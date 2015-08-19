<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CoreBundle\Tests\DataGrid;

use WellCommerce\Bundle\CoreBundle\Tests\AbstractTestCase;
use WellCommerce\Bundle\DataGridBundle\Column\Column;

/**
 * Class AbstractDataGridTestCase
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractDataGridTestCase extends AbstractTestCase
{
    /**
     * @return null|\WellCommerce\Bundle\DataGridBundle\DataGridInterface
     */
    protected function getService()
    {
        return null;
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        return [];
    }

    public function testServiceIsCreated()
    {
        $datagrid = $this->getService();

        if (null !== $datagrid) {
            $this->assertInstanceOf('WellCommerce\Bundle\DataGridBundle\DataGridInterface', $datagrid);
        }
    }

    public function testColumnsCollectionIsConfigurable()
    {
        $datagrid = $this->getService();

        if (null !== $datagrid) {
            $columns       = $datagrid->getColumns();
            $previousCount = $columns->count();
            $newCount      = rand(1, 10);

            for ($i = 0; $i < $newCount; $i++) {
                $columns->add(new Column([
                    'id'      => 'new_column_' . $i,
                    'caption' => '',
                ]));
            }

            $this->assertInstanceOf('WellCommerce\Bundle\DataGridBundle\Column\ColumnCollection', $columns);
            $this->assertCount($previousCount + $newCount, $columns);
        }
    }

    public function testHasRequiredColumns()
    {
        $datagrid = $this->getService();

        if (null !== $datagrid) {
            $columns         = $datagrid->getColumns();
            $requiredColumns = $this->getColumns();

            foreach ($requiredColumns as $identifier) {
                /**
                 * @var $column \WellCommerce\Bundle\DataGridBundle\Column\ColumnInterface
                 */
                $column = $columns->get($identifier);
                $this->assertInstanceOf('WellCommerce\Bundle\DataGridBundle\Column\ColumnInterface', $column);
                $this->assertEquals($identifier, $column->getId());
            }
        }
    }
}