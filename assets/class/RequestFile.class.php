
<?php

class RequestFile extends Dbh{

    //PROPERTIES
    private $userId;
    private $results;
    private $pTitle;
    private $pDesc;
    private $fLocation;
    private $usertype;

    //CONSTRUCT
    public function __construct($userId, $usertype){
        $this->userId = $userId;
        $this->usertype = $usertype;
    }

    //FETCH DB DATA
    private function FetchDb(){
        $query = "SELECT * FROM gallery WHERE userId = ?;";
        $stmt = $this->Connect()->prepare($query);
        $stmt->execute([$this->userId]);

        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->results;
    }

    //FETCH DB DATA
    private function FetchAllDb(){
        $query = "SELECT * FROM gallery;";
        $stmt = $this->Connect()->prepare($query);
        $stmt->execute();

        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->results;
    }

    //ASSIGN
    private function Results1(){

        if($this->FetchAllDb()){
            foreach($this->results as $result){
                $this->pTitle = $result['pTitle'];
                $this->pDesc = $result['pDesc'];
                $this->fLocation = $result['fDestination'];
                $location = "assets/uploads/";

                echo'
                    <div class="imgCon">
                        <div class="img" style="background-image: url('.$location.''.$this->fLocation.');"></div>
            
                        <div class="texts">
                            <span class="sssub"> <em class="ssub s">Post Title: </em> <br> </span> 
                            <b class="sb">' .$this->pTitle. '</b>
                            <span class="sssub"> <em class="ssub s">Post Description: </em> <br> </span>
                            <b class="sb maxDesc">' .$this->pDesc. '</b>  <a class="plearn" href="#">Learn more</a>
                        </div>
                    </div>
                ';
            }
        }

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
                            <span class="sssub"> <em class="ssub s">Post Title: </em> <br> </span> 
                            <b class="sb">' .$this->pTitle. '</b>
                            <span class="sssub"> <em class="ssub s">Post Description: </em> <br> </span>
                            <b class="sb maxDesc">' .$this->pDesc. '</b>  <a class="plearn" href="#">Learn more</a>
                        </div>
                    </div>
                ';
            }
        }

    }

    public function Callgallery(){
            if($this->usertype === "admin"){

                if($this->FetchAllDb() == true ){
                $this->Results1();

            }else{

                if($this->FetchDb() == true ){
                    $this->Results();
                }
            }
        }
    }



}


?>