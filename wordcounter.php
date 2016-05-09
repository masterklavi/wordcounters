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
            '\s'.
            '\x{2013}-\x{2014}'.
            '\x{2005}'.
            '\x{200b}-\x{200d}'.
            '\x{3000}';

    $chars =
            '\x{205f}'.
            '\x{2000}-\x{2004}'.
            '\x{2006}-\x{200a}'.
            '\x{2028}-\x{202f}';

    $count += (int)preg_match_all('/([^'.$spaces.']|['.$chars.'])+/u', $string);

    return $count;
}
