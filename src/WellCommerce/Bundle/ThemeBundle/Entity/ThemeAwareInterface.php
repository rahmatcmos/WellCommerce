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

namespace WellCommerce\Bundle\ThemeBundle\Entity;

/**
 * Interface ThemeAwareInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ThemeAwareInterface
{
    public function setTheme(ThemeInterface $theme = null);
    
    public function getTheme();
    
    public function hasTheme() : bool;
}
