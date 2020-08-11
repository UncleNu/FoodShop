<?php

class Session_helper {

	function set($key, $val)
	{
		if(is_array($val)){
			foreach ($val as $g => $gs) {
				$_SESSION[$key][$g] = $gs;
			}
		}else{
			$_SESSION[$key] = $val;
		}
	}
	function get($key)
	{
		if(isset($_SESSION["$key"])){
			return $_SESSION["$key"];
		}else{
			return null;
		}
	}
	function destroy()
	{
		session_destroy();
	}

}

?>