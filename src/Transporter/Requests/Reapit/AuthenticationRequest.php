<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit;

use Illuminate\Http\Client\PendingRequest;
use JustSteveKing\Transporter\Request;
use Illuminate\Support\Facades\Config;
class AuthenticationRequest extends Request
{
    protected string $method = 'POST';

    protected string $baseUrl = 'https://connect.reapit.cloud/';

    protected string $path = '/token';

    protected function withRequest(PendingRequest $request): void
    {
        $request->withHeaders(
            [
                'Authorization' => 'Basic '.base64_encode(Config::get('services.reapit.client_id').':'.Config::get('services.reapit.client_secret')),
            ]
        )->asForm();
    }
}
