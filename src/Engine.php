<?php

/**
 * Main docblock
 *
 * PHP version 5
 *
 * @category  Src
 * @package   T9
 * @author    Edouard Kombo <edouard.kombo@gmail.com>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   GIT: 1.0.0
 * @link      http://creativcoders.wordpress.com
 * @since     0.0.0
 */
namespace src;

use src\Abstracts\EngineAbstract;

/**
 * Engine Controller
 *
 * @category Src
 * @package  T9
 * @author   Edouard Kombo <edouard.kombo@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT License
 * @link     http://creativcoders.wordpress.com
 */
class Engine extends EngineAbstract
{
    /**
     *
     * @var \src\Elasticsearch\Client 
     */
    protected $client;
    
    /**
     *
     * @var array 
     */
    protected $dicitonary;
    
    /**
     *
     * @var array 
     */
    protected $params;    
    
    /**
     * Constructor
     * 
     * @param \src\Elasticsearch\Client $client     Elastic Search
     * @param array                     $dictionary Array of words in Json
     * @param array                     $params     Elasticsearch type and index
     */
    public function __construct(\Elasticsearch\Client $client, $dictionary, 
            $params)
    {
        $this->client     = $client;
        $this->dictionary = (array) $dictionary;
        $this->params     = $params;
    }    
}
