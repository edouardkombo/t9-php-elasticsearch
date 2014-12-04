<?php

/**
 * Main docblock
 *
 * PHP version 5
 *
 * @category  Abstracts
 * @package   t9-php-elasticsearch
 * @author    Edouard Kombo <edouard.kombo@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @link      http://creativcoders.wordpress.com
 * @since     0.0.0
 */
namespace src\Abstracts;

use src\Interfaces\T9Interface;

/**
 * T9 Abstract
 *
 * @category Abstracts
 * @package  t9-php-elasticsearch
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://creativcoders.wordpress.com
 */
abstract class T9Abstract implements T9Interface
{
    /**
     *
     * @var array
     */
    protected $combinations = ['']; 
    
    /**
     *
     * @var array
     */
    protected $digitsCharacters = [];     
    
    /**
     *
     * @var integer
     */
    protected $limit = 5;    
  
    /**
     *
     * @var array
     */
    protected $digitsAndCharacters = array(
        '*' => '',
        '#' => '',     
        '0' => '',
        '1' => '',        
        '2' => array('a', 'b', 'c'),
        '3' => array('d', 'e', 'f'),
        '4' => array('g', 'h', 'i'),
        '5' => array('j', 'k', 'l'),
        '6' => array('m', 'n', 'o'),
        '7' => array('p', 'q', 'r', 's'),
        '8' => array('t', 'u', 'v'),
        '9' => array('w', 'x', 'y', 'z'),
    );    
    
    /**
     * Get all letters for each specific digits entered by user
     * 
     * @param  string $digits User input
     * @return array
     */
    public function getAllCharactersDigits($digits)
    {
        for ($i=0; $i<strlen($digits); $i++) {
            if (empty($this->digitsAndCharacters[$digits[$i]])) {
                continue;
            }    
            $this->digitsCharacters[] =$this->digitsAndCharacters[$digits[$i]];
        }
        
        return $this->digitsCharacters;
    }
    
    /**
     * Get all combinations from user input with recursive function
     * 
     * @param  array   $all   Array that will contain all possible combinations
     * @param  array   $group Combinations during each recursion
     * @param  string  $val   Value of each array key during each recursion
     * @param  integer $i     Iterator value     
     * @return array
     */
    public function combine(&$all=array(), $group=array(), $val=null, $i=0)
    {
        (isset($val)) ? array_push($group, $val) : '' ;

        if ($i>=count($this->digitsCharacters)) {
            array_push($all, $group);
        } else {
            foreach ($this->digitsCharacters[$i] as $v){
                $this->combine($all, $group, $v, $i + 1);
            }
        }

        return $this->combinations = $all;
    }       
    
    /**
     * Return final response
     * Treat it
     */
    public function response()
    {
        
    }
}
