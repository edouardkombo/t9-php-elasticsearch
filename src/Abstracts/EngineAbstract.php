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

use src\Interfaces\EngineInterface;

/**
 * Engine Abstract
 *
 * @category Abstracts
 * @package  t9-php-elasticsearch
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://creativcoders.wordpress.com
 */
abstract class EngineAbstract implements EngineInterface
{
     /**
     * Populate dictionary to Elasticsearch
     * 
     * @param  array $argv Console arguments
     * @return mixed
     */
    public function populate($argv)
    {
        if (isset($argv) && is_array($argv) && ($argv[1] === 'populate')) {
            $index  = [];
            $id     = 0;
            foreach ($this->dictionary as $key => $value) {
                $index['body']  = array($key => $value);
                $index['index'] = $this->params['index'];
                $index['type']  = $this->params['type'];
                $index['id']    = $id++;
                $this->client->index($index);    
            }
            $result = (object) $this->client;    
        } else {
            $result = (boolean) false;
        }
        
        return $result;
    }
    
    /**
     * Search for occurences directly in elastic search
     * 
     * @param  string $query Query to search for
     * @return array
     */
    public function search($query)
    {
        $searchParams = []; 
        $searchParams['index'] = $this->params['index'];
        $searchParams['type']  = $this->params['type'];

        $searchParams['body']['query']['match']['_all'] = $query;
        $searchParams['body']['sort'] = ['_score'];
        
        return (array) $this->client->search($searchParams);
    } 
}
