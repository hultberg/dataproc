<?php declare(strict_types=1);

namespace Hultberg\DataProc;

use Psr\Log\LoggerInterface;

/**
 * A simple runner implementation.
 *
 * @author Edvin Hultberg <edvin@hultberg.no>
 */
class SimpleRunner implements Runner
{
    /**
     * @var Processsor[]
     */
    protected $processors;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Construct new runner.
     *
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->processors = [];
        $this->logger = $logger;
    }

    /**
     * Add a processor to this runner.
     *
     * @param Processor $processor
     */
    public function addProcessor(Processor $processor): void
    {
        $this->processors[] = $processor;
    }

    /**
     * Provides all processors in this runner.
     *
     * @return array
     */
    public function getProcessors(): array
    {
        return $this->processors;
    }

    /**
     * Run all processors in this runner with the provided data source.
     *
     * @param DataSource $data
     *
     * @return DataSource
     */
    public function run(DataSource $data): DataSource
    {
        if (count($this->processors) > 0) {
            foreach ($this->processors as $processor) {
                try {
                    $data = $processor->process($data);
                } catch (ProcessingException $e) {
                    // Log this exception if the logger is provided.
                    if ($this->logger !== null) {
                        $this->logger->error(sprintf(
                            'A processing error caught while running %s, message: %s',
                            get_class($processor),
                            $e->getMessage()
                        ));
                    }
                }
            }
        }

        return $data;
    }
}
