<?php
/**
 * Created by PhpStorm.
 * User: fohl
 * Date: 09/05/16
 * Time: 12:16
 */

namespace Zac2\Report\Renderer;


use Zac2\Report\Container\ContainerAbstract;

abstract class Leaf implements Renderable
{
    /**
     * @param ContainerAbstract $container
     * @return string
     */
    abstract public function render(ContainerAbstract $container);

    /**
     * @param ContainerAbstract $container
     * @return string
     */
    protected function getRowCssClass(ContainerAbstract $container)
    {
        $members = explode('\\', get_class($container));

        return strtolower(end($members));
    }

}
