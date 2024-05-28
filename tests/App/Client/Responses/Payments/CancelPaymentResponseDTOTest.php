<?php
/**
 * Description of CancelPaymentResponseDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Responses\Payments;

use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\PaymentStatus;
use Dots\LiqPay\App\Client\Responses\Payments\CancelPaymentResponseDTO;
use Tests\TestCase;

class CancelPaymentResponseDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CancelPaymentResponseDTO::fromArray([
            'action' => Action::REFUND,
            'payment_id' => $this->uuid(),
            'status' => PaymentStatus::REVERSED,
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CancelPaymentResponseDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = CancelPaymentResponseDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'action' => Action::REFUND,
                    'payment_id' => 'payment_id',
                    'status' => PaymentStatus::REVERSED,
                ],
                'expectedData' => [
                    'action' => Action::REFUND->value,
                    'payment_id' => 'payment_id',
                    'status' => PaymentStatus::REVERSED->value,
                ],
            ],
        ];
    }
}
