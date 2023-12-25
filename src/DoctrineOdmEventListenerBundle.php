<?php declare( strict_types = 1 );

namespace Siestacat\DoctrineOdmEventListener;

use Siestacat\DoctrineOdmEventListener\DependencyInjection\DoctrineOdmEventListenerExtension;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class DoctrineOdmEventListenerBundle extends AbstractBundle
{
    public function getContainerExtension():ExtensionInterface
    {
        $this->extension = $this->extension === null ? new DoctrineOdmEventListenerExtension : $this->extension;

        return $this->extension;
    }
}