<?php

namespace AppBundle\GraphQL;


use AppBundle\GraphQL\Field\ArticlesField;
use AppBundle\GraphQL\Field\StudentsField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class Query extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields(
            [
                new ArticlesField(),
                new StudentsField(),
            ]
        );
    }
}
