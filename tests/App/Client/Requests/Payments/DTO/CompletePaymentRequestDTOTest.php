<?php
/**
 * Description of CompletePaymentRequestDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Requests\Payments\DTO;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Auth\LiqPaySignature;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CompletePaymentRequestDTO;
use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\LiqPayApiVersion;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class CompletePaymentRequestDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CompletePaymentRequestDTO::fromArray([
            'public_key' => $this->uuid(),
            'amount' => 100.0,
            'order_id' => $this->uuid(),
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CompletePaymentRequestDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    public function testToRequestData(): void
    {
        $dto = CompletePaymentRequestDTO::fromArray([
            'public_key' => $this->uuid(),
            'amount' => 100.0,
            'order_id' => $this->uuid(),
        ]);
        $authDTO = LiqPayAuthDTO::fromArray([
            'publicKey' => $this->uuid(),
            'privateKey' => $this->uuid(),
        ]);

        $data = $dto->toRequestData($authDTO);

        $this->assertEquals(
            LiqPaySignature::generate($authDTO, $dto),
            $data['signature'],
        );

        $this->assertEquals(
            base64_encode(json_encode($dto->toArray())),
            $data['data'],
        );
    }

    #[DataProvider('fromArrayDataProvider')]
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = CompletePaymentRequestDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'public_key' => 'public_key',
                    'amount' => 100.0,
                    'order_id' => 'order_id',
                ],
                'expectedData' => [
                    'public_key' => 'public_key',
                    'amount' => 100.0,
                    'order_id' => 'order_id',
                    'version' => LiqPayApiVersion::V3,
                    'action' => Action::HOLD_COMPLETION->value,
                ],
            ],
        ];
    }
}
