<?php


namespace AppBundle\GraphQL\Field;

use AppBundle\Entity\Student;
use AppBundle\GraphQL\Type\StudentType;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class StudentsField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'name'   => new StringType(),
                'groups' => new IntType(),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository(Student::class)
            ->findBy($args);
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new StudentType());
    }
}