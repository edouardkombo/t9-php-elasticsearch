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
 * Contract for T9 Interface
 *
 * @category Interfaces
 * @package  t9-php-elasticsearch
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://creativcoders.wordpress.com
 */
interface T9Interface
{   
    /**
     * User input search
     * 
     * @param  array   $all   Array that will contain all possible combinations
     * @param  array   $group Combinations during each recursion
     * @param  string  $val   Value of each array key during each recursion
     * @param  integer $i     Iterator value     
     * @return array
     */
    public function combine();
    
    /**
     * Return final response
     * 
     * @return string
     */
    public function response();
       
}
