<?php
/**
 * Created by PhpStorm.
 * User: fohl
 * Date: 09/05/16
 * Time: 12:06
 */

namespace Zac2\Report;


use Zac2\Entity\EntityAbstract;

class Report extends EntityAbstract
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var array
     */
    protected $css;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getCss()
    {
        return $this->css;
    }

    /**
     * @param array $css
     */
    public function setCss(array $css)
    {
        $this->css = $css;
    }

}
