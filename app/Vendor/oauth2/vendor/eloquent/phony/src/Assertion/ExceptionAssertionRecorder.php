<?php

declare(strict_types=1);

namespace Eloquent\Phony\Assertion;

use Eloquent\Phony\Assertion\Exception\AssertionException;
use Eloquent\Phony\Call\CallVerifierFactory;
use Eloquent\Phony\Event\Event;
use Eloquent\Phony\Event\EventCollection;
use Eloquent\Phony\Event\EventSequence;
use Throwable;

/**
 * An assertion recorder that throws exceptions on failure.
 */
class ExceptionAssertionRecorder implements AssertionRecorder
{
    /**
     * Get the static instance of this recorder.
     *
     * @return AssertionRecorder The static recorder.
     */
    public static function instance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Set the call verifier factory.
     *
     * @param CallVerifierFactory $callVerifierFactory The call verifier factory to use.
     */
    public function setCallVerifierFactory(
        CallVerifierFactory $callVerifierFactory
    ) {
        $this->callVerifierFactory = $callVerifierFactory;
    }

    /**
     * Record that a successful assertion occurred.
     *
     * @param array<Event> $events The events.
     *
     * @return EventCollection The result.
     */
    public function createSuccess(array $events = []): EventCollection
    {
        return new EventSequence($events, $this->callVerifierFactory);
    }

    /**
     * Record that a successful assertion occurred.
     *
     * @param EventCollection $events The events.
     *
     * @return EventCollection The result.
     */
    public function createSuccessFromEventCollection(
        EventCollection $events
    ): EventCollection {
        return $events;
    }

    /**
     * Create a new assertion failure exception.
     *
     * @param string $description The failure description.
     *
     * @throws Throwable If this recorder throws exceptions.
     */
    public function createFailure(string $description)
    {
        throw new AssertionException($description);
    }

    private static $instance;
    private $callVerifierFactory;
}
