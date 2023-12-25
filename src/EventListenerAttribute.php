<?php declare( strict_types = 1 );

namespace Siestacat\DoctrineOdmEventListener;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class EventListenerAttribute
{

    /**
     * Specifies the names of the entity listeners.
     *
     * @var array<string>
     * @readonly
     */
    public $value = [];

    /** @param array<string> $value */
    public function __construct(array $value = [])
    {
        $this->value = $value;
    }
}