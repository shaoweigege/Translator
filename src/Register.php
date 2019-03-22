<?php
	namespace benfiratkaya\Translator;
	abstract class Register {
		public static $current;
		public function register() {
			$previous = self::$current;
			self::$current = $this;
			static::includeFunctions();
			return $previous;
		}
		private static function includeFunctions() {
			include(dirname(__FILE__).'/Functions.php');
		}
	}
