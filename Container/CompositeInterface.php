<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report\Container;


use Zac2\Report\Renderer\Renderable;

interface CompositeInterface
{

    /**
     * @param ContainerAbstract $container
     */
    function add(ContainerAbstract $container);

    /**
     * @return CompositeInterface[]
     */
    function getContainers();

    /**
     * @param  Renderable $renderer
     * @return mixed
     */
    function render(Renderable $renderer);

}
