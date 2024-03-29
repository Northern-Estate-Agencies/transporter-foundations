<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Landlords;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreateLandlordRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/landlords';
}
