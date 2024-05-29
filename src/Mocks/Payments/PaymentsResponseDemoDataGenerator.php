<?php
/**
 * Description of PaymentsResponseDataGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\Mocks\Payments;

use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\PaymentStatus;
use Dots\LiqPay\App\Client\Resources\Payments\LiqPayPayment;
use Dots\LiqPay\App\Client\Responses\Payments\CancelPaymentResponseDTO;
use Dots\LiqPay\App\Client\Responses\Payments\CreatePaymentResponseDTO;

class PaymentsResponseDemoDataGenerator
{
    public static function generateSuccessCreatePayment(array $data = []): CreatePaymentResponseDTO
    {
        return CreatePaymentResponseDTO::fromArray(array_merge([
            'url' => 'https://example.com',
        ], $data));
    }

    public static function generateErrorResponsePayment(array $data = []): array
    {
        return array_merge([
            'code' => 'err_missing',
            'err_code' => 'err_missing',
            'err_description' => 'Запит відхилено, вкажіть обовʼязкові параметри',
            'key' => 'data',
            'result' => 'error',
            'status' => 'error',
        ], $data);
    }

    public static function generateSuccessPaymentStatus(array $data = []): LiqPayPayment
    {
        return self::generatePayment($data);
    }

    public static function generateSuccessCancelPayment(array $data = []): CancelPaymentResponseDTO
    {
        return CancelPaymentResponseDTO::fromArray(array_merge([
            'action' => Action::HOLD,
            'status' => PaymentStatus::REVERSED,
            'payment_id' => '165629',
        ], $data));
    }

    public static function generateSuccessCompletePayment(array $data = []): LiqPayPayment
    {
        return self::generatePayment([
            'action' => Action::HOLD,
            'status' => PaymentStatus::SUCCESS,
        ]);
    }

    public static function generatePayment(array $data = []): LiqPayPayment
    {
        return LiqPayPayment::fromArray(array_merge([
            'action' => 'pay',
            'payment_id' => 165629,
            'status' => 'success',
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
            'ip' => '8.8.8.8',
            'card_token' => '2DFBFE626B7341611450DE81E971E948D6F260',
            'info' => 'My information',
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
            'bonus_type' => 'bonusplus',
            'bonus_procent' => 7,
            'authcode_debit' => '108527',
            'authcode_credit' => '703006',
            'rrn_debit' => '000664267598',
            'rrn_credit' => '000664267607',
            'mpi_eci' => '7',
            'is_3ds' => false,
            'create_date' => 1501757716373,
            'end_date' => 1501757729972,
            'moment_part' => true,
            'transaction_id' => 165629,
        ], $data));
    }
}
