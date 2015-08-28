<?php

namespace App\Listeners;

use App\Events\PersonWasAdded;
use App\Events\PersonWasUpdated;
use Elastica\Client as ElasticaClient;

class IndexPersonInElasticsearch
{
    /**
     * @var ElasticaClient
     */
    private $elasticaClient;

    /**
     * @param ElasticaClient $elasticaClient
     */
    public function __construct(ElasticaClient $elasticaClient)
    {
        $this->elasticaClient = $elasticaClient;
    }

    /**
     * @param PersonWasAdded $event
     */
    public function handle($event)
    {
        if (!$event instanceof PersonWasAdded
            || !$event instanceof PersonWasUpdated
        ) {
            return;
        }
        // ...
    }
}
