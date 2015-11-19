<?php

namespace FizzBuzzTest;

use FizzBuzz\FizzBuzz;

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FizzBuzz
     */
    private $fizzBuzz;

    protected function setUp()
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    /**
     * @dataProvider fizzBuzzOutcomesProvider
     */
    public function testFizzBuzz($number, $outcome)
    {
        self::assertSame($outcome, $this->fizzBuzz->fizzBuzz($number));
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
