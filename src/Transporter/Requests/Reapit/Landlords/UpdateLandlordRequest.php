<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Landlords;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class UpdateLandlordRequest extends ReapitRequest
{
    protected string $method = 'PATCH';

    protected string $path = '/landlords/';
}
