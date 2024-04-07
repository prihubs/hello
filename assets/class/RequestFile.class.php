
<?php

class RequestFile extends Dbh{

    //PROPERTIES
    private $userId;
    private $results;
    private $pTitle;
    private $pDesc;
    private $fLocation;

    //CONSTRUCT
    public function __construct($userId){
        $this->userId = $userId;
    }

    //FETCH DB DATA
    private function FetchDb(){
        $query = "SELECT * FROM gallery WHERE userId = ?;";
        $stmt = $this->Connect()->prepare($query);
        $stmt->execute([$this->userId]);

        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->results;
    }

    //ASSIGN
    private function Results(){

        if($this->FetchDb()){
            foreach($this->results as $result){
                $this->pTitle = $result['pTitle'];
                $this->pDesc = $result['pDesc'];
                $this->fLocation = $result['fDestination'];
                $location = "assets/uploads/";

                echo'
                    <div class="imgCon">
                        <div class="img" style="background-image: url('.$location.''.$this->fLocation.');"></div>
            
                        <div class="texts">
                            <span class="sssub"> <em class="ssub s">File Name: </em> <br> </span> 
                            <b class="sb">' .$this->pTitle. '</b>
                            <span class="sssub"> <em class="ssub s">File Description: </em> <br> </span>
                            <b class="sb maxDesc">' .$this->pDesc. '</b>  <a class="plearn" href="#">Learn more</a>
                        </div>
                    </div>
                ';
            }
        }

    }

    public function Callgallery(){
        if($this->FetchDb() == true ){
            $this->Results();
        }
    }



}


?>