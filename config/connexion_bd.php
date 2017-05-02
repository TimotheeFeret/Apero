<?php
	class DB
	{

		private static $connect = null;

		public static function connect() {
			self::$connect = self::$connect ? self::$connect : new PDO('mysql:host=localhost;dbname=apero;charset=utf8', 'root', '');

			return self::$connect;
		}
	}
?>