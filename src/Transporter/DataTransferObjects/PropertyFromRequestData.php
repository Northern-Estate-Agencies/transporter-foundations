<?php

namespace TransporterFoundations\Transporter\DataTransferObjects;

class PropertyFromRequestData
{
    /**
     * @param  array<string,string>  $address
     */
    public function __construct(
        public string $id,
        public string $marketingMode,
        public array $address
    ) {
    }

    /**
     * @param  mixed  $data
     */
    public static function fromContactListPayload($data): ?self
    {
        if (! is_array($data)) {
            return null;
        }

        if (! is_array($data['_embedded'])) {
            return null;
        }

        $mainPayload = $data['_embedded'][0] ?? null;

        if (! $mainPayload) {
            return null;
        }

        return self::fromPayload($mainPayload);
    }

    /**
     * @param  array<string, array<string, string>|string>  $data
     */
    public static function fromPayload(array $data): self
    {
        return new self(
            id: strval($data['id']),
            marketingMode: strval($data['marketingMode']),
            address: $data['address'],
        );
    }
}
