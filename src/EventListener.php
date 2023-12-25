<?php declare( strict_types = 1 );

namespace Siestacat\DoctrineOdmEventListener;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EventListener
{
    public function __construct
    (
        private ContainerInterface $container
    ){}

    public function __call($name, $arguments)
    {
        return $this->callEvent($name, $arguments[0]);
    }

    private function callEvent(string $method_name, LifecycleEventArgs $event):void
    {
        $document_class = get_class($event->getObject());

        $attributes = (new \ReflectionClass($document_class))->getAttributes(EventListenerAttribute::class);

        foreach($attributes as $attribute)
        {
            foreach($attribute->newInstance()->value as $eventListenerClass)
            {
                $document_listener_service = $this->container->get($eventListenerClass);

                if(method_exists($document_listener_service, $method_name))
                {
                    call_user_func_array([$document_listener_service, $method_name], [$event->getObject(), $event]);
                }
            }
        }

        
    }
}