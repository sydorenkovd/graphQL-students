<?php


namespace AppBundle\GraphQL\Mutation;

use AppBundle\GraphQL\Type\ArticleType;
use AppBundle\GraphQL\Type\StudentType;
use AppBundle\Resolver\TodoResolver;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\Request;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class AddArticleField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'title' => new NonNullType(new StringType())
        ]);
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container->get('resolver.todo')->createArticle($args['title']);
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new ArticleType());
    }

    public function getName()
    {
        return 'addArticle';
    }
}