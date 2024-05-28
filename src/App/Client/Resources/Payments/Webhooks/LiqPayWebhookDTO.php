<?php
/**
 * Description of LiqPayWebhookDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Resources\Payments\Webhooks;

use Dots\Data\DTO;
use Dots\LiqPay\App\Client\Resources\Payments\LiqPayPayment;
use RuntimeException;

class LiqPayWebhookDTO extends DTO
{
    protected string $signature;
    protected string $data;

    public function getLiqPayPayment(): LiqPayPayment
    {
        $data = $this->getDecodedData();
        if (empty($data)) {
            throw new RuntimeException('Invalid Liq Pay webhook data');
        }

        return LiqPayPayment::fromArray($data);
    }

    public function getDecodedData(): array
    {
        $data = base64_decode($this->getData());
        if (! $data) {
            return [];
        }
        $data = json_decode($data, true);
        if (! is_array($data)) {
            return [];
        }

        return $data;
    }

    public function getSignature(): string
    {
        return $this->signature;
    }

    public function getData(): string
    {
        return $this->data;
    }
}
