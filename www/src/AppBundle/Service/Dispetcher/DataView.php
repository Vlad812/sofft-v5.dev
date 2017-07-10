<?php

/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace AppBundle\Service\Dispetcher;

use AppBundle\AppBundle;
use Symfony\Component\Yaml\Yaml;

class DataView
{

    public $name = 'vendor_list';
    public $type = 'table';
    public $param = [];

    public  $container;
    public  $em;
    public  $twig;

    /**
     *  Данные из БД.
     * @var array
     */
    public $dataStorage;

    private $entity;
    private $handler;
    private $view;

    private $res;

    /**
     * DataView constructor.
     * @param $container
     * @param $em
     * @param $twig
     */
    public function __construct($container, $em, $twig){
        $this->container = $container;
        $this->em = $em;
        $this->twig = $twig;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $this->loadConfig();

        // получение данных

        // создание обработчика


        //
        $this->res = $this->createView();


        return $this->res;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param array $param
     */
    public function setParam($param)
    {
        $this->param = $param;
        return $this;
    }

    /**
     * загрузка конфигов из yml
     */
    private function loadConfig()
    {

        $arr = Yaml::parse(file_get_contents(__DIR__ . '/../../Resources/config/map_data_view.yml'));

        if (isset($arr[$this->name])) {

            $conf = $arr[$this->name];

            $this->entity = $conf['entity'];
            $this->handler = $conf['handler'];
            $this->view = $conf['view'][$this->type];

           // echo $conf['view'][$this->type];
        }
        else {

            // Исключение
        }

    }

    /**
     *
     */
    private function createView()
    {

        $nameClass = 'AppBundle\Builder\\'.$this->view;

        //print_r( new $nameClass($this));


        $v = new $nameClass($this);

        return $v->execute();

    }


    public function getMsg()
    {

           // print_r($arr);


        //echo file_get_contents(__DIR__.'/../../Resources/config/map_data_view.yml');

       // echo 'Hello! I am DataView!';

    }


}