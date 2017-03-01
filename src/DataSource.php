<?php declare(strict_types=1);

namespace Hultberg\DataProc;

/**
 * Represent a data source used in processors.
 *
 * @author Edvin Hultberg <edvin@hultberg.no>
 */
class DataSource
{
    protected $data;

    /**
     * Provides the data as a string.
     *
     * @return string
     */
    public function getStringValue(): string
    {
        return $this->data;
    }

    /**
     * Set the data as a string.
     *
     * @param string $data
     */
    public function setStringValue(string $data): void
    {
        $this->data = $data;
    }

    /**
     * Provides the data as an integer.
     *
     * @return int
     */
    public function getIntValue(): int
    {
        return $this->data;
    }

    /**
     * Set the data as an integer.
     *
     * @param int $data
     */
    public function setIntValue(int $data): void
    {
        $this->data = $data;
    }
}
