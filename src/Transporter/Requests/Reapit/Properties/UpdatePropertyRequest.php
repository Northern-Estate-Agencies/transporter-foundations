<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Properties;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class UpdatePropertyRequest extends ReapitRequest
{
    protected string $method = 'PATCH';

    protected string $path = '/properties/';
}
