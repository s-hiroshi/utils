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
            ->addArgument('utc', InputArgument::REQUIRED, 'yyyymmddhhiiss', null);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        list($y1, $y2, $m, $d, $h, $i, $s) = str_split($input->getArgument('utc'), 2);
        $utc = sprintf('%s%s-%s-%sT%s:%s:%s.000Z', $y1, $y2, $m, $d, $h, $i, $s);
        $utc = new \DateTimeImmutable($utc);
        $jst = $utc->setTimeZone(new \DateTimeZone('Asia/Tokyo'));
        $output->writeln($jst->format('Y-m-d H:i:s') . PHP_EOL);
    }
}