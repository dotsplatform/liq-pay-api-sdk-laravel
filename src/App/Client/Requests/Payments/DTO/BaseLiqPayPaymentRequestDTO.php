<?php
/**
 * Description of BaseLiqPayPaymentRequestDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests\Payments\DTO;

use Dots\Data\DTO;
use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Auth\LIqPaySignature;

abstract class BaseLiqPayPaymentRequestDTO extends DTO
{
    public function toRequestData(LiqPayAuthDTO $authDTO): array
    {
        return [
            'data' => base64_encode(json_encode($this->toArray()) ?: ''),
            'signature' => LIqPaySignature::generate($authDTO, $this),
        ];
    }
}
