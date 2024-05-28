<?php
/**
 * Description of CreatePaymentRequestDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Requests\Payments\DTO;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use Dots\LiqPay\App\Client\Auth\LiqPaySignature;
use Dots\LiqPay\App\Client\Requests\Payments\DTO\CreatePaymentRequestDTO;
use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\Currency;
use Dots\LiqPay\App\Client\Resources\Consts\LiqPayApiVersion;
use Tests\TestCase;

class CreatePaymentRequestDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CreatePaymentRequestDTO::fromArray([
            'public_key' => $this->uuid(),
            'amount' => 100.0,
            'currency' => Currency::UAH,
            'description' => $this->uuid(),
            'order_id' => $this->uuid(),
            'server_url' => $this->uuid(),
            'result_url' => $this->uuid(),
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CreatePaymentRequestDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    public function testToRequestData(): void
    {
        $dto = CreatePaymentRequestDTO::fromArray([
            'public_key' => $this->uuid(),
            'amount' => 100.0,
            'currency' => Currency::UAH,
            'description' => $this->uuid(),
            'order_id' => $this->uuid(),
            'server_url' => $this->uuid(),
            'result_url' => $this->uuid(),
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

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = CreatePaymentRequestDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'public_key' => 'public_key',
                    'amount' => 100.0,
                    'currency' => Currency::UAH,
                    'description' => 'description',
                    'order_id' => 'order_id',
                    'server_url' => 'server_url',
                    'result_url' => 'result_url',
                ],
                'expectedData' => [
                    'public_key' => 'public_key',
                    'amount' => 100.0,
                    'currency' => Currency::UAH->value,
                    'description' => 'description',
                    'order_id' => 'order_id',
                    'server_url' => 'server_url',
                    'result_url' => 'result_url',
                    'version' => LiqPayApiVersion::V3,
                    'action' => Action::HOLD->value,
                ],
            ],
            'Test expects null by default' => [
                'data' => [
                    'public_key' => 'public_key',
                    'amount' => 100.0,
                    'currency' => Currency::UAH,
                    'description' => 'description',
                    'order_id' => 'order_id',
                ],
                'expectedData' => [
                    'server_url' => null,
                    'result_url' => null,
                ],
            ],
        ];
    }
}
