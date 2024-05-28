<?php
/**
 * Description of PaymentStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Resources\Consts;

enum PaymentStatus: string
{
    // Last status of payment
    case ERROR = 'error';
    case FAILURE = 'failure';
    case REVERSED = 'reversed';
    case SUBSCRIBED = 'subscribed';
    case SUCCESS = 'success';
    case UNSUBSCRIBED = 'unsubscribed';

    // Waiting for verification
    case VERIFY_3DS = '3ds_verify';
    case VERIFY_CAPTCHA = 'captcha_verify';
    case VERIFY_CVV = 'cvv_verify';
    case VERIFY_IVR = 'ivr_verify';
    case VERIFY_OTP = 'otp_verify';
    case VERIFY_PASSWORD = 'password_verify';
    case VERIFY_PHONE = 'phone_verify';
    case VERIFY_PIN = 'pin_verify';
    case VERIFY_RECEIVER = 'receiver_verify';
    case VERIFY_SENDER = 'sender_verify';
    case VERIFY_SENDERAPP = 'senderapp_verify';
    case WAIT_QR = 'wait_qr';
    case WAIT_SENDER = 'wait_sender';

    // Another statuses
    case CASH_WAIT = 'cash_wait';
    case HOLD_WAIT = 'hold_wait';
    case INVOICE_WAIT = 'invoice_wait';
    case PREPARED = 'prepared';
    case PROCESSING = 'processing';
    case WAIT_ACCEPT = 'wait_accept';
    case WAIT_CARD = 'wait_card';
    case WAIT_COMPENSATION = 'wait_compensation';
    case WAIT_LC = 'wait_lc';
    case WAIT_RESERVE = 'wait_reserve';
    case WAIT_SECURE = 'wait_secure';
}
