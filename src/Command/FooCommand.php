<?php
declare(strict_types=1);

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\Target;

#[AsCommand(
    name: 'app:foo',
    description: 'Foo command',
)]
class FooCommand extends Command
{
    public function __construct(
        #[Target('console')] private LoggerInterface $logger,
    )
    {
        parent::__construct(null);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger->error('Foo command executed');

        return self::SUCCESS;
    }
}