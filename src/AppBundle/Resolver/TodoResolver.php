<?php
/**
 * Date: 31.10.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace AppBundle\Resolver;


use AppBundle\Entity\Student;

class TodoResolver extends AbstractResolver
{

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
}