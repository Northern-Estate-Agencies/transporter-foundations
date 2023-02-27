<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Contacts;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class ListContactsRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/contacts';
}
