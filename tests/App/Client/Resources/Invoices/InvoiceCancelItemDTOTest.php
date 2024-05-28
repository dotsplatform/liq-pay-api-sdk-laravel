<?php
/**
 * Description of InvoiceCancelItemDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Resources\Invoices;

use Dots\LiqPay\App\Client\Resources\Payments\InvoiceCancelItemDTO;
use Tests\TestCase;

class InvoiceCancelItemDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = InvoiceCancelItemDTO::fromArray([
            'status' => 'failure',
            'amount' => 1000,
            'ccy' => 980,
            'createdDate' => '2024-04-18T14:36:53+00:00',
            'modifiedDate' => '2024-04-18T14:38:10+00:00',
            'approvalCode' => 'approvalCode',
            'rrn' => 'rrn',
            'extRef' => 'extRef',
        ]);

        $this->assertEquals(
            $dto->toArray(),
            InvoiceCancelItemDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(array $data, array $expectedData): void
    {
        $dto = InvoiceCancelItemDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'status' => 'failure',
                    'amount' => 1000,
                    'ccy' => 980,
                    'createdDate' => '2024-04-18T14:36:53+00:00',
                    'modifiedDate' => '2024-04-18T14:38:10+00:00',
                    'approvalCode' => 'approvalCode',
                    'rrn' => 'rrn',
                    'extRef' => 'extRef',
                ],
                'expectedData' => [
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
        ];
    }
}
