<?php

namespace Customer;

/**
 * Class ConfigProvider
 *
 * @package Customer
 */
class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [
            'factories'  => [
            ],
        ];
    }
}
