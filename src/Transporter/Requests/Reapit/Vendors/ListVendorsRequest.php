<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Vendors;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class ListVendorsRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/vendors';
}
