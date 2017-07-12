<?php

/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 10.07.2017
 * Time: 16:44
 */

namespace AppBundle\Service\Dispetcher;

use Symfony\Component\Yaml\Yaml;

class DataView
{

    public $name;

    /**
     * Тип представления (table, box, json)
     *
     * @var string
     */
    public $type;

    public $param = [];

    // Сервисы
    public  $container;
    public  $dataBd;
    public  $twig;

    /**
     *  Данные из БД.
     * @var array
     */
    public $dataStorage;

    public $entity;
    public $handler;
    public $view;

    /**
     * Готовые данные (данные+обработка+требуемое представление)
     *
     * @var string
     */
    private $res;

    /**
     * DataView constructor.
     * @param $container
     * @param $dataBd
     * @param $twig
     */
    public function __construct($container, $dataBd, $twig){
        $this->container = $container;
        $this->dataBd= $dataBd;
        $this->twig = $twig;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $this->loadConfig();

        // получение данных
        $this->dataStorage = $this->dataBd->getData($this);

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

        $nameClass = 'AppBundle\Component\\'.$this->view;

        $v = new $nameClass($this);

        return $v->execute();
    }

    public function getMsg()
    {

       // echo 'Hello! I am DataView!';

    }
}

