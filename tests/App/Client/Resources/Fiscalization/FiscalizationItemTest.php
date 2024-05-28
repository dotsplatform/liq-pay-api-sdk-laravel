<?php
/**
 * Description of FiscalizationItemTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Resources\Fiscalization;

use Dots\LiqPay\App\Client\Resources\Fiscalization\FiscalizationItem;
use Tests\TestCase;

class FiscalizationItemTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = FiscalizationItem::fromArray([
            'name' => 'test_item_1',
            'qty' => 1,
            'sum' => 10,
            'code' => 'code',
            'barcode' => 'barcode',
            'header' => 'header',
            'tax' => [],
            'uktzed' => 'uktzed',
        ]);

        $this->assertEquals(
            $dto->toArray(),
            FiscalizationItem::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(array $data, array $expectedData): void
    {
        $dto = FiscalizationItem::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                    'barcode' => 'barcode',
                    'header' => 'header',
                    'tax' => [],
                    'uktzed' => 'uktzed',
                ],
                'expectedData' => [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                    'barcode' => 'barcode',
                    'header' => 'header',
                    'tax' => [],
                    'uktzed' => 'uktzed',
                ],
            ],

            'Test expects params are null by default' => [
                'data' => [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                ],
                'expectedData' => [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                    'barcode' => null,
                    'header' => null,
                    'tax' => null,
                    'uktzed' => null,
                ],
            ],

            'Test expects params are null if null provider' => [
                'data' => [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                    'barcode' => null,
                    'header' => null,
                    'tax' => null,
                    'uktzed' => null,
                ],
                'expectedData' => [
                    'name' => 'test_item_1',
                    'qty' => 1,
                    'sum' => 10,
                    'code' => 'code',
                    'barcode' => null,
                    'header' => null,
                    'tax' => null,
                    'uktzed' => null,
                ],
            ],
        ];
    }
}
