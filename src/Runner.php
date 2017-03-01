<?php declare(strict_types=1);

namespace Hultberg\DataProc;

/**
 * Runner interface for all runners.
 *
 * @author Edvin Hultberg <edvin@hultberg.no>
 */
interface Runner
{
    /**
     * Add a processor to this runner.
     *
     * @param Processor $processsor
     */
    public function addProcessor(Processor $processor): void;

    /**
     * Provides all processors in this runner.
     *
     * @return array
     */
    public function getProcessors(): array;

    /**
     * Run all processors in this runner with the provided data source.
     *
     * @param DataSource $data
     *
     * @return DataSource
     */
    public function run(DataSource $data): DataSource;
}
