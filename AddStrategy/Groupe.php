<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report\AddStrategy;


class Groupe implements AddStrategyInterface
{
    /**
     * @param  array $config
     * @param  array $params
     * @return string
     */
    public function getEntitiesToWrap(array $config, array $params)
    {
        if (!isset($config['libelle'])) {
            throw new \InvalidArgumentException('libelle absent');
        }

        return array($config['libelle']);
    }

}
