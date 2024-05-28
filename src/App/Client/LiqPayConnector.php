<?php
/**
 * Description of PlateByMonoConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Exceptions\LiqPayException;
use Dots\LiqPay\App\Client\Requests\Payments\CancelPaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\CompletePaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\CreatePaymentRequest;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CancelPaymentRequestDTO;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CompletePaymentRequestDTO;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CreatePaymentRequestDTO;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\PaymentStatusRequestDTO;
use Dots\LiqPay\App\Client\Requests\Payments\PaymentStatusRequest;
use Dots\LiqPay\App\Client\Resources\Payments\LiqPayPayment;
use Dots\LiqPay\App\Client\Responses\ErrorResponseDTO;
use Dots\LiqPay\App\Client\Responses\Payments\CancelPaymentResponseDTO;
use Dots\LiqPay\App\Client\Responses\Payments\CreatePaymentResponseDTO;
use RuntimeException;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

class LiqPayConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        private readonly LiqPayAuthDTO $authDto,
    ) {
    }

    /**
     * @throws LiqPayException
     */
    public function createPayment(CreatePaymentRequestDTO $dto): CreatePaymentResponseDTO
    {
        return $this->send(new CreatePaymentRequest($this->authDto, $dto))->dto();
    }

    /**
     * @throws LiqPayException
     */
    public function paymentStatus(PaymentStatusRequestDTO $dto): LiqPayPayment
    {
        return $this->send(new PaymentStatusRequest($this->authDto, $dto))->dto();
    }

    /**
     * @throws LiqPayException
     */
    public function completePayment(CompletePaymentRequestDTO $dto): LiqPayPayment
    {
        return $this->send(new CompletePaymentRequest($this->authDto, $dto))->dto();
    }

    /**
     * @throws LiqPayException
     */
    public function cancelPayment(CancelPaymentRequestDTO $dto): CancelPaymentResponseDTO
    {
        return $this->send(new CancelPaymentRequest($this->authDto, $dto))->dto();
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function resolveBaseUrl(): string
    {
        $host = config('liq-pay.host');
        if (! is_string($host)) {
            throw new RuntimeException('Invalid Liq Pay host');
        }

        return $host;
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return new LiqPayException($errorResponse);
    }

    public function shouldThrowRequestException(Response $response): bool
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return $errorResponse->isError();
    }
}
