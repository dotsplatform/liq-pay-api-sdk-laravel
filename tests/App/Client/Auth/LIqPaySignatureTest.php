<?php
/**
 * Description of LIqPaySignatureTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Auth;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Auth\LiqPaySignature;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CancelPaymentRequestDTO;
use Tests\TestCase;

class LIqPaySignatureTest extends TestCase
{
    public function testSignature(): void
    {
        $dto = CancelPaymentRequestDTO::fromArray([
            'public_key' => $this->uuid(),
            'order_id' => $this->uuid(),
            'amount' => 20,
        ]);
        $authDTO = LiqPayAuthDTO::fromArray([
            'publicKey' => $this->uuid(),
            'privateKey' => $this->uuid(),
        ]);
        $expectedSignature = base64_encode(sha1($authDTO->getPrivateKey().base64_encode(json_encode($dto->toArray()) ?: '').$authDTO->getPrivateKey(), true));
        $signature = LiqPaySignature::generate($authDTO, $dto);
        $this->assertEquals($expectedSignature, $signature);
    }
}
