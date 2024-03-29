<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Landlords;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class ListLandlordsRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/landlords';
}
