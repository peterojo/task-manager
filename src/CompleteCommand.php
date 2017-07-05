<?php
/**
 * Created by PhpStorm.
 * User: peterojo
 * Date: 7/5/17
 * Time: 3:39 PM
 */

namespace Peterojo;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command {
	
	protected function configure () {
		$this->setName('complete')
			->setDescription('Marks a task as completed.')
			->addArgument('id', InputArgument::REQUIRED);
	}
	
	protected function execute ( InputInterface $input, OutputInterface $output ) {
		$id = $input->getArgument('id');
		
		$this->database->query("DELETE FROM tasks WHERE id=:id", compact('id'));
		
		$output->writeln("<info>Task completed.</info>");
		
		$this->showTasks($output);
	}
}