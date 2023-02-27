<?php

declare(strict_types=1);

namespace TransporterFoundations\Transporter\Requests\Reapit\JournalEntries;

use TransporterFoundations\Transporter\Requests\Reapit\ReapitRequest;

class CreateJournalEntryRequest extends ReapitRequest
{
    protected string $method = 'POST';

    protected string $path = '/journalEntries';
}
