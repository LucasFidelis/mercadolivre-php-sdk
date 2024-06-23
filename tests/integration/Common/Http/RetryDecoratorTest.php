<?php

use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpTooManyRequests;
use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpServerError;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientInterface;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpMethod;
use LucasFidelis\MercadoLivreSdk\Common\Http\RetryDecorator;
use PHPUnit\Framework\TestCase;

class RetryDecoratorTest extends TestCase
{
    /** @var HttpClientInterface */
    private $httpClientMock;
    
    public function setUp(): void
    {
        $this->httpClientMock = $this->createMock(HttpClientInterface::class);
    }

    public function testMustRetrunsOnSuccess(): void
    {
        $maxAttempts = 0;
        $delayInSeconds = 5;
        $this->httpClientMock->method('request')->willReturn('');
        $sut = new RetryDecorator($maxAttempts, $delayInSeconds, $this->httpClientMock);

        $output = $sut->request('https://mercadolivre.com', HttpMethod::GET);
        $this->assertEquals($output, '');
    }

    public function testRetryOnHttpTooManyRequest(): void
    {
        $this->httpClientMock->method('request')
            ->willReturnOnConsecutiveCalls(
                $this->throwException(new HttpTooManyRequests()),
                ''
            );
        $maxAttempts = 1;
        $delayInSeconds = 0;
        $sut = new RetryDecorator($maxAttempts, $delayInSeconds, $this->httpClientMock);
        $output = $sut->request('https://mercadolivre.com', HttpMethod::GET);
        $this->assertEquals($output, '');
    }

    public function testThrowExceptionIfAttempsAreExhausted(): void
    {
        $this->httpClientMock->method('request')
            ->willReturnOnConsecutiveCalls(
                $this->throwException(new HttpTooManyRequests()),
                $this->throwException(new HttpTooManyRequests()),
                $this->throwException(new HttpTooManyRequests()),
                ''
            );
        $maxAttempts = 2;
        $delayInSeconds = 0;
        $sut = new RetryDecorator($maxAttempts, $delayInSeconds, $this->httpClientMock);
        $this->expectException(HttpTooManyRequests::class);
        $sut->request('https://mercadolivre.com', HttpMethod::GET);
    }

    public function testThrowAnExceptionWithoutRetryingWhenErrorIsAnythingElse(): void 
    {
        $this->httpClientMock->method('request')
            ->willReturnOnConsecutiveCalls(
                $this->throwException(new HttpServerError()),
                ''
            );
        $maxAttempts = 2;
        $delayInSeconds = 0;
        $sut = new RetryDecorator($maxAttempts, $delayInSeconds, $this->httpClientMock);
        $this->expectException(HttpServerError::class);
        $sut->request('https://mercadolivre.com', HttpMethod::GET);
    }
}