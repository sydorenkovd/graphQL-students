<?php

namespace AppBundle\GraphQL;

use AppBundle\GraphQL\Mutation\MutationType;
use Youshido\GraphQL\Config\Schema\SchemaConfig;
use Youshido\GraphQL\Schema\AbstractSchema;

class Schema extends AbstractSchema
{

    public function build(SchemaConfig $config)
    {
        $config
            ->setMutation(new MutationType())
            ->setQuery(new Query());
    }
}
