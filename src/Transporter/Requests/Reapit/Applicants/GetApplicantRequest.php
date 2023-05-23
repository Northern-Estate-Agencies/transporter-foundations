<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\Applicants;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class GetApplicantRequest extends ReapitRequest
{
    protected string $method = 'GET';

    protected string $path = '/applicants/';
}
