<?php
if(!defined('__KIMS__')) exit;

if (!$my['uid']) exit;
if ($fuid) $members = array($fuid);
foreach($members as $val)
{
	$R = getUidData($table['s_friend'],$val);
	getDbDelete($table['s_friend'],'uid='.$R['uid'].' and my_mbruid='.$my['uid']);
	if ($R['rel'])
	{
		getDbUpdate($table['s_friend'],'rel=0','my_mbruid='.$R['by_mbruid'].' and by_mbruid='.$R['my_mbruid']);
	}
}
echo '[RESULT:done:RESULT]';
exit;
?>