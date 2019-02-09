<?php

namespace SH\Utils\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class FileListTest extends TestCase
{
    private $command;
    protected function setUp()
    {
        $this->command = new UtilsCommand();
    }

    /**
     * @test
     */
    public function testCommand()
    {
        $tester = $this->execute(['test_arg' => 'Hello']);
        $this->assertEquals("Hello" . PHP_EOL, $tester->getDisplay());
    }
    /**
     * @param array $input
     *
     * @return CommandTester
     */
    private function execute(array $input = [])
    {
        $tester = new CommandTester($this->command);
        $tester->execute($input);

        return $tester;
    }
}

