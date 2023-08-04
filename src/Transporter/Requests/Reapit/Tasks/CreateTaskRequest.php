<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Tasks;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreateTaskRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/tasks';
}
