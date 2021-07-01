<?php

namespace Tests;

use Wtl\PhpunitTest\AbstractSomething;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Wtl\PhpunitTest\AbstractSomething
 */
class AbstractSomethingTest extends TestCase
{
    /**
     * @test
     * @dataProvider rulesDataProvider
     */
    public function abstractClassCanBeTested(array $rules, bool $expected): void
    {
        $mock = $this->getMockForAbstractClass(AbstractSomething::class);
        $mock->expects($this->any())
            ->method('rules')
            ->willReturn($rules);

        self::assertEquals($expected, $mock->doSomething());
    }

    public static function rulesDataProvider(): array
    {
        return [
            '4 rules' => [[1,2,3,4], true],
            '2 rules' => [[1,2], false],
            '1 rule' => [[1], false],
            '0 rules' => [[], false],
        ];
    }

    /**
     * @test
     * @dataProvider doSomethingDataProvider
     */
    public function concreteMethodsCanBeMocked(bool $doSomething, string $expected): void
    {
        $mock = $this->getMockForAbstractClass(AbstractSomething::class, mockedMethods: ['doSomething']);

        $mock->expects($this->any())
            ->method('doSomething')
            ->willReturn($doSomething);

        self::assertEquals($expected, $mock->doSomething2());
    }

    public static function doSomethingDataProvider(): array
    {
        return [
            'doSomething -> true' => [true, 'juhu'],
            'doSomething -> false' => [false, 'bah'],
        ];
    }
}
