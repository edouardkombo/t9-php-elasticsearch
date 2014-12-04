<?php

/**
 * Main docblock
 *
 * PHP version 5
 *
 * @category  Src
 * @package   t9-php-elasticsearch
 * @author    Edouard Kombo <edouard.kombo@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @link      http://creativcoders.wordpress.com
 * @since     0.0.0
 */
namespace src;

use src\Abstracts\T9Abstract;

/**
 * T9 Controller
 *
 * @category Src
 * @package  t9-php-elasticsearch
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://creativcoders.wordpress.com
 */
class T9 extends T9Abstract
{
    /**
     *
     * @var Engine
     */
    protected $engine;     
    
    /**
     * Constructor
     * 
     * @param \src\Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * Set max combinations to show in results
     * This is not in interface cause it has nothing to deal with T9 contract
     * 
     * @param  integer $limit Limit of result to show
     * @return integer
     */
    public function setLimit($limit)
    {
        return $this->limit = (integer) $limit;
    }  
    
    
    /**
     * Get response in JSON
     * 
     * @return string
     */
    public function response()
    {
        $result = [];
        $count  = 0;
        
        foreach ($this->combinations as $key => $val) {
            $eachStrings    = implode('', $val);
            $searchResult   = $this->engine->search($eachStrings);
            $results        = $searchResult['hits']['hits'];

            if ($results === 0) {
                continue;
            }
            
            foreach ($results as $k => $v) {
                $source = array_keys($results[$k]['_source']);
                $result[]['name'] = $source[0];
                
                $count++;
                if ($count >= $this->limit) {
                    break;
                }                 
            }           
        }
        return (string) json_encode($result);
    }    
}
