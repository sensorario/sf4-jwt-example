<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
/**
 * This context class contains the definitions of the steps used by the demo 
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 * 
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext implements Context
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Response|null
     */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When client sends GET request to :path
     */
    public function getRequest(
        string $path
    ) {
        $this->response = $this->kernel->handle(
            Request::create( $path, 'GET' )
        );
    }

    /**
     * @When client sends POST request to :path:
     */
    public function postRequest(
        string $path,
        PyStringNode $stringData = null
    ) {
        $this->response = $this->kernel->handle(
            Request::create(
                $path,
                'POST',
                [],
                [],
                [],
                ['content-type' => 'application/json'],
                $stringData->getRaw()
            )
        );
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived()
    {
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }

    /**
     * @Then the response is shown
     */
    public function theResponseIsShown()
    {
        echo var_export($this->response->getContent(), true);
    }

    /**
     * @When a demo scenario sends a GET request to :arg1
     */
    public function aDemoScenarioSendsAGetRequestTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the response should be:
     */
    public function theResponseShouldBe(
        PyStringNode $stringData = null
    ) {
        $jsonResponse = json_encode(
            $this->response->getContent(),
            true
        );

        $expectedResponse = $stringData->getRaw();

        echo json_encode([
            'jsonResponse' => $jsonResponse,
            'expectedResponse' => $expectedResponse,
        ]);
    }
}
