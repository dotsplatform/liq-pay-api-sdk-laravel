<?php
/**
 * Description of InvoicePaymentInfoTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Resources\Invoices;

use Dots\LiqPay\App\Client\Resources\Payments\InvoicePaymentInfo;
use Tests\TestCase;

class InvoicePaymentInfoTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = InvoicePaymentInfo::fromArray([
            'maskedPan' => 'maskedPan',
            'approvalCode' => 'approvalCode',
            'rrn' => 'rrn',
            'tranId' => 'tranId',
            'terminal' => 'terminal',
            'bank' => 'bank',
            'paymentSystem' => 'paymentSystem',
            'paymentMethod' => 'paymentMethod',
            'fee' => 1000,
            'country' => 'country',
        ]);

        $this->assertEquals(
            $dto->toArray(),
            InvoicePaymentInfo::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(array $data, array $expectedData): void
    {
        $dto = InvoicePaymentInfo::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'maskedPan' => 'maskedPan',
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'tranId' => 'tranId',
                    'terminal' => 'terminal',
                    'bank' => 'bank',
                    'paymentSystem' => 'paymentSystem',
                    'paymentMethod' => 'paymentMethod',
                    'fee' => 1000,
                    'country' => 'country',
                ],
                'expectedData' => [
                    'maskedPan' => 'maskedPan',
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'tranId' => 'tranId',
                    'terminal' => 'terminal',
                    'bank' => 'bank',
                    'paymentSystem' => 'paymentSystem',
                    'paymentMethod' => 'paymentMethod',
                    'fee' => 1000,
                    'country' => 'country',
                ],
            ],

            'Test expects params are null by default' => [
                'data' => [
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'tranId' => 'tranId',
                    'terminal' => 'terminal',
                    'bank' => 'bank',
                    'paymentSystem' => 'paymentSystem',
                    'paymentMethod' => 'paymentMethod',
                    'fee' => 1000,
                    'country' => 'country',
                ],
                'expectedData' => [
                    'maskedPan' => null,
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'tranId' => 'tranId',
                    'terminal' => 'terminal',
                    'bank' => 'bank',
                    'paymentSystem' => 'paymentSystem',
                    'paymentMethod' => 'paymentMethod',
                    'fee' => 1000,
                    'country' => 'country',
                ],
            ],

            'Test expects params are null if null provider' => [
                'data' => [
                    'maskedPan' => null,
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'tranId' => 'tranId',
                    'terminal' => 'terminal',
                    'bank' => 'bank',
                    'paymentSystem' => 'paymentSystem',
                    'paymentMethod' => 'paymentMethod',
                    'fee' => 1000,
                    'country' => 'country',
                ],
                'expectedData' => [
                    'maskedPan' => null,
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'tranId' => 'tranId',
                    'terminal' => 'terminal',
                    'bank' => 'bank',
                    'paymentSystem' => 'paymentSystem',
                    'paymentMethod' => 'paymentMethod',
                    'fee' => 1000,
                    'country' => 'country',
                ],
            ],
        ];
    }
}
