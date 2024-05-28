<?php
/**
 * Description of LiqPayWebhookDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Resources\Payments\Webhooks;

use Dots\LiqPay\App\Client\Resources\Payments\Webhooks\LiqPayWebhookDTO;
use RuntimeException;
use Tests\Generators\LiqPayPaymentGenerator;
use Tests\TestCase;

class LiqPayWebhookDTOTest extends TestCase
{
    public function testExpectsDecodedData(): void
    {
        $payment = LiqPayPaymentGenerator::generate();

        $dto = LiqPayWebhookDTO::fromArray([
            'signature' => $this->uuid(),
            'data' => base64_encode(json_encode($payment->toArray())),
        ]);

        $this->assertEquals($payment->toArray(), $dto->getDecodedData());
    }

    public function testExpectsLiqPayPayment(): void
    {
        $payment = LiqPayPaymentGenerator::generate();

        $dto = LiqPayWebhookDTO::fromArray([
            'signature' => $this->uuid(),
            'data' => base64_encode(json_encode($payment->toArray())),
        ]);

        $this->assertEquals($payment->toArray(), $dto->getLiqPayPayment()->toArray());
    }

    public function testGetLiqPayPaymentExpectsFailIfEmptyData(): void
    {
        $this->expectException(RuntimeException::class);
        $dto = LiqPayWebhookDTO::fromArray([
            'signature' => $this->uuid(),
            'data' => base64_encode(json_encode([])),
        ]);

        $dto->getLiqPayPayment();
    }
}
