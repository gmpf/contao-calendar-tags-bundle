<?php

/**
 * This file is part of contaoblackforest/contao-calendar-tags-bundle.
 *
 * (c) 2014-2018 The Contao Blackforest team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    contaoblackforest/contao-calendar-tags-bundle
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @copyright  2014-2018 The Contao Blackforest team.
 * @license    https://github.com/contaoblackforest/contao-calendar-tags-bundle/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace BlackForest\Contao\Calendar\Tags\Test\ContaoManager;

use BlackForest\Contao\Calendar\Tags\BlackForestContaoCalendarTagsBundle;
use BlackForest\Contao\Calendar\Tags\ContaoManager\Plugin;
use Contao\CalendarBundle\ContaoCalendarBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class PluginTest
 */
class PluginTest extends TestCase
{
    /**
     * Test get bundles.
     *
     * @cover Plugin::getBundles
     */
    public function testGetBundles()
    {
        $plugin = new Plugin();
        $parser = $this->getMockBuilder(ParserInterface::class)->getMock();

        $bundleConfig1 = BundleConfig::create(BlackForestContaoCalendarTagsBundle::class)
            ->setLoadAfter(
                [
                    ContaoCoreBundle::class,
                    ContaoCalendarBundle::class
                ]
            );

        $this->assertArraySubset($plugin->getBundles($parser), [$bundleConfig1]);
    }
}
