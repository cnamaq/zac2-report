<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report\AddStrategy;


class Report implements AddStrategyInterface
{
    /**
     * @param  array $config
     * @param  array $params
     * @return array
     */
    public function getEntitiesToWrap(array $config, array $params)
    {
        return array(new \Zac2\Report\Report($config));
    }

}
