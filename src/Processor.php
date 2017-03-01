<?php declare(strict_types=1);

namespace Hultberg\DataProc;

/**
 * A class that process a data source.
 *
 * @author Edvin Hultberg <edvin@hultberg.no>
 */
interface Processor
{
    /**
     * Process the given data source object and return it after processing.
     *
     * @throws ProcessingException On error.
     *
     * @param DataSource $data
     *
     * @return DataSource
     */
    public function process(DataSource $data): DataSource;
}
