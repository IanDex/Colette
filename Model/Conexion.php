<?php

	class Conexion
	{
        private $user = "root";
        private $password = "";
        private $db = "colette";
        private $host = "localhost";

		protected $conexion_db;

		public function __construct()
		{

			try {
				$this->conexion_db=new PDO("mysql:host=". $this->host ."; dbname=". $this->db ."", $this->user, $this->password);
				//$this->conexion_db=new PDO('mysql:host=sql312.epizy.com; dbname=epiz_20171860_inmobiliaria','epiz_20171860','AKfJce6a');

				$this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$this->conexion_db->exec("set character set utf8");

				return $this->conexion_db;

            } catch (Exception $e) {

                print "¡Error!: " . $e->getMessage() . "<br/>";
                die();

            }
		}
		public function retorna_conexion(){
			return $this->conexion_db;
		}

		public function getMenu(){

			$menu = $this->conexion_db->query('Select * from menu');
			return $menu->fetchAll();
		}

		public function getSubMenu($id){

			$menu = $this->conexion_db->query("Select * from submenu WHERE menu = $id");
			return $menu->fetchAll();
		}

		public function getTablas(){

			$menu = $this->conexion_db->query("SHOW TABLES FROM colette");
			return $menu->fetchAll();
		}

		public function getDatabase(){

			$menu = $this->conexion_db->query("SHOW DATABASES");
			return $menu->fetchAll();
		}
	}

?>
