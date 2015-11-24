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

namespace WellCommerce\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use WellCommerce\CoreBundle\DataFixtures\AbstractDataFixture;
use WellCommerce\AppBundle\Entity\OrderStatusGroup;

/**
 * Class LoadOrderStatusGroupData
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LoadOrderStatusGroupData extends AbstractDataFixture
{

    public static $samples = ['Processing', 'Prepared', 'Completed'];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::$samples as $name) {
            $orderStatusGroup = new OrderStatusGroup();
            $orderStatusGroup->translate('en')->setName($name);
            $orderStatusGroup->mergeNewTranslations();
            $manager->persist($orderStatusGroup);
            $this->setReference('order_status_group_' . $name, $orderStatusGroup);
        }

        $manager->flush();
    }
}