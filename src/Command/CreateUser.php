<?php
/**
 * Plugins Management
 * Last Changed: $LastChangedDate: 2017-04-27 04:45:04 -0400 (Thu, 27 Apr 2017) $
 * @author detain
 * @copyright 2017
 * @package MyAdmin
 * @category Plugins
 */

namespace MyAdmin\PluginInstaller\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Composer\Command\BaseCommand;

class CreateUser extends BaseCommand {
	protected function configure() {
		$this
			->setName('myadmin:create-user') // the name of the command (the part after "bin/console")
			->setDescription('Creates a new user.') // the short description shown while running "php bin/console list"
			->setHelp('This command allows you to create a user...') // the full command description shown when running the command with the "--help" option
			->addArgument('username', InputArgument::REQUIRED, 'The username of the user.'); // configure an argument

	}

	/** (optional)
	 * This method is executed before the interact() and the execute() methods.
	 * Its main purpose is to initialize variables used in the rest of the command methods.
	 */
	protected function initialize() {}

	/** (optional)
	 * This method is executed after initialize() and before execute().
	 * Its purpose is to check if some of the options/arguments are missing and interactively
	 * ask the user for those values. This is the last place where you can ask for missing
	 * options/arguments. After this command, missing options/arguments will result in an error.
	 */
	protected function interact() {}

	/** (required)
	 * This method is executed after interact() and initialize().
	 * It contains the logic you want the command to execute.
	 *
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 */
	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln([ // outputs multiple lines to the console (adding "\n" at the end of each line)
			'User Creator',
			'============',
			'',
		]);
		$output->writeln('Username: '.$input->getArgument('username')); // retrieve the argument value using getArgument()
		$output->write('You are about to '); // outputs a message without adding a "\n" at the end of the line
		$output->write('create a user.');

		/** Coloring
		 * @link http://symfony.com/doc/current/console/coloring.html
		 */
		$output->writeln('<info>foo</info>'); // green text
		$output->writeln('<comment>foo</comment>'); // yellow text
		$output->writeln('<question>foo</question>'); // black text on a cyan background
		$output->writeln('<error>foo</error>'); // white text on a red background

		/** Formatting
		 * @link http://symfony.com/doc/current/components/console/helpers/formatterhelper.html
		 */
		$formatter = $this->getHelper('formatter');
		// Section - [SomeSection] Here is some message related to that section
		$formattedLine = $formatter->formatSection('SomeSection', 'Here is some message related to that section');
		$output->writeln($formattedLine);
		// Error Block
		$errorMessages = array('Error!', 'Something went wrong');
		$formattedBlock = $formatter->formatBlock($errorMessages, 'error');
		$output->writeln($formattedBlock);
		// Truncated Messages
		$message = "This is a very long message, which should be truncated";
		$truncatedMessage = $formatter->truncate($message, 7); // This is...
		$truncatedMessage = $formatter->truncate($message, 7, '!!'); // result: This is!!
		$output->writeln($truncatedMessage);

		/** Table
		 * @link http://symfony.com/doc/current/components/console/helpers/table.html
		 */

		/** Style
		 * @link http://symfony.com/doc/current/console/style.html
		 */

		/** Process Helper
		 * @link http://symfony.com/doc/current/components/console/helpers/processhelper.html
		 */
		/** Progress Bar
		 * @link http://symfony.com/doc/current/components/console/helpers/progressbar.html
		 */
		/** Question Helper
		 * @link http://symfony.com/doc/current/components/console/helpers/questionhelper.html
		 */
	}
}