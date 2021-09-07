<?php

namespace MarcialPaulG\Coinbase\Interfaces;

interface Webhook
{

    const CREATED = 'charge:created';

    const CONFIRMED = 'charge:confirmed';

    const FAILED = 'charge:failed';

    const DELAYED = 'charge:delayed';

    const PENDING = 'charge:pending';

    const RESOLVED = 'charge:resolved';

    const SIGNATURE_HEADER_NAME = 'X-CC-Webhook-Signature';
}
