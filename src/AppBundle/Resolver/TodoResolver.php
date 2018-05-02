<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace AppBundle\Resolver;


use AppBundle\Entity\Article;
use AppBundle\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;

class TodoResolver extends AbstractResolver
{

    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findAll()
    {
        return $this->em->getRepository(Student::class)->findAll();
    }

    public function create($name)
    {
        $student = Student::createFromName($name);

        $this->em->persist($student);
        $this->em->flush();

        return $this->findAll();
    }

    public function createArticle($title)
    {
        $article = new Article();
        $article->setTitle($title);
        $article->setBody('body');
        $article->setPublished(true);
        $article->setStudent($this->em->getRepository(Student::class)->find(1));
        $article->setStudentId(1);
        $this->em->persist($article);
        $this->em->flush();
    }
}