<?php

namespace WebIt4Me\Reader;

class AbstractColumn implements ColumnInterface
{
    use IndexableTrait;

    /** @var string */
    private $value;

    /** @var string */
    private $name;

    /**
     * @param int $index
     * @param string $value
     * @param null $name
     */
    public function __construct($index, $value, $name = null)
    {
        $this->setIndex($index);

        $this->value = $value;

        $this->setName($name);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        if (is_null($name)) {
            $name = $this->makeUpName();
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    private function makeUpName()
    {
        return sprintf('Column %s', $this->index + 1);
    }
}