<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Polyfill\Php55;

/**
 * @internal
 */
final class Php55
{
    public static function boolval($val)
    {
        return (bool) $val;
    }

    public static function json_last_error_msg()
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE: return 'No error';
            case JSON_ERROR_DEPTH: return 'Maximum stack depth exceeded';
            case JSON_ERROR_STATE_MISMATCH: return 'State mismatch (invalid or malformed JSON)';
            case JSON_ERROR_CTRL_CHAR: return 'Control character error, possibly incorrectly encoded';
            case JSON_ERROR_SYNTAX: return 'Syntax error';
            case JSON_ERROR_UTF8: return 'Malformed UTF-8 characters, possibly incorrectly encoded';
            default: return 'Unknown error';
        }
    }

    /**
     * @author Sebastiaan Stok <s.stok@rollerscapes.net>
     * @author Scott <scott@paragonie.com>
     */
    public static function hash_pbkdf2($algorithm, $password, $salt, $iterations, $length = 0, $rawOutput = false)
    {
        // Pre-hash for optimization if password length > hash length
        $hashLength = \strlen(hash($algorithm, '', true));
        switch ($algorithm) {
            case 'sha1':
            case 'sha224':
            case 'sha256':
                $blockSize = 64;
                break;
            case 'sha384':
            case 'sha512':
                $blockSize = 128;
                break;
            default:
                $blockSize = $hashLength;
                break;
        }
        if ($length < 1) {
            $length = $hashLength;
            if (!$rawOutput) {
                $length <<= 1;
            }
        }

        // Number of blocks needed to create the derived key
        $blocks = ceil($length / $hashLength);
        $digest = '';
        if (\strlen($password) > $blockSize) {
            $password = hash($algorithm, $password, true);
        }

        for ($i = 1; $i <= $blocks; ++$i) {
            $ib = $block = hash_hmac($algorithm, $salt.pack('N', $i), $password, true);

            // Iterations
            for ($j = 1; $j < $iterations; ++$j) {
                $ib ^= ($block = hash_hmac($algorithm, $block, $password, true));
            }

            $digest .= $ib;
        }

        if (!$rawOutput) {
            $digest = bin2hex($digest);
        }

        return substr($digest, 0, $length);
    }
}
