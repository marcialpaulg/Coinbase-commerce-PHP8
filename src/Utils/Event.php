<?php

namespace MarcialPaulG\Coinbase\Utils;

use MarcialPaulG\Coinbase\ApiRequest;
use MarcialPaulG\Coinbase\Interfaces\Event as InterfaceEvent;

trait Event
{

    public function listEvents()
    {
        $request = new ApiRequest('GET', InterfaceEvent::RESOURCE_URI);

        return $this->request($request);
    }

    public function getEvent(string $event_id)
    {
        $request = new ApiRequest('GET', InterfaceEvent::RESOURCE_URI . "/{$event_id}");

        return $this->request($request);
    }
}
