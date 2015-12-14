<?php

namespace FizzBuzz;

class ConsoleWritingFizzBuzz
{
    /**
     * @var OutputHandler
     */
    private $outputHandler;

    public function __construct(OutputHandler $outputHandler)
    {
        $this->outputHandler = $outputHandler;
    }

    public function fizzBuzz($number)
    {
        if ($number % 15 === 0) {
            $this->outputHandler->write('FizzBuzz');

            return;
        }

        if ($number % 3 === 0) {
            $this->outputHandler->write('Fizz');

            return;
        }

        if ($number % 5 === 0) {
            $this->outputHandler->write('Buzz');

            return;
        }

        $this->outputHandler->write($number);
    }
}
