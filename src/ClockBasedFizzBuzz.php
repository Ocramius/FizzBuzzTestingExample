<?php

namespace FizzBuzz;

class ClockBasedFizzBuzz
{
    /**
     * @var callable
     */
    private $timeProvider;

    public function __construct(callable $timeProvider)
    {
        $this->timeProvider = $timeProvider;
    }

    public function fizzBuzz()
    {
        $timeProvider = $this->timeProvider;
        $number       = $timeProvider();

        if ($number % 3 === 0 && $number % 5 === 0) {
            return 'FizzBuzz';
        }

        if ($number % 3 === 0) {
            return 'Fizz';
        }

        if ($number % 5 === 0) {
            return 'Buzz';
        }

        return $number;
    }
}
