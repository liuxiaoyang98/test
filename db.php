<?php
class pdoC{
    private $dsn='mysql:host=localhost;dbname=vote';
    private $user='root';
    private $pass='63508790';
    private $condition=array();
    private $prepare;
    private $execute;
    private $dbh=null;
	private $conn=false;
	private $query;

    function __construct($pconnect=false){
        $this->condition=array(PDO::ATTR_PERSISTENT => $pconnect);
        $this->connect();
    }
    public function connect(){
        if($this->dbh==null){
            try{
                $this->dbh=new PDO(
                    $this->dsn,$this->user,$this->pass,
                    array(PDO::ATTR_PERSISTENT=>true)
                    );
                $this->query("SET NAMES 'UTF8'");
				$this->conn=true;
            }
            catch(PDOException $e){
                echo 'ERROR:'.$e->getMessage().'<br>';
                die();
            }
        }
    }
    public function getDsn(){
            return $this->dsn;
    }
	public function query($query){
		$this->query=$this->dbh->query($query);
		return $this->query;
	}
    public function pdo_pre($sql){
        $this->prepare=$this->dbh->prepare($sql);
        return $this->prepare;
    }
    public function pdo_execute($arr=array()){
        if(empty($arr)){
            $this->execute=$this->prepare->execute();
        }else{
            $this->execute=$this->prepare->execute($arr);
        }
        if ($this->execute==false)
            return false;
    }
    public function pdo_fetch($date,$type='default'){
        switch($type){
            case 'assoc':return $date->fetch(PDO::FETCH_ASSOC);break;
            case 'both':return $date->fetch(PDO::FETCH_BOTH);break;
            case 'num':return $date->fetch(PDO::FETCH_NUM);break;
            case 'default':return $date->fetchAll();break;
        }
    }
    public function clear(){
        $this->prepare=null;
        $this->execute=null;
    }
    public function close(){
		$this->clear();
            $this->dbh=null;
    }
}
