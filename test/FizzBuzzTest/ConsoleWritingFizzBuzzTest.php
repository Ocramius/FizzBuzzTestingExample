<?php

namespace FizzBuzzTest;

use FizzBuzz\ConsoleWritingFizzBuzz;
use FizzBuzz\OutputHandler;

class ConsoleWritingFizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider fizzBuzzOutcomesProvider
     */
    public function testFizzBuzz($number, $outcome)
    {
        /* @var $outputHandler OutputHandler|\PHPUnit_Framework_MockObject_MockObject */
        $outputHandler = $this->getMock(OutputHandler::class);
        $fizzBuzz      = new ConsoleWritingFizzBuzz($outputHandler);

        $outputHandler->expects(self::once())->method('write')->with($outcome);

        $fizzBuzz->fizzBuzz($number);
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
