<?php
	 /*
	 * @see 	   https://github.com/benfiratkaya/Translator
	 * @author 	Fırat Kaya
	 * @version    1.0
	 * @copyright  2019 Fırat Kaya
	 */
	 namespace benfiratkaya\Translator;
 	class Translator extends Register {
 		private $exception;
 		private $type;
 		private $lang;
 		private $path;
 		private $file;
 		private $text;
 		
 		public function __construct($exception = null, $type=null, $lang=null, $path=null) {
 			$this->exception = (isset($exception)) ? $exception : false;
 			$this->type = (isset($type)) ? $type : 'json';
 			$this->lang = (isset($lang)) ? $lang : 'en_US';
 			$this->path = (isset($path)) ? rtrim($path, '/') : __DIR__.'/languages';
 			$this->setFile();
 		}
 		private function setFile() {
 			$supportedTypes = array('php', 'json', 'xml', 'ini', 'yaml');
 			if (in_array($this->type, $supportedTypes)) {
 				$this->file = $this->path.'/'.$this->lang.'.'.$this->type;
 				if (is_file($this->file)) {
 					$fileContent = file_get_contents($this->file);
 					if ($this->type === 'json') {
 						$this->text = json_decode($fileContent, true);
 					}
 				}
 				else {
				 	if ($this->exception === true) {
 						throw new Exception('File not found.');
 					}
 					return false;
 				}
 			}
 			else {
 				if ($this->exception === true) {
 					throw new Exception('File type not found.');
 				}
 				return false;
 			}
 		}
 		public function setType($type = null) {
 			$this->type = (isset($type)) ? $type : 'json';
 			$this->setFile();
 		}
 		public function setLang($lang = null) {
 			$this->lang = (isset($lang)) ? $lang : 'en_US';
 			$this->setFile();
 		}
 		public function setPath($path = null) {
 			$this->path = (isset($path)) ? rtrim($path, '/') : __DIR__.'/languages';
 			$this->setFile();
 		}
 		public function setException($exception = null) {
 			$this->exception = (isset($exception)) ? $exception : false;
 			$this->setFile();
 		}
 		public function translate($text = null, $variable = null) {
 			if (isset($variable)) {
 				return strtr(((isset($this->text[$text])) ? $this->text[$text] : $text), $variable);
 			}
 			return ((isset($this->text[$text])) ? $this->text[$text] : $text);
  		}
 	}
