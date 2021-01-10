<?php


// Singleton class
class RequestData {

   protected static $_instance;

   private function __construct() {
   }

   private function __clone() {
   }

   public static function getInstance() {
      if (self::$_instance === null) {
         self::$_instance = new self();
      }

      return self::$_instance;
   }

   /** @var string */
   protected $_uri = '';

   /** @var string */
   protected $_input = '';
   /** @var array */
   protected $_get = [];
   /** @var array */
   protected $_post = [];
   /** @var array */
   protected $_headers = [];

   /** @var array */
   protected $_params = [];

   public function getUri() {
      if (empty($this->_uri)) {
         $this->_uri = $_SERVER['REQUEST_URI'];
      }
      return $this->_uri;
   }

   public function getInput() {
      if (empty($this->_input)) {
         $this->_input = file_get_contents('php://input');
      }
      return $this->_input;
   }

   public function getHeaders(): array {
      if (empty($this->_headers)) {
         $this->_headers = getallheaders();
      }
      return $this->_headers;
   }

   public function getPost() {
      if (empty($this->_post)) {
         $headers = $this->getHeaders();
         if (
            (isset($headers['Content-Type']) && $headers['Content-Type'] == 'application/json') ||
            (isset($headers['content-type']) && $headers['content-type'] == 'application/json')
         ) {
            $post = json_decode($this->getInput(), true);
            if (empty($post)) {
               return [];
            }
            $this->_post = $post;
         } else {
            $this->_post = (array)$_POST;
         }
      }
      return $this->_post;
   }

   public function getSign() {
      $headers = $this->getHeaders();
      if ((isset($headers['Sign']))) {
         return $headers['Sign'];
      } else if (isset($headers['sign'])) {
         return $headers['sign'];
      } else {
         return false;
      }
   }
}
