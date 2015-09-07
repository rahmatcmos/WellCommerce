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

namespace WellCommerce\Bundle\UnitBundle\Factory;

use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\UnitBundle\Entity\Unit;

/**
 * Class UnitFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class UnitFactory extends AbstractFactory
{
    /**
     * @return \WellCommerce\Bundle\UnitBundle\Entity\UnitInterface
     */
    public function create()
    {
        $unit = new Unit();

        return $unit;
    }
}