<?php
/**
 * Created by PhpStorm.
 * User: fohl
 * Date: 12/05/16
 * Time: 11:32
 */

namespace Zac2\Report\Renderer;


use Zac2\Report\Container\ContainerAbstract;

class Groupe implements Renderable
{
    /**
     * @param ContainerAbstract $container
     * @return string
     */
    public function render(ContainerAbstract $container)
    {
        return '<tr><td colspan="99" class="groupeContainer">' . $container->getLibelle() . '</td></tr>';
    }

}