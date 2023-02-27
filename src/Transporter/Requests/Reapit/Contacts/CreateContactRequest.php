<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Contacts;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreateContactRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/contacts';
}
