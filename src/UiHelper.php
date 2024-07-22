<?php

declare(strict_types=1);

namespace src;

class UiHelper
{
    /**
     * @var UiHelper|null
     */
    public static ?UiHelper $instance = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return void
     */
    private function __clone()
    {
    }


    /**
     * @return UiHelper
     */
    public static function getInstance(): UiHelper
    {

        if (static::$instance === null) {
            static::$instance = new UiHelper();
        }
        return static::$instance;
    }

    /**
     * @param string $str
     * @param bool $h
     * @return void
     */
    public function outputHeader(string $str, bool $h = true): void
    {
        if ($h) {
            echo "<h4>$str</h4>";
        } else {
            echo $str;
        }
    }
}
