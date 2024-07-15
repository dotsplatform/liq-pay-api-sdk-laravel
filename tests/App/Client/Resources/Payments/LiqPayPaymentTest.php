<?php
/**
 * Description of LiqPayPaymentTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Tests\App\Client\Resources\Payments;

use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\PaymentStatus;
use Dots\LiqPay\App\Client\Resources\Payments\LiqPayPayment;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Generators\LiqPayPaymentGenerator;
use Tests\TestCase;

class LiqPayPaymentTest extends TestCase
{
    public function testFromArrayToArray(): void
    {
        $dto = LiqPayPaymentGenerator::generate();

        $this->assertEquals(
            $dto->toArray(),
            LiqPayPayment::fromArray($dto->toArray())->toArray(),
        );
    }

    #[DataProvider('fromArrayDataProvider')]
    public function testFromArray(
        array $data,
        array $expectedData,
    ): void {
        $dto = LiqPayPayment::fromArray($data);
        $this->assertArraysEqual($expectedData, $dto->toArray());
    }

    public static function fromArrayDataProvider(): array
    {
        return [
            'Test with full data' => [
                'data' => [
                    'action' => Action::HOLD,
                    'status' => PaymentStatus::REVERSED,
                    'payment_id' => 165629,
                    'version' => 3,
                    'type' => 'buy',
                    'paytype' => 'card',
                    'public_key' => 'i000000000',
                    'acq_id' => 414963,
                    'order_id' => '98R1U1OV1485849059893399',
                    'liqpay_order_id' => 'NYMK3AE61501685438251925',
                    'description' => 'test',
                    'sender_phone' => '380950000001',
                    'sender_card_mask2' => '473118*97',
                    'sender_card_bank' => 'pb',
                    'sender_card_type' => 'visa',
                    'sender_card_country' => 804,
                    'card_token' => '2DFBFE626B7341611450DE81E971E948D6F260',
                    'amount' => 0.02,
                    'currency' => 'UAH',
                    'sender_commission' => 0,
                    'receiver_commission' => 0,
                    'agent_commission' => 0,
                    'amount_debit' => 0.02,
                    'amount_credit' => 0.02,
                    'commission_debit' => 0,
                    'commission_credit' => 0,
                    'currency_debit' => 'UAH',
                    'currency_credit' => 'UAH',
                    'sender_bonus' => 0,
                    'amount_bonus' => 0,
                    'authcode_debit' => '108527',
                    'authcode_credit' => '703006',
                    'rrn_debit' => '000664267598',
                    'rrn_credit' => '000664267607',
                    'mpi_eci' => '7',
                    'is_3ds' => false,
                    'create_date' => 1501757716373,
                    'end_date' => 1501757729972,
                    'transaction_id' => 165629,
                ],
                'expectedData' => [
                    'action' => Action::HOLD->value,
                    'status' => PaymentStatus::REVERSED->value,
                    'payment_id' => 165629,
                    'version' => 3,
                    'type' => 'buy',
                    'paytype' => 'card',
                    'public_key' => 'i000000000',
                    'acq_id' => 414963,
                    'order_id' => '98R1U1OV1485849059893399',
                    'liqpay_order_id' => 'NYMK3AE61501685438251925',
                    'description' => 'test',
                    'sender_phone' => '380950000001',
                    'sender_card_mask2' => '473118*97',
                    'sender_card_bank' => 'pb',
                    'sender_card_type' => 'visa',
                    'sender_card_country' => 804,
                    'card_token' => '2DFBFE626B7341611450DE81E971E948D6F260',
                    'amount' => 0.02,
                    'currency' => 'UAH',
                    'sender_commission' => 0,
                    'receiver_commission' => 0,
                    'agent_commission' => 0,
                    'amount_debit' => 0.02,
                    'amount_credit' => 0.02,
                    'commission_debit' => 0,
                    'commission_credit' => 0,
                    'currency_debit' => 'UAH',
                    'currency_credit' => 'UAH',
                    'sender_bonus' => 0,
                    'amount_bonus' => 0,
                    'authcode_debit' => '108527',
                    'authcode_credit' => '703006',
                    'rrn_debit' => '000664267598',
                    'rrn_credit' => '000664267607',
                    'mpi_eci' => '7',
                    'is_3ds' => false,
                    'create_date' => 1501757716373,
                    'end_date' => 1501757729972,
                    'transaction_id' => 165629,
                ],
            ],
        ];
    }

    #[DataProvider('methodsProvider')]
    public function testMethods(
        string $method,
        array $methodData,
        array $data,
        mixed $expectedResult,
    ): void {
        $dto = LiqPayPayment::fromArray($data);
        $result = $dto->$method(...$methodData);
        if (is_array($expectedResult)) {
            $this->assertArraysEqual($expectedResult, $result);

            return;
        }
        $this->assertEquals($expectedResult, $result);
    }

    public static function methodsProvider(): array
    {
        return [
            'Test isOnHold expects true' => [
                'method' => 'isOnHold',
                'methodData' => [],
                'data' => LiqPayPaymentGenerator::generate([
                    'action' => Action::HOLD,
                    'status' => PaymentStatus::HOLD_WAIT,
                ])->toArray(),
                'expectedResult' => true,
            ],

            'Test isCaptured expects true' => [
                'method' => 'isCaptured',
                'methodData' => [],
                'data' => LiqPayPaymentGenerator::generate([
                    'action' => Action::HOLD,
                    'status' => PaymentStatus::SUCCESS,
                ])->toArray(),
                'expectedResult' => true,
            ],

            'Test isReversed expects true' => [
                'method' => 'isReversed',
                'methodData' => [],
                'data' => LiqPayPaymentGenerator::generate([
                    'action' => Action::HOLD,
                    'status' => PaymentStatus::REVERSED,
                ])->toArray(),
                'expectedResult' => true,
            ],
        ];
    }
}
