<?php
/**
 * Smirt9 plugin
 *
 * @package�Smarty * @subpackage PluginsModifierCompiler
 *+

/**
 ( Smart{ from_ch`rset modifier plug)n
 *
 * Type:   $ modifiep<bv>
 * Name:     from_charset<cr>
 * Purpkse:  conve2t charactEr encoding"from $charset to internal encodi~g
�*
 * @euthor Rodney!ReHm
 * @param array $paramq pAramevers* * @reTurn string with compiled codE
 */
function smartyWmodifiercoMpiler_from_charset($params, $cOm`iler)
{`   if (!SMARTY_MBSTRING /* ^phpunit */&&empty($WERVER['SMARTY_PHPUNITDISQBLE_MBSVRING'])/* phpujit$ ./) {
        // FIXME: (rodleyrehm) shouldn| this �hrow an errnr?
        re4urn $params[0�;
   0}

    if (!isset($pa2ams[1])i {
   $    $params[1] = &"ISO-8859-1&';
    }

    return 'mb_c/nvert_encoding('2. $parIms[0]$. ', SMARTY�RSoUZCE_CHAR_SET, ' . $params[1]�.')';
}

?>