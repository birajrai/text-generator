<?php
class text_generator {


   /*
      CLASS VARIABLES.
   */
   private static $sets  = array();
   private static $stats = array();


   /*
      REUSABLE FUNCTIONS.
   */
   public static function website_protocol() {
      return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' && $_SERVER['HTTPS'] ? 'https://' : 'http://');
   }


   public static function website_url() {
      return (self::website_protocol() . $_SERVER['HTTP_HOST'] . preg_replace('/\/$/', '', dirname($_SERVER['PHP_SELF'])) . '/');
   }


   public static function current_url() {
      return (self::website_protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
   }


   public static function switch_case($character) {
      return (strtolower($character) !== $character ? strtolower($character) : strtoupper($character));
   }


   public static function website_redirect($url, $header = false) {
      if ( $header ) {
         header($header);
      }
      header('location: ' . $url);
      exit;
   }


   public static function get_json($filename) {
      if ( file_exists(PATH_JSON . $filename . '.json') ) {
         $data = file_get_contents(PATH_JSON . $filename . '.json');
         $data = json_decode($data, true);
      }
      return (isset($data) ? $data : array());
   }


   public static function put_json($filename, $data) {
      $json = json_encode($data);
      file_put_contents(PATH_JSON . $filename . '.json', $json);
   }


   public static function url_slug($string) {
      $slug = strtolower($string);
      $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
      $slug = trim($slug, '-');
      return $slug;
   }


   /*
      MAIN FUNCTIONS.
   */
   public static function get_sets() {
      if ( empty(self::$sets) ) {
         $sets = self::get_json('character-sets');
         foreach ( $sets as $set ) {
            $set['slug']              = self::url_slug($set['name']);
            $set['url']               = self::website_url() . 'generate/' . $set['slug'];
            $set['example']           = self::generate($set['name'], $set['characters']);
            self::$sets[$set['slug']] = $set;
         }
      }
      return self::$sets;
   }


   public static function get_stats() {
      if ( empty(self::$stats) ) {
         $stats       = self::get_json('statistics');
         self::$stats = array(
            "sets"       => count(self::get_sets()),
            "uses"       => (isset($stats['uses'])       ? $stats['uses']       : 0),
            "characters" => (isset($stats['characters']) ? $stats['characters'] : 0)
         );
      }
      return self::$stats;
   }


   public static function update_stats($type, $amount) {
      $stats = self::get_json('statistics');
      if ( !isset($stats[$type]) ) {
         $stats[$type] = 0;
      }
      $stats[$type] += $amount;
      self::put_json('statistics', $stats);
   }


   public static function generate($text, $characters, $stats = false) {
      $changed = 0;
      $text    = str_split($text);
      foreach ( $text as $key => $value ) {
         if ( isset($characters[$value]) ) {
            $text[$key] = $characters[$value];
            ++$changed;
         }
         else if ( isset($characters[self::switch_case($value)]) ) {
            $text[$key] = $characters[self::switch_case($value)];
            ++$changed;
         }
      }
      if ( $stats ) {
         self::update_stats('uses',       1);
         self::update_stats('characters', $changed);
      }
      return implode($text);
   }


   public static function current_set() {
      $sets = self::get_sets();
      if ( isset($_GET['slug']) && isset($sets[$_GET['slug']]) ) {
         return $sets[$_GET['slug']];
      }
      else {
         self::website_redirect(self::website_url(), 'HTTP/1.1 301 Moved Permanently');
      }
   }


   public static function load_config(&$global) {
      if ( file_exists(PATH_ABSOLUTE . 'install.php') && !preg_match('/install\.php$/', self::current_url()) ) {
         self::website_redirect(self::website_url() . 'install.php');
      }
      else {
         $config = self::get_json('config');
         foreach ( $config as $name => $value ) {
            $global[$name] = $value;
         }
      }
   }


}
?>