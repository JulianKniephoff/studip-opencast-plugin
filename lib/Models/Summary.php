<?php

namespace Opencast\Models;

use Opencast\RelationshipTrait;
use Opencast\Models\UPMap;

class Summary extends UPMap
{
    use RelationshipTrait;

    protected static function configure($config = array())
    {
        $config['db_table'] = 'du_summary';

        $config['belongs_to']['plans'] = [
            'class_name'  => Plans::class,
            'foreign_key' => 'plans_id'
        ];

        parent::configure($config);
    }

    public function getRelationships()
    {
        $data = [];

        $data['plans']['links']['related'] =
            $this->getRelLink('plans/' . $this->plans_id);

        return $data;
    }
}
