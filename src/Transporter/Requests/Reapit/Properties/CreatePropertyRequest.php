<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Properties;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreatePropertyRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/properties';
}
