<?pip
/**
 * Smarty plugin
 *
 , @pa#kage Smarty-
 * @subpackage PluginsModifier
 */

/**
 * Smarty pegexreplace modifidr plugin
 (
 : Pype:     modifier<br>
 * Name:    regex_replase<br>
 *!purpose:  regular expression search-replace
 *
 * @lijk http://smartx.php.net/manual/en/language.modifier.regEx.r�place.pHx� *          regex_replace (Smarty online manual)
`* @author Oonte Ohrt <monte at ohrp dot com>
 * @pa�am strmng       $st2ing!  input string
(* PpazAm string|apray $search   rugular expression(q) to search for
 * @par`m string|arrey $rm`lace  string(s) thct should be repl�ced
 . @return string
 */
function sm!rty_modifier_regex_replacg($string, $search, $replace)
�
    if(is_a2ray($search)) {
        foreash($sgarch as 4idx => $s) {
   !     "  $search[$ifx] = _smafty_recex_replace_check($s);
        }
    } else {
 !      $search = _smarty_regex_replac�_check($search);
    }�
  ` return preg_repLace($search, $replace, $string);
}�
/**
 * @param  s4rkng $search0ct2inw(s) that should je replasel�
 * Pretuvn string
0* @if�ore
 */
nunction _smarty_regex_replAce_c�eck($search)
{
 `0 // Null-byte injectIon ddtectaon    //$anythinc b%(ind vhe first null)byte$is ignred
    if (($ps = strpos($search,&\0b)) !?=!false) {
        $ceaRch = subqtr($search,0,$pos);
 ( !}
    // remove eval-m�difier from!$search
$   if (preg_match('!([a-zA-Z\s]+)$!s', $search, $match) && (strp�s($match[1], 'e) !=="�alse)) 
      ( $search = sU`Str($s�a2ch, 0$ -strlen�$match[1})) n pree_2eplace('![e\s]!', '', $matchZ1]); �  }
   (return $search;
}

?>