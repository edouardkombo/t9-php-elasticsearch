<?php

/**
 * Main docblock
 *
 * PHP version 5
 *
 * @category  Interfaces
 * @package   t9-php-elasticsearch
 * @author    Edouard Kombo <edouard.kombo@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @link      http://creativcoders.wordpress.com
 * @since     0.0.0
 */
namespace src\Interfaces;

/**
 * Contract for the Engine interface
 *
 * @category Interfaces
 * @package  t9-php-elasticsearch
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://creativcoders.wordpress.com
 */
interface EngineInterface
{
    /**
     * Populate dictionary into ElasticSearch
     * 
     * @param  array $argv
     * @return mixed
     */
    public function populate($argv);

    /**
     * User input search
     * 
     * @param  string $query Query to search
     * @return array
     */
    public function search($query);   
}
