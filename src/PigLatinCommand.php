<?php namespace Smartbit;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PigLatinCommand extends Command {

    private $consonants = 'bcdfghjnptvwxz';
    private $vowels = 'aeiou';

    /**
     * Build a new pig latin command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('encrypt')
            ->setDescription('Encrypt a string using the rules of the Pig Latin game')
            ->addArgument('str', InputArgument::REQUIRED, 'The string we will encrypt.');
    }
    /**
     * Execute the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $str = $input->getArgument('str');

        $str = $this->encrypt($str);

        $output->writeln("<info>{$str}</info>");
    }

    /**
     * Encrypt a word using the Pig Latin rules
     *
     * @param string $str
     * @return string
     */
    public function encrypt($str)
    {
    	$piglatin = '';
    	
    	foreach (explode(' ', $str) as $word)
    	{
    		$piglatin .= $this->replace(strtolower($word)) . ' ';
    	}

    	return rtrim($piglatin);
    }

    public function replace($str)
    {
        if (preg_match('/^[aeiou]/', $str))
        {
            $pattern = '/^([aeiou].*)$/i';
            $replacements = "$1-way";
            return preg_replace($pattern, $replacements, $str);
        }
        elseif ($str[0] == 'q')
        {
            $pattern = '/^(qu)(.*)$/i';
            $replacements = "$2-$1ay";
            return preg_replace($pattern, $replacements, $str);
        }

        $pattern = '/^([^aeiou][^aeiouy]*)(.*)$/i';
        $replacements = "$2-$1ay";
        return preg_replace($pattern, $replacements, $str);
    }
}
