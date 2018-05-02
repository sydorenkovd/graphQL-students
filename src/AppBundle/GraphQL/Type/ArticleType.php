<?php

namespace AppBundle\GraphQL\Type;


use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class ArticleType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields(
            [
                'id'         => new IdType(),
                'title'      => new StringType(),
                'body'       => new StringType(),
                'published'  => new BooleanType(),
                'student_id'  => new IntType(),
            ]
        );
    }
}
