<?php
/**
 * Description of FinalizeInvoiceDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests\Payments;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CompletePaymentRequestDTO;
use Dots\LiqPay\App\Client\Requests\PostLiqPayRequest;
use Dots\LiqPay\App\Client\Resources\Payments\LiqPayPayment;
use Saloon\Http\Response;

class CompletePaymentRequest extends PostLiqPayRequest
{
    private const ENDPOINT = '/api/request';

    public function __construct(
        private readonly LiqPayAuthDTO $authDTO,
        private readonly CompletePaymentRequestDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return $this->dto->toRequestData($this->authDTO);
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function createDtoFromResponse(Response $response): LiqPayPayment
    {
        return LiqPayPayment::fromArray($response->json());
    }
}
