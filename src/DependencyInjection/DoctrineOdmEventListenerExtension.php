<?php declare( strict_types = 1 );

namespace Siestacat\DoctrineOdmEventListener\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class DoctrineOdmEventListenerExtension extends Extension
{

    const CONFIG_DIR = __DIR__ . '/../../config';

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(self::CONFIG_DIR));
        $loader->load('services.yaml');
    }
}