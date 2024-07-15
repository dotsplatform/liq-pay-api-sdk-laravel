<?php
/**
 * Description of LiqPayAuthDTOTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Auth\DTO;

use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class LiqPayAuthDTOTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = LiqPayAuthDTO::fromArray([
            'publicKey' => $this->uuid(),
            'privateKey' => $this->uuid(),
        ]);

        $this->assertEquals(
            $dto->toArray(),
            LiqPayAuthDTO::fromArray($dto->toArray())->toArray(),
        );
    }

    #[DataProvider('fromArrayDataProvider')]
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = LiqPayAuthDTO::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'publicKey' => 'publicKey',
                    'privateKey' => 'privateKey',
                ],
                'expectedData' => [
                    'publicKey' => 'publicKey',
                    'privateKey' => 'privateKey',
                ],
            ],
        ];
    }
}
