<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Properties;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class ListPropertiesRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/properties';
}
