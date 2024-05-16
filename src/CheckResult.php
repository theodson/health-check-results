<?php

namespace OhDear\HealthCheckResults;

class CheckResult
{
    const STATUS_OK = 'ok';
    const STATUS_WARNING = 'warning';
    const STATUS_FAILED = 'failed';
    const STATUS_CRASHED = 'crashed';
    const STATUS_SKIPPED = 'skipped';

    public $name;
    public $label = '';
    public $notificationMessage = '';
    public $shortSummary = '';
    public $status = '';
    public $meta = [];

    /**
     * @param string $name
     * @param string $notificationMessage
     * @param string $shortSummary
     * @param string $status
     * @param array<int, mixed> $meta
     *
     * @return self
     */
    public static function make(
        string $name,
        string $label = '',
        string $notificationMessage = '',
        string $shortSummary = '',
        string $status = '',
        array  $meta = []
    ): self {
        return new self(...func_get_args());
    }

    /**
     * @param string $name
     * @param string $notificationMessage
     * @param string $shortSummary
     * @param string $status
     * @param array<int, mixed> $meta
     */
    public function __construct(
        string $name,
        string $label = '',
        string $notificationMessage = '',
        string $shortSummary = '',
        string $status = '',
        array  $meta = []
    ) {
        $this->meta = $meta;
        $this->status = $status;
        $this->shortSummary = $shortSummary;
        $this->notificationMessage = $notificationMessage;
        $this->label = $label;
        $this->name = $name;
    }

    public function notificationMessage(string $notificationMessage): self
    {
        $this->notificationMessage = $notificationMessage;

        return $this;
    }

    public function shortSummary(string $shortSummary): self
    {
        $this->shortSummary = $shortSummary;

        return $this;
    }

    public function status(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param array<int, mixed> $meta
     *
     * @return $this
     */
    public function meta(array $meta): self
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'notificationMessage' => $this->notificationMessage,
            'shortSummary' => $this->shortSummary,
            'status' => $this->status,
            'meta' => $this->meta,
        ];
    }
}
