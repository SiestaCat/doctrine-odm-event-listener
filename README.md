# Doctrine ODM Event Listener

Install:

```
composer require siestacat/doctrine-odm-event-listener
```

Add bundle if not auto added:

```
Siestacat\DoctrineOdmEventListener\DoctrineOdmEventListenerBundle::class => ['all' => true]

```

Add attribute to your document:


```

use Siestacat\DoctrineOdmEventListener\EventListenerAttribute;

#[EventListenerAttribute(['App\EventListener\MyDocumentListener'])]

```

Example of MyDocumentListener:

```

namespace App\EventListener;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use App\Document\MyDocument;

class MyDocumentListener
{
    public function postPersist(MyDocument $document, LifecycleEventArgs $event) {}
}

```

List of events:

```
preRemove
postRemove
prePersist
postPersist
preUpdate
postUpdate
preLoad
postLoad

```