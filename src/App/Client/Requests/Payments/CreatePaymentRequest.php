<?php
/**
 * Description of CreatePaymentRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests\Payments;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CreatePaymentRequestDTO;
use Dots\LiqPay\App\Client\Requests\PostLiqPayRequest;
use Dots\LiqPay\App\Client\Responses\Payments\CreatePaymentResponseDTO;
use Saloon\Http\Response;

class CreatePaymentRequest extends PostLiqPayRequest
{
    private const ENDPOINT = '/api/3/checkout';

    public function __construct(
        private readonly LiqPayAuthDTO $authDTO,
        private readonly CreatePaymentRequestDTO $dto,
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

    protected function defaultConfig(): array
    {
        return [
            'allow_redirects' => false,
        ];
    }

    public function createDtoFromResponse(Response $response): CreatePaymentResponseDTO
    {
        return CreatePaymentResponseDTO::fromResponse($response);
    }
}
