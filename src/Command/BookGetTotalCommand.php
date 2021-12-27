<?php

namespace App\Command;

use App\Services\BookService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class BookGetTotalCommand extends Command
{
    protected static $defaultName = 'book:get:total';
    protected static $defaultDescription = 'Obtiene el Total de Libros en el Sistema';

    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;

        // The name of the command; passing null means it must be set in configure().
        parent::__construct(null);
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $totalBooks = $this->bookService->getTotalBooks()['TotalBooks'];

        $io->success('El Número Total de libros en el sistema es: '.$totalBooks);

        return Command::SUCCESS;
    }
}
