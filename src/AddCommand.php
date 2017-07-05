<?php
/**
 * Created by PhpStorm.
 * User: peterojo
 * Date: 7/5/17
 * Time: 3:16 PM
 */

namespace Peterojo;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command {
	
	protected function configure () {
		$this->setName('add')
			->setDescription('Add a new task')
			->addArgument('description', InputArgument::REQUIRED);
	}
	
	protected function execute ( InputInterface $input, OutputInterface $output ) {
		$description = $input->getArgument('description');
		
		$this->database->query(
			"INSERT INTO tasks(description) VALUES(:description)",
			compact('description')
		);
		
		$output->writeln("<info>New Task Added!</info>");
		
		$this->showTasks($output);
	}
	
}