<?php
/**
 * Description of CreatePaymentResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Responses\Payments;

use Dots\LiqPay\App\Client\Responses\LiqPayResponseDTO;
use RuntimeException;
use Saloon\Http\Response;

class CreatePaymentResponseDTO extends LiqPayResponseDTO
{
    protected string $url;

    public static function fromResponse(Response $response): static
    {
        $url = $response->header('Location');
        if ($url === null) {
            throw new RuntimeException('Location header is missing');
        }

        return static::fromArray([
            'url' => $url,
        ]);
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
