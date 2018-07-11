<?php



class mysql_database{
  

    public function __construct($host,$user, $pass,$db)
    {
       $this->conn = new mysqli($host, $user, $pass,$db);

    }
     
   
    public function fetch($query){
     return $this->conn->query($query);
       
    }
        
            
    public function update($query){
    return $this->conn->query($query);

    
    }

   

   
}






?>