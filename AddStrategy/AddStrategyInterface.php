<?php
/**
 * Created by PhpStorm.
 * User: fohl
 * Date: 27/04/16
 * Time: 10:58
 */

namespace Zac2\Report\AddStrategy;


interface AddStrategyInterface
{
    /**
     * @param array $config
     * @param array $params
     * @return array
     */
    function getEntitiesToWrap(array $config, array $params);

}