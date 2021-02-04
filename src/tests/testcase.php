<?php

namespace Tests;

use DateTime;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getAge(DateTime $date)
    {
        return (int) $date->diff(new DateTime('now'))
            ->format('%y');
    }
}
