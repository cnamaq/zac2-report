<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report;


use Zac2\Common\DicAware;
use Zac2\Report\AddStrategy\AddStrategyInterface;
use Zac2\Report\Container\ContainerAbstract;

class Factory extends DicAware
{
    /**
     * @param  array $config
     * @param  array $params
     * @param  ContainerAbstract|null $parentContainer
     * @return ContainerAbstract
     */
    public function create(array $config, array $params, ContainerAbstract $parentContainer = null)
    {
        /** @var ContainerAbstract    $container   */
        /** @var AddStrategyInterface $addStrategy */
        foreach ($config['containers'] as $containerId => $containerConfig) {
            $renderer    = (isset($containerConfig['renderer'])) ? new $containerConfig['renderer'] : null;
            $addStrategy = new $containerConfig['addstrategy']($this->getDic());
            foreach ($addStrategy->getEntitiesToWrap($containerConfig, $params) as $wrapped) {
                $container = new $containerConfig['container']($renderer, $wrapped);
                if ($parentContainer) {
                    $parentContainer->add($container);
                }
                if (isset($containerConfig['containers'])) {
                    $this->create($containerConfig, $container->getParams($params), $container);
                }
            }
        }

        return $container;
    }
    
}
