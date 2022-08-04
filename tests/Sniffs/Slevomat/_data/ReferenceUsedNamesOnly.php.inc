<?php declare(strict_types=1);

namespace App\Tests;

use App\Exception\CustomException;

final class Foobar extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\FunctionalTester
     */
    protected $tester;

    public function __invoke()
    {
        // Should allow fully qualified global namespace
        $root = \dirname(__DIR__);

        $pdo = new \PDO();

        throw new CustomException('Error Processing Request', 1);
    }
}
