<?php


namespace SH\Utils\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Text2JsonCommand extends Command
{

    const COMMAND_NAME = 'sh:utils:text2json';

    public function __construct()
    {
        parent::__construct(self::COMMAND_NAME);
    }

    protected function configure()
    {
        $this
            ->setName('sh:utils:text2json')
            ->setDescription('Convert text to UTF-8.')
            ->addArgument('file', InputArgument::REQUIRED, 'file path.', null);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('file');
        $content = file_get_contents($path);
        $textContents = explode(',', $content);
        $jsonContents = array_map(function($line) {
           $line = str_replace('"', '', trim($line));
           $line = str_replace('\n', 'n', $line);
           $line =  json_encode($line);
           return str_replace('n', '\n', $line);
        }, $textContents);
        $output->writeln(implode("," . PHP_EOL, $jsonContents));
    }
}