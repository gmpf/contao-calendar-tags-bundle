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

namespace BlackForest\Contao\Calendar\Tags\Test;

use BlackForest\Contao\Calendar\Tags\BlackForestContaoCalendarTagsBundle;
use BlackForest\Contao\Calendar\Tags\DependencyInjection\BlackForestContaoCalendarTagsExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Resource\ComposerResource;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class BlackForestContaoCalendarTagsBundleTest
 *
 * @covers \BlackForest\Contao\Calendar\Tags\BlackForestContaoNewsTagsBundle
 */
class BlackForestContaoCalendarTagsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new BlackForestContaoCalendarTagsBundle();

        $this->assertInstanceOf(BlackForestContaoCalendarTagsBundle::class, $bundle);
    }

    public function testReturnsTheContainerExtension()
    {
        $extension = (new BlackForestContaoCalendarTagsBundle())->getContainerExtension();

        $this->assertInstanceOf(BlackForestContaoCalendarTagsExtension::class, $extension);
    }

    /**
     * @covers \BlackForest\Contao\Calendar\Tags\DependencyInjection\BlackForestContaoCalendarTagsExtension::load
     */
    public function testLoadExtensionConfiguration()
    {
        $extension = (new BlackForestContaoCalendarTagsBundle())->getContainerExtension();
        $container = new ContainerBuilder();

        $extension->load([], $container);

        $this->assertInstanceOf(ComposerResource::class, $container->getResources()[0]);
        $this->assertInstanceOf(FileResource::class, $container->getResources()[1]);
        $this->assertSame(
            \dirname(\dirname(__DIR__)) . '/src/Resources/config/services.yml',
            $container->getResources()[1]->getResource()
        );
    }
}
