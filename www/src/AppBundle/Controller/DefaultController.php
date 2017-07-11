<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

       $type =  $request->query->get('type');

       $tableVendorList = $this->container->get('app.view_data')
           ->setName('vendor_list')
           ->setType($type);

       die( $tableVendorList->execute() );
    }
}

