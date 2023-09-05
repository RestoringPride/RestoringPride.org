<?php

if (!defined('SODIUM_CRYPTO_CORE_RISTRETTO255_BYTES')) {
    define(
        'SODIUM_CRYPTO_CORE_RISTRETTO255_BYTES',
        ParagonIE_Sodium_Compat::CRYPTO_CORE_RISTRETTO255_BYTES
    );
    define('SODIUM_COMPAT_POLYFILLED_RISTRETTO255', true);
}
if (!defined('SODIUM_CRYPTO_CORE_RISTRETTO255_HASHBYTES')) {
    define(
        'SODIUM_CRYPTO_CORE_RISTRETTO255_HASHBYTES',
        ParagonIE_Sodium_Compat::CRYPTO_CORE_RISTRETTO255_HASHBYTES
    );
}
if (!defined('SODIUM_CRYPTO_CORE_RISTRETTO255_SCALARBYTES')) {
    define(
        'SODIUM_CRYPTO_CORE_RISTRETTO255_SCALARBYTES',
        ParagonIE_Sodium_Compat::CRYPTO_CORE_RISTRETTO255_SCALARBYTES
    );
}
if (!defined('SODIUM_CRYPTO_CORE_RISTRETTO255_NONREDUCEDSCALARBYTES')) {
    define(
        'SODIUM_CRYPTO_CORE_RISTRETTO255_NONREDUCEDSCALARBYTES',
        ParagonIE_Sodium_Compat::CRYPTO_CORE_RISTRETTO255_NONREDUCEDSCALARBYTES
    );
}
if (!defined('SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_SCALARBYTES')) {
    define(
        'SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_SCALARBYTES',
        ParagonIE_Sodium_Compat::CRYPTO_SCALARMULT_RISTRETTO255_SCALARBYTES
    );
}
if (!defined('SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_BYTES')) {
    define(
        'SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_BYTES',
        ParagonIE_Sodium_Compat::CRYPTO_SCALARMULT_RISTRETTO255_BYTES
    );
}

if (!is_callable('sodium_crypto_core_ristretto255_add')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_add()
     *
     * @param string $p
     * @param string $q
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_add($p, $q)
    {
        return ParagonIE_Sodium_Compat::ristretto255_add($p, $q, true);
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_from_hash')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_from_hash()
     *
<<<<<<< HEAD
     * @param string $s
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_from_hash($s)
    {
        return ParagonIE_Sodium_Compat::ristretto255_from_hash($s, true);
=======
     * @param string $r
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_from_hash($r)
    {
        return ParagonIE_Sodium_Compat::ristretto255_from_hash($r, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_is_valid_point')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_is_valid_point()
     *
<<<<<<< HEAD
     * @param string $s
     * @return bool
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_is_valid_point($s)
    {
        return ParagonIE_Sodium_Compat::ristretto255_is_valid_point($s, true);
=======
     * @param string $p
     * @return bool
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_is_valid_point($p)
    {
        return ParagonIE_Sodium_Compat::ristretto255_is_valid_point($p, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_random')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_random()
     *
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_random()
    {
        return ParagonIE_Sodium_Compat::ristretto255_random(true);
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_add')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_add()
     *
<<<<<<< HEAD
     * @param string $x
     * @param string $y
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_add($x, $y)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_add($x, $y, true);
=======
     * @param string $p
     * @param string $q
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_add($p, $q)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_add($p, $q, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_complement')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_complement()
     *
<<<<<<< HEAD
     * @param string $s
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_complement($s)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_complement($s, true);
=======
     * @param string $p
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_complement($p)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_complement($p, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_invert')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_invert()
     *
     * @param string $p
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_invert($p)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_invert($p, true);
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_mul')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_mul()
     *
<<<<<<< HEAD
     * @param string $x
     * @param string $y
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_mul($x, $y)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_mul($x, $y, true);
=======
     * @param string $p
     * @param string $q
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_mul($p, $q)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_mul($p, $q, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_negate')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_negate()
     *
<<<<<<< HEAD
     * @param string $s
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_negate($s)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_negate($s, true);
=======
     * @param string $p
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_negate($p)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_negate($p, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_random')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_random()
     *
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_random()
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_random(true);
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_reduce')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_reduce()
     *
<<<<<<< HEAD
     * @param string $s
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_reduce($s)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_reduce($s, true);
=======
     * @param string $p
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_reduce($p)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_reduce($p, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_scalar_sub')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_scalar_sub()
     *
<<<<<<< HEAD
     * @param string $x
     * @param string $y
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_sub($x, $y)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_sub($x, $y, true);
=======
     * @param string $p
     * @param string $q
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_scalar_sub($p, $q)
    {
        return ParagonIE_Sodium_Compat::ristretto255_scalar_sub($p, $q, true);
>>>>>>> fb785cbb (Initial commit)
    }
}
if (!is_callable('sodium_crypto_core_ristretto255_sub')) {
    /**
     * @see ParagonIE_Sodium_Compat::ristretto255_sub()
     *
     * @param string $p
     * @param string $q
     * @return string
     * @throws SodiumException
     */
    function sodium_crypto_core_ristretto255_sub($p, $q)
    {
        return ParagonIE_Sodium_Compat::ristretto255_sub($p, $q, true);
    }
}
if (!is_callable('sodium_crypto_scalarmult_ristretto255')) {
    /**
     * @see ParagonIE_Sodium_Compat::crypto_scalarmult_ristretto255()
     * @param string $n
     * @param string $p
     * @return string
     * @throws SodiumException
     * @throws TypeError
     */
    function sodium_crypto_scalarmult_ristretto255($n, $p)
    {
        return ParagonIE_Sodium_Compat::scalarmult_ristretto255($n, $p, true);
    }
}
if (!is_callable('sodium_crypto_scalarmult_ristretto255_base')) {
    /**
     * @see ParagonIE_Sodium_Compat::crypto_scalarmult_ristretto255_base()
     * @param string $n
     * @return string
     * @throws SodiumException
     * @throws TypeError
     */
    function sodium_crypto_scalarmult_ristretto255_base($n)
    {
        return ParagonIE_Sodium_Compat::scalarmult_ristretto255_base($n, true);
    }
}