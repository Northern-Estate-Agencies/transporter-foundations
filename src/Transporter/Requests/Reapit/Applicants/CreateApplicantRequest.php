<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Applicants;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreateApplicantRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/applicants';
}
