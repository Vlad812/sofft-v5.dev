<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 12.07.2017
 * Time: 15:04
 */

namespace AppBundle\Service\Dispetcher;


class DataBd
{

    private $em;

    public function __construct($em)
    {

        $this->em = $em;
    }



    public function getData(DataView $class)
    {

       $res =  $this->em->getRepository('AppBundle:'.$class->entity)->findAll();


        return $res;
    }

    public function msg()
    {

        return 'HIIIIIIIIIIIII !!!';

    }



}