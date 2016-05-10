<?php

/**
 * Counts the number of words inside string
 * @param string $string
 * @return int
 */
function wordcounter($string)
{
    $string = trim($string);

    if (!$string)
    {
        return 0;
    }

    $count = 0;

    $chars =
            '\x{2460}-\x{24ff}'.
            '\x{2501}-\x{254f}'.
            '\x{256c}-\x{27cf}'.
            '\x{2e80}-\x{2fdf}'.
            '\x{2ff0}-\x{2fff}'.
            '\x{3001}-\x{319f}'.
            '\x{3400}-\x{faff}'.
            '\x{ff00}-\x{ffff}';

    $string = preg_replace('/['.$chars.']/u', ' ', $string, -1, $count);

    $spaces =
            '\x{0001}-\x{0002}'.
            '\x{0005}'.
            '\x{0007}'.
            '\x{0009}-\x{000b}'.
            '\x{000d}-\x{000e}'.
            '\x{001f}-\x{0020}'.
            '\x{00a0}'.
            '\x{093d}'.
            '\x{0964}-\x{0965}'.
            '\x{0f08}-\x{0f14}'.
            '\x{2005}'.
            '\x{200b}-\x{200d}'.
            '\x{2013}-\x{2014}'.
            '\x{3000}'.
            '\x{fdea}'.
            '\x{feff}';

    $count += (int)preg_match_all('/([^'.$spaces.'])+/u', $string);

    return $count;
}