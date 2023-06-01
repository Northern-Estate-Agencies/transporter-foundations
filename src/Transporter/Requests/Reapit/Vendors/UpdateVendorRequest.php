<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Contacts;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class UpdateVendorRequest extends ReapitRequest
{
    protected string $method = 'PATCH';

    protected string $path = '/vendors/';
}
