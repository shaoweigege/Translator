<?php
	use benfiratkaya\Translator\Translator;
	
	function translate($text = null, $variable = null) {
		return Translator::$current->translate($text, $variable);
	}
	
	function translator($text = null, $variable = null) {
		return translate($text, $variable);
	}
	
	function t_($text = null, $variable = null) {
		return translate($text, $variable);
	}

	function e_($text = null, $variable = null) {
		return translate($text, $variable);
	}
