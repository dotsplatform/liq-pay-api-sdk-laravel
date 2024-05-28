<?php
/**
 * Description of CreatePaymentResponseDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Responses\Payments;

use Dots\LiqPay\App\Client\Responses\Payments\CreatePaymentResponseDTO;
use Tests\TestCase;

class CreatePaymentResponseDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = CreatePaymentResponseDTO::fromArray([
            'url' => $this->uuid(),
        ]);

        $this->assertEquals(
            $dto->toArray(),
            CreatePaymentResponseDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    /**
     * @dataProvider fromArrayDataProvider
     */
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = CreatePaymentResponseDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'url' => 'url',
                ],
                'expectedData' => [
                    'url' => 'url',
                ],
            ],
        ];
    }
}
