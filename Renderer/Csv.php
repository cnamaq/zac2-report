<?php
/**
 * Created by PhpStorm.
 * User: fohl
 * Date: 09/05/16
 * Time: 12:16
 */

namespace Zac2\Report\Renderer;


use Zac2\Report\Container\ContainerAbstract;

class Csv implements Renderable
{
    /**
     * @var array
     */
    protected $noRender = array(
        'getContainers',
        'getRenderer',
        'getParams',
    );
    /**
     * @var array
     */
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param ContainerAbstract $container
     * @return string csv
     */
    public function render(ContainerAbstract $container)
    {
        if (in_array(get_class($container), $this->config)) {
            $result = array();
            $abstract = class_parents($container);
            foreach (get_class_methods(current($abstract)) as $method) {
                if (substr($method, 0, 3) == 'get' && !in_array($method, $this->noRender)) {
                    $result[] = $container->$method();
                }
            }

            return implode(';', $result) . chr(13);
        }
    }

}
