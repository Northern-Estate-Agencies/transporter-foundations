<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Appointments;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class ListAppointmentsRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/appointments';
}
