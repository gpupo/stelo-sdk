<?php

/*
 * This file is part of gpupo/stelo-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/stelo-sdk/>.
 */

namespace Gpupo\SteloSdk;


use Symfony\Component\Console\Application as Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Gpupo\SteloSdk\Factory;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use \InvalidArgumentException;

class Application extends Console
{
    protected $commonParameters = [
        [
            'key'   => 'client_id',
        ],
        [
            'key'   => 'access_token',
        ],
        [
            'key'       => 'env',
            'options'   => ['sandbox', 'api'],
            'default'   => 'sandbox',
            'name'      => 'Version',
        ],
        [
            'key'       => 'protocol',
            'options'   => ['http', 'https'],
            'default'   => 'https',
            'name'      => 'Protocol',
        ],
        [
            'key'       => 'sslVersion',
            'options'   => ['SecureTransport', 'TLS'],
            'default'   => 'SecureTransport',
            'name'      => 'SSL Version',
        ],
    ];

    public function factoryDefinition(array $definitions = [])
    {
        $list = [];

        foreach (array_merge($this->commonParameters, $definitions) as $parameter) {
            $list[] = new InputOption($parameter['key'], null, InputOption::VALUE_REQUIRED);
        }

        return $list;
    }

    protected function processInputParameter($parameter, InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption($parameter['key'])) {
            return $input->getOption($parameter['key']);
        } elseif(array_key_exists('options',$parameter)) {
            $subject = $parameter['key'] .' (['.implode($parameter['options'], ',')
                .((array_key_exists('default',$parameter)) ? '] ENTER for <info>' .$parameter['default'].'</info>': '' ).'): ';

            return $this->getHelperSet()->get('dialog')->askAndValidate($output, $subject, function ($value) use ($parameter) {
               if (array_search($value, $parameter['options'], true) === false) {
                   throw new InvalidArgumentException(sprintf($parameter['key'].'"%s" is invalid. Valid values:'.implode($parameter['options'], ','), $value));
               }

               return $value;
           }, false, (array_key_exists('default',$parameter) ? $parameter['default'] : ''));

        }else {
            return  $this->getHelperSet()->get('dialog')->ask($output, $parameter['key'].': ');
        }
    }
    
    public function processInputParameters(array $definitions, InputInterface $input, OutputInterface $output)
    {
        $list = [];
        foreach (array_merge($this->commonParameters, $definitions) as $parameter) {
            $list[$parameter['key']] = $this->processInputParameter($parameter, $input, $output);
        }

        return $list;
    }

    public function factoryLogger()
    {
        $logger = new Logger('bin');
        $logger->pushHandler(new StreamHandler('Resources/logs/main.log', Logger::DEBUG));

        return $logger;
    }

    public function factorySdk(array $options)
    {
        $options['version'] = $options['env'];

        return  Factory::getInstance()->setup($options, $this->factoryLogger());
    }
}
