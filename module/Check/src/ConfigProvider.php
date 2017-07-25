<?php

namespace Check;

/**
 * Class ConfigProvider
 *
 * @package Check
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
