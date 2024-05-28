<?php
/**
 * Description of CreateInvoiceDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Requests\Invoices\DTO;

use Dots\LiqPay\App\Client\Requests\Payments\DTO\CreatePaymentRequestDTO;
use Tests\TestCase;

class CreateInvoiceDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CreatePaymentRequestDTO::fromArray([
            'amount' => 100,
            'ccy' => 980,
            'merchantPaymInfo' => [
                'reference' => 'reference',
                'destination' => 'destination',
                'comment' => 'comment',
                'customerEmails' => [],
                'basketOrder' => [
                    [
                        'name' => 'test_item_1',
                        'qty' => 1,
                        'sum' => 10,
                        'code' => 'code',
                    ],
                ],
            ],
            'redirectUrl' => 'redirectUrl',
            'webHookUrl' => 'webHookUrl',
            'validity' => 100,
            'paymentType' => 'debit',
            'qrId' => 'qrId',
            'code' => 'code',
            'saveCardData' => [
                'saveCard' => true,
                'walletId' => 'walletId',
            ],
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CreatePaymentRequestDTO::fromArray($dto->toArray())->toArray(),
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
                    'amount' => 100,
                    'ccy' => 980,
                    'merchantPaymInfo' => [
                        'reference' => 'reference',
                        'destination' => 'destination',
                        'comment' => 'comment',
                        'customerEmails' => [],
                        'basketOrder' => [
                            [
                                'name' => 'test_item_1',
                                'qty' => 1,
                                'sum' => 10,
                                'code' => 'code',
                            ],
                        ],
                    ],
                    'redirectUrl' => 'redirectUrl',
                    'webHookUrl' => 'webHookUrl',
                    'validity' => 100,
                    'paymentType' => 'debit',
                    'qrId' => 'qrId',
                    'code' => 'code',
                    'saveCardData' => [
                        'saveCard' => true,
                        'walletId' => 'walletId',
                    ],
                ],
                'expectedData' => [
                    'amount' => 100,
                    'ccy' => 980,
                    'merchantPaymInfo' => [
                        'reference' => 'reference',
                        'destination' => 'destination',
                        'comment' => 'comment',
                        'customerEmails' => [],
                        'basketOrder' => [
                            [
                                'name' => 'test_item_1',
                                'qty' => 1,
                                'sum' => 10,
                                'code' => 'code',
                            ],
                        ],
                    ],
                    'redirectUrl' => 'redirectUrl',
                    'webHookUrl' => 'webHookUrl',
                    'validity' => 100,
                    'paymentType' => 'debit',
                    'qrId' => 'qrId',
                    'code' => 'code',
                    'saveCardData' => [
                        'saveCard' => true,
                        'walletId' => 'walletId',
                    ],
                ],
            ],

            'Test expects params are null by default' => [
                'data' => [
                    'amount' => 100,
                    'ccy' => 980,
                    'merchantPaymInfo' => [
                        'reference' => 'reference',
                        'destination' => 'destination',
                        'comment' => 'comment',
                        'customerEmails' => [],
                        'basketOrder' => [
                            [
                                'name' => 'test_item_1',
                                'qty' => 1,
                                'sum' => 10,
                                'code' => 'code',
                            ],
                        ],
                    ],
                    'redirectUrl' => 'redirectUrl',
                    'webHookUrl' => 'webHookUrl',
                    'paymentType' => 'debit',
                ],
                'expectedData' => [
                    'amount' => 100,
                    'ccy' => 980,
                    'merchantPaymInfo' => [
                        'reference' => 'reference',
                        'destination' => 'destination',
                        'comment' => 'comment',
                        'customerEmails' => [],
                        'basketOrder' => [
                            [
                                'name' => 'test_item_1',
                                'qty' => 1,
                                'sum' => 10,
                                'code' => 'code',
                            ],
                        ],
                    ],
                    'redirectUrl' => 'redirectUrl',
                    'webHookUrl' => 'webHookUrl',
                    'validity' => null,
                    'paymentType' => 'debit',
                    'qrId' => null,
                    'code' => null,
                    'saveCardData' => null,
                ],
            ],

            'Test expects params are null if null provider' => [
                'data' => [
                    'amount' => 100,
                    'ccy' => 980,
                    'merchantPaymInfo' => [
                        'reference' => 'reference',
                        'destination' => 'destination',
                        'comment' => 'comment',
                        'customerEmails' => [],
                        'basketOrder' => [
                            [
                                'name' => 'test_item_1',
                                'qty' => 1,
                                'sum' => 10,
                                'code' => 'code',
                            ],
                        ],
                    ],
                    'redirectUrl' => 'redirectUrl',
                    'webHookUrl' => 'webHookUrl',
                    'validity' => null,
                    'paymentType' => 'debit',
                    'qrId' => null,
                    'code' => null,
                    'saveCardData' => null,
                ],
                'expectedData' => [
                    'amount' => 100,
                    'ccy' => 980,
                    'merchantPaymInfo' => [
                        'reference' => 'reference',
                        'destination' => 'destination',
                        'comment' => 'comment',
                        'customerEmails' => [],
                        'basketOrder' => [
                            [
                                'name' => 'test_item_1',
                                'qty' => 1,
                                'sum' => 10,
                                'code' => 'code',
                            ],
                        ],
                    ],
                    'redirectUrl' => 'redirectUrl',
                    'webHookUrl' => 'webHookUrl',
                    'validity' => null,
                    'paymentType' => 'debit',
                    'qrId' => null,
                    'code' => null,
                    'saveCardData' => null,
                ],
            ],
        ];
    }
}
