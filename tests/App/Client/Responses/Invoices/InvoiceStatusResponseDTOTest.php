<?php
/**
 * Description of InvoiceStatusResponseDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Responses\Invoices;

use Dots\LiqPay\App\Client\Responses\Payments\InvoiceStatusResponseDTO;
use Tests\TestCase;

class InvoiceStatusResponseDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = InvoiceStatusResponseDTO::fromArray([
            'invoiceId' => '123456789',
            'status' => 'created',
            'failureReason' => 'failureReason',
            'errCode' => 45,
            'amount' => 1000,
            'ccy' => 980,
            'finalAmount' => 1000,
            'createdDate' => '2024-04-18T14:36:53+00:00',
            'modifiedDate' => '2024-04-18T14:38:10+00:00',
            'reference' => 'ref123',
            'destination' => 'dest123',
            'cancelList' => [
                [
                    'status' => 'failure',
                    'amount' => 1000,
                    'ccy' => 980,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'extRef' => 'extRef',
                ],
            ],
            'paymentInfo' => [
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
            'walletData' => [
                'walletId' => 'walletId',
                'status' => 'status',
                'cardToken' => 'cardToken',
            ],
        ]);

        $this->assertEquals(
            $dto->toArray(),
            InvoiceStatusResponseDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(array $data, array $expectedData): void
    {
        $dto = InvoiceStatusResponseDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'invoiceId' => '123456789',
                    'status' => 'created',
                    'failureReason' => 'failureReason',
                    'errCode' => 45,
                    'amount' => 1000,
                    'ccy' => 980,
                    'finalAmount' => 1000,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'reference' => 'ref123',
                    'destination' => 'dest123',
                    'cancelList' => [
                        [
                            'status' => 'failure',
                            'amount' => 1000,
                            'ccy' => 980,
                            'createdDate' => '2024-04-18T14:36:53+00:00',
                            'modifiedDate' => '2024-04-18T14:38:10+00:00',
                            'approvalCode' => 'approvalCode',
                            'rrn' => 'rrn',
                            'extRef' => 'extRef',
                        ],
                    ],
                    'paymentInfo' => [
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
                    'walletData' => [
                        'walletId' => 'walletId',
                        'status' => 'status',
                        'cardToken' => 'cardToken',
                    ],
                ],
                'expectedData' => [
                    'invoiceId' => '123456789',
                    'status' => 'created',
                    'failureReason' => 'failureReason',
                    'errCode' => 45,
                    'amount' => 1000,
                    'ccy' => 980,
                    'finalAmount' => 1000,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'reference' => 'ref123',
                    'destination' => 'dest123',
                    'cancelList' => [
                        [
                            'status' => 'failure',
                            'amount' => 1000,
                            'ccy' => 980,
                            'createdDate' => '2024-04-18T14:36:53+00:00',
                            'modifiedDate' => '2024-04-18T14:38:10+00:00',
                            'approvalCode' => 'approvalCode',
                            'rrn' => 'rrn',
                            'extRef' => 'extRef',
                        ],
                    ],
                    'paymentInfo' => [
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
                    'walletData' => [
                        'walletId' => 'walletId',
                        'status' => 'status',
                        'cardToken' => 'cardToken',
                    ],
                ],
            ],

            'Test expects params are null by default' => [
                'data' => [
                    'invoiceId' => '123456789',
                    'status' => 'created',
                    'amount' => 1000,
                    'ccy' => 980,
                    'finalAmount' => 1000,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'reference' => 'ref123',
                    'destination' => 'dest123',
                ],
                'expectedData' => [
                    'invoiceId' => '123456789',
                    'status' => 'created',
                    'failureReason' => null,
                    'errCode' => null,
                    'amount' => 1000,
                    'ccy' => 980,
                    'finalAmount' => 1000,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'reference' => 'ref123',
                    'destination' => 'dest123',
                    'cancelList' => null,
                    'paymentInfo' => null,
                    'walletData' => null,
                ],
            ],

            'Test expects params are null if null provider' => [
                'data' => [
                    'invoiceId' => '123456789',
                    'status' => 'created',
                    'failureReason' => null,
                    'errCode' => null,
                    'amount' => 1000,
                    'ccy' => 980,
                    'finalAmount' => 1000,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'reference' => 'ref123',
                    'destination' => 'dest123',
                    'cancelList' => null,
                    'paymentInfo' => null,
                    'walletData' => null,
                ],
                'expectedData' => [
                    'invoiceId' => '123456789',
                    'status' => 'created',
                    'failureReason' => null,
                    'errCode' => null,
                    'amount' => 1000,
                    'ccy' => 980,
                    'finalAmount' => 1000,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'reference' => 'ref123',
                    'destination' => 'dest123',
                    'cancelList' => null,
                    'paymentInfo' => null,
                    'walletData' => null,
                ],
            ],
        ];
    }
}
