<?php
declare(strict_types=1);

namespace PropertyEntity\Model\Entity;

use Cake\ORM\Entity;

/**
 * Class PropertyEntity
 */
class PropertyEntity extends Entity
{
    /**
     * Does the same like Entity::__construct() + Initialize/Sets class properties to the entity.
     *
     * {@inheritdoc}
     */
    public function __construct(array $properties = [], array $options = [])
    {
        $cakeProps = [
            '_properties',
            '_original',
            '_hidden',
            '_virtual',
            '_className',
            '_dirty',
            '_accessors',
            '_new',
            '_errors',
            '_invalid',
            '_accessible',
            '_registryAlias',
        ];

        $classVars = get_class_vars(static::class);
        foreach ($classVars as $name => $property) {
            if (!in_array($name, $cakeProps)) {
                $this->_properties[$name] = $property;
            }
        }
        parent::__construct($properties, $options);
    }
}
