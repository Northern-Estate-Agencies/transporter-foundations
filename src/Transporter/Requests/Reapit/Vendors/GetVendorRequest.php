<?php

declare(strict_types=1);

namespace App\Transporter\Requests\Reapit\Vendors;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class GetVendorRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/vendors/';
}
