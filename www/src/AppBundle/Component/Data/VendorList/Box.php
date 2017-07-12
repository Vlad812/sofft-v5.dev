<?php

/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 10.07.2017
 * Time: 18:13
 */

namespace AppBundle\Component\Data\VendorList;

use AppBundle\Service\Dispetcher\DataView;

class Box
{

    public $class;


    function __construct(DataView $data)
    {
        $this->class = $data;

    }


public function execute()
{

    $table = $this->class->twig->render('AppBundle:default:box.html.twig', ['data' => $this->class->dataStorage]);

    return 'BOX !!'.$table;
}

}