<?php


namespace SH\Utils\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UtilsCommand extends Command
{
    const COMMAND_NAME = 'sh:utils:test';

    public function __construct()
    {
        parent::__construct(self::COMMAND_NAME);
    }

    protected function configure()
    {
        $this
            ->setName('sh:utils:test')
            ->setDescription('command of Utility.')
            ->addArgument('test', InputArgument::REQUIRED, 'test argument', null);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $out = $input->getArgument('test');
        $output->writeln($out);
    }

}