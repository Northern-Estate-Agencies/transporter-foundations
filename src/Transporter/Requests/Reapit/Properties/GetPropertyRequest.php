<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Properties;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class GetPropertyRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/properties/';
}
