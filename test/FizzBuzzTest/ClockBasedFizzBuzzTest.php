<?php

namespace FizzBuzzTest;

use FizzBuzz\ClockBasedFizzBuzz;

class ClockBasedFizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    public function testClockFizzBuzz()
    {
        $fizzBuzz = new ClockBasedFizzBuzz('time');

        self::assertThat(
            $fizzBuzz->fizzBuzz(),
            self::logicalOr(
                self::isType('integer'),
                'Fizz',
                'Buzz',
                'FizzBuzz'
            )
        );
    }

    /**
     * @dataProvider fizzBuzzOutcomesProvider
     */
    public function testFizzBuzz($number, $outcome)
    {
        self::assertSame(
            $outcome,
            (new ClockBasedFizzBuzz(function () use ($number) {
                return $number;
            }))->fizzBuzz()
        );
    }

    /**
     * @dataProvider fizzBuzzOutcomesProvider
     */
    public function testFizzBuzz2($number, $outcome)
    {
        $timeProvider = $this->getMock('stdClass', ['__invoke']);

        $timeProvider->expects(self::any())->method('__invoke')->willReturn($number);

        self::assertSame(
            $outcome,
            (new ClockBasedFizzBuzz($timeProvider))->fizzBuzz()
        );
    }

    public function fizzBuzzOutcomesProvider()
    {
        $values = [
            [1, 1],
            [2, 2],
            [3, 'Fizz'],
            [4, 4],
            [5, 'Buzz'],
            [6, 'Fizz'],
            [7, 7],
            [8, 8],
            [9, 'Fizz'],
            [10, 'Buzz'],
        ];

        return array_merge(
            $values,
            array_map(
                function ($number) {
                    return [$number * 3 * 5, 'FizzBuzz'];
                },
                range(1, 10)
            )
        );
    }
}
