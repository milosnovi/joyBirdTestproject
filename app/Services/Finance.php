<?php

namespace App\Services;

/**
 * Class Finance
 * @package App\Services
 */
class Finance
{
    /**
     * Floating-point range near zero to consider insignificant.
     */
    const EPSILON = 1e-6;

    /**
     * @param float $rate
     * @param int   $periods
     * @param float $present_value
     * @param float $future_value
     * @param bool  $beginning
     *
     * @return float
     */
    public static function pmt(float $rate, int $periods, float $present_value, float $future_value = 0, bool $beginning = false): float
    {
        $when = $beginning ? 1 : 0;
        if ($rate == 0) {
            return - ($future_value + $present_value) / $periods;
        }
        return - ($future_value + ($present_value * pow(1 + $rate, $periods)))
            /
            ((1 + $rate*$when) / $rate * (pow(1 + $rate, $periods) - 1));
    }

    /**
     * @param float $rate
     * @param int   $period
     * @param int   $periods
     * @param float $present_value
     * @param float $future_value
     * @param bool  $beginning
     *
     * @return float
     */
    public static function ppmt(float $rate, int $period, int $periods, float $present_value, float $future_value = 0, bool $beginning = false): float
    {
        $payment = self::pmt($rate, $periods, $present_value, $future_value, $beginning);
        $ipmt = self::ipmt($rate, $period, $periods, $present_value, $future_value, $beginning);
        return $payment - $ipmt;
    }

    /**
     * @param float $rate
     * @param int   $period
     * @param int   $periods
     * @param float $present_value
     * @param float $future_value
     * @param bool  $beginning
     *
     * @return float
     */
    public static function ipmt(float $rate, int $period, int $periods, float $present_value, float $future_value = 0, bool $beginning = false): float
    {
        if ($period < 1 || $period > $periods) {
            return \NAN;
        }
        if ($rate == 0) {
            return 0;
        }
        if ($beginning && $period == 1) {
            return 0.0;
        }
        $payment = self::pmt($rate, $periods, $present_value, $future_value, $beginning);
        if ($beginning) {
            $interest = (self::fv($rate, $period - 2, $payment, $present_value, $beginning) - $payment) * $rate;
        } else {
            $interest = self::fv($rate, $period - 1, $payment, $present_value, $beginning) * $rate;
        }
        return self::checkZero($interest);
    }

    /**
     * @param float $rate
     * @param int   $periods
     * @param float $payment
     * @param float $present_value
     * @param bool  $beginning
     *
     * @return float
     */
    public static function fv(float $rate, int $periods, float $payment, float $present_value, bool $beginning = false): float
    {
        $when = $beginning ? 1 : 0;
        if ($rate == 0) {
            $fv = -($present_value + ($payment * $periods));
            return self::checkZero($fv);
        }
        $initial  = 1 + ($rate * $when);
        $compound = pow(1 + $rate, $periods);
        $fv       = - (($present_value * $compound) + (($payment * $initial * ($compound - 1)) / $rate));
        return self::checkZero($fv);
    }

    /**
     * @param float $value
     * @param float $epsilon
     *
     * @return float
     */
    private static function checkZero(float $value, float $epsilon = self::EPSILON): float
    {
        return abs($value) < $epsilon ? 0.0 : $value;
    }
}
