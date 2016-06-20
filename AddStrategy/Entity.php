<?php
/**
 * @author Denis Fohl
 */

namespace Zac2\Report\AddStrategy;


use Zac2\Common\DicAware;
use Zac2\Entity\EntityAbstract;
use Zac2\Filter\Multi\Multi;

class Entity extends DicAware implements AddStrategyInterface
{
    /**
     * @param array $config
     * @param array $params
     * @return EntityAbstract[]
     */
    public function getEntitiesToWrap(array $config, array $params)
    {
        if (isset($config['wrapped'])) {
            if (isset($config['wrapped']['entity'])) {
                $filtre = $this->getFiltre($config['wrapped']['entity'], $params);
                return $this->getEntities($config['wrapped']['entity'], $filtre);
            }
        } else {
            return array(null);
        }
    }

    /**
     * @param string $entity
     * @param Multi $filtre
     * @return EntityAbstract[]
     * @throws \Exception
     */
    public function getEntities($entity, Multi $filtre)
    {
        $config = $this->getConfig($entity . '.yml', 'Entity');
        $entityManager = $this->getDic()->get($config['entitymanager']);
        if (isset($config['table'])) {
            $entityManager->getDataRequestAdapter()->from($config['table']);
        }
        if (isset($config['join'])) {
            $entityManager->getDataRequestAdapter()->join($config['join'], $config['on'], $config['columns'], 'left');
        }

        return $entityManager->get($config['domainentity'], $filtre);
    }

    /**
     * @param string $entity
     * @param array $params
     * @return Multi
     * @throws \Exception
     */
    protected function getFiltre($entity, array $params)
    {
        $filtreConfig = $this->getConfig($entity . '.yml', 'FilterMulti');
        $filtre = $this->getDic()->get('filtermulti.factory')->create($filtreConfig);
        $filtre->setValues($params);

        return $filtre;
    }

    /**
     * @param array $params
     * @return array
     */
    public function getParams(array $params)
    {
        return $params;
    }

}
