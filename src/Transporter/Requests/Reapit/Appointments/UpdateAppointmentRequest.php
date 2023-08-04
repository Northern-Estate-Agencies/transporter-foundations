<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Applicants;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class UpdateAppointmentRequest extends ReapitRequest
{
    protected string $method = 'PATCH';

    protected string $path = '/appointments/';
}
