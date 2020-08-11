<?php
class setting {
	function get($db)
	{
		$_SESSION['setting'] = null;
		$setting = $db->table(DB_PREFIX.'setting')->no_cache()->find_one('id','1');
		$_SESSION['setting'] = $setting;
	}
}
?>