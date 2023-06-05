<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use JustSteveKing\Transporter\Request;
use Illuminate\Support\Facades\Config;

class ReapitRequest extends Request
{
    protected string $method = 'GET';

    protected string $baseUrl = 'https://platform.reapit.cloud/';

    protected string $path = '/';

    protected string $authToken = '';

    protected string $customer = 'sbox';

    /** @var array<string, mixed> */
    protected array $data = [];

    public function withId(string $id): self
    {
        $this->path .= $id;

        return $this;
    }

    public function setCustomer(string $id): self
    {
        $this->customer = $id;

        return $this;
    }

    protected function withRequest(PendingRequest $request): void
    {
        $this->checkAndSetAuthToken();

        $request->withToken($this->authToken)
            ->withHeaders(
                [
                    'reapit-customer' => $this->customer,
                    'api-version' => '2020-01-31',
                ]
            );
    }

    private function checkAndSetAuthToken(): void
    {
        if ($this->authToken === '') {
            $token = AuthenticationRequest::build()->withData([
                'client_id' => Config::get('services.reapit.client_id'),
                'grant_type' => 'client_credentials',
            ])->send()->collect()->get('access_token');
            if ($token) {
                $this->authToken = strval($token);

                return;
            }
            throw new Exception('Unable to get reapit auth token');
        }
    }

    public function getEndpoint(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
