<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Vendors;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreateVendorRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/vendors';
}
