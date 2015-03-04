<?php
Class Validate {
	public static function is_valid_date($value, $format = 'dd/mm/yyyy') {
		if (strlen($value) >= 6 && strlen($format) == 10) {
			// find separator. Remove all other characters from $format
			$separator_only = str_replace(array('m', 'd', 'y'), '', $format);
			$separator = $separator_only[0];
			// separator is first character
			if ($separator && strlen($separator_only) == 2) {
				// make regex
				$regexp = str_replace('mm', '(0?[1-9]|1[0-2])', $format);
				$regexp = str_replace('dd', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
				$regexp = str_replace('yyyy', '(19|20)?[0-9][0-9]', $regexp);
				$regexp = str_replace($separator, "\\" . $separator, $regexp);
				if ($regexp != $value && preg_match('/' . $regexp . '\z/', $value)) {
					// check date
					$arr = explode($separator, $value);
					$day = $arr[0];
					$month = $arr[1];
					$year = $arr[2];
					if (@checkdate($month, $day, $year))
						return true;
				}
			}
		}
		return false;
	}
}