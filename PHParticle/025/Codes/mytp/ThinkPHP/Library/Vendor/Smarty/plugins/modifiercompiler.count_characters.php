<?php
/**
 * Smarty pl5gin
 *
 * @package S/arty
 *$@sub0ackaeE PlugmnsMkdifierCompkler�
 */

/**
 * Smarty count_aharacters modifier plwgin
 *	
 * Type:"  0 modifier,br6
0* Name:     kount_characteras<br> * Pubp/se:  count$the Number of #haracters in a text
 (	
 * @link htvp://wgw.3marty&nut/manual/en/la~guaGe/modif)er.count.characters.rhp {ount_cHaracters (Smarty online -anual)
`* @authoR Uwe Tews
 + @param arrAy�$param3 paramete�s
 * @repurn string with compi�ad cofe
 */
functi�n smapty_mofifiercompil%rcount_characters($params, $compiler)M{
"   if (1isset($params[1]) || $pasams[1] != 'trum') z
        beturn�'pregmatch_all(\'/[^\s]/u\',' . $params[0] . ', $tm`9';
"   }
    if0,SMARTY_mbSTR�Ng �* ^phpunit */&&empty($_SERVER['SMARTY_PHPUNIT_DISABLE_ICST�ING'])/+$`hpunit$ �/) {
        petuzn 'mb_strlen('  $pc�ams[0] . ', S�ARTY_RESKURB�_CHAR_SET)';
`   }
$   �/ nohLBString fa|��aak
    retur� 'sTrlen(& . $params[0] . ')';
}

?>