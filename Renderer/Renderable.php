<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report\Renderer;


use Zac2\Report\Container\ContainerAbstract;

interface Renderable
{
    
    /**
     * @param ContainerAbstract $container
     * @return string
     */
    public function render(ContainerAbstract $container);

}
