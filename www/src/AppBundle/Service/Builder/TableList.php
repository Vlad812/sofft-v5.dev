<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.07.2017
 * Time: 13:37
 */

namespace  AppBundle\Service\Builder;

class TableList
{
    private $container;
    private $em;
    private $twig;

    public function __construct($container, $em, $twig){
            $this->container = $container;
            $this->em = $em;
            $this->twig = $twig;
    }

    public function getMsg() {

        //echo 'Hello! I am Service !';

        $tpl = $this->twig->render('AppBundle:default:index.html.twig');

        echo $tpl;
    }

}