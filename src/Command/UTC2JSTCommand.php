<?php


namespace SH\Utils\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UTC2JSTCommand extends Command
{
    const COMMAND_NAME = 'sh:utils:utc2jst';

    public function __construct()
    {
        parent::__construct(self::COMMAND_NAME);
    }

    protected function configure()
    {
        $this
            ->setName('sh:utils:utc2jst')
            ->setDescription('Convert UTC to JST.')
            ->addArgument('utc', InputArgument::REQUIRED, 'UTC time. example 20190101010101 or 2019-01-01 01:01:01 or 2019-01-01T01:01:01.000Z', null);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $utcTimeStamp = strtotime($input->getArgument('utc'));
        $utcTime = new \DateTimeImmutable(date('Y-m-d H:i:s', $utcTimeStamp));
        $jstTime = $utcTime->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
        $output->writeln($jstTime->format('Y-m-d H:i:s') . PHP_EOL);
    }
}