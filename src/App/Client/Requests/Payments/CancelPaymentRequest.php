<?php
/**
 * Description of CancelPaymentRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests\Payments;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CancelPaymentRequestDTO;
use Dots\LiqPay\App\Client\Requests\PostLiqPayRequest;
use Dots\LiqPay\App\Client\Responses\Payments\CancelPaymentResponseDTO;
use Saloon\Http\Response;

class CancelPaymentRequest extends PostLiqPayRequest
{
    private const ENDPOINT = '/api/request';

    public function __construct(
        private readonly LiqPayAuthDTO $authDTO,
        private readonly CancelPaymentRequestDTO $dto,
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

    public function createDtoFromResponse(Response $response): CancelPaymentResponseDTO
    {
        return CancelPaymentResponseDTO::fromResponse($response);
    }
}
