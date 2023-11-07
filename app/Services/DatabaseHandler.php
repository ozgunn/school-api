<?php

namespace App\Services;

use App\Models\Log;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class DatabaseHandler extends AbstractProcessingHandler
{

    /**
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        Log::create([
            'level' => $record['level_name'],
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'message' => substr($record['message'], 255),
            'context' => substr($record['formatted'], 500),
        ]);
    }
}
