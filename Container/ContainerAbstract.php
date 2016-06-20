<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report\Container;


use Zac2\Report\Renderer\Renderable;

abstract class ContainerAbstract implements CompositeInterface
{

    /** @var  Renderable */
    protected $renderer;
    /**
     * @var ContainerAbstract[]
     */
    protected $containers = array();

    /**
     * ContainerAbstract constructor.
     * @param Renderable $renderer
     * @param mixed|null $wrapped
     */
    public function __construct(Renderable $renderer = null, $wrapped = null)
    {
        $this->renderer = $renderer;
        if (!is_null($wrapped)) {
            $this->setWrapped($wrapped);
        }
    }

    /**
     * @return Renderable
     */
    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     * @param Renderable $renderer
     */
    public function setRenderer(Renderable $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return ContainerAbstract[]
     */
    public function getContainers()
    {
        return $this->containers;
    }

    /**
     * @param ContainerAbstract[] $containers
     */
    public function setContainers(array $containers)
    {
        $this->containers = $containers;
    }

    /**
     * @param ContainerAbstract $container
     */
    public function add(ContainerAbstract $container)
    {
        $this->containers[] = $container;
    }

    /**
     * @param Renderable|null $renderer
     * @return string
     */
    public function render(Renderable $renderer = null)
    {
        $result = '';
        $actualRenderer = ($renderer) ? $renderer : $this->getRenderer();
        
        if ($actualRenderer) {
            $result .= $actualRenderer->render($this);
        }

        foreach ($this->getContainers() as $container) {
            if ($container->mustBeRendered()) {
                $result .= $container->render($renderer);
            }
        }

        return $result;
    }
    
    /**
     * @return boolean
     */
    abstract public function mustBeRendered();

    /**
     * @param mixed $wrapped
     */
    abstract public function setWrapped($wrapped);

    /**
     * @param array $params
     * @return array
     */
    public function getParams(array $params)
    {
        return $params;
    }

}
