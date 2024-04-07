<?php
// session_start();

include_once "../includes/myFunc.inc.php";

Class File extends Dbh{

    //PROPERTIES
    private $pName;
    private $pTitle;
    private $pDesc;

    private $fName;
    private $fExt;
    private $fAExt;
    private $fSize;
    private $fErr;
    private $fTLocation;
    private $fDestination;
    private $fNewName;
    
    private $kb;
    private $kbbb;
    private $goodSize;

    private $list;
    private $userId;
    private $pOrder;

    // CONSTRUCTION
    public function __construct($userId, $pName, $pTitle, $pDesc, $fName, $fSize, $fErr, $fTLocation){
        $this->userId = $userId;
        $this->pName = $pName;
        $this->pTitle = $pTitle;
        $this->pDesc = $pDesc;

        $this->fName = $fName;
        $this->fSize = $fSize;
        $this->fErr = $fErr;
        $this->fTLocation = $fTLocation;
    }

    //METHOD
    private function isEmpty(){
        if(empty($this->pTitle) || empty($this->pDesc) || empty($this->userId)){
            return true;
        }
    }
    private function hasName(){
        if(empty($this->pName)){
            $this->pName = "gallery";
        }
    }
    private function hasFile(){
        if($this->fErr > 0){
            return true;
        }
    }
    private function NotAcceptSize(){

        $this->kb = $this->fSize / 1024;
        $kbb = explode(".", $this->kb);
        $this->kbbb = $kbb[0];

        if($this->fSize > 900000){
            return true;
        }
    }
    private function acceptedSize(){
        $Default = 900000 / 1024;
        $Extract = explode(".", $Default);
        $this->goodSize= $Extract[0];

        return $this->goodSize;
    }
    private function ExtExtract(){
        $this->fExt = explode(".", str_replace(" ", "-", $this->fName));
        $this->fAExt = strtoupper(end($this->fExt));

        return $this->fAExt;
    }
    protected function FileTypeList(){
        return $this->list = array("PNG","JPG","JPEG");
    }
    private function AcceptType(){
        if(in_array($this->ExtExtract(), $this->FileTypeList())){
            return true;
        }
    }

    protected function newName(){
        $this->fNewName = $this->pName. "." .uniqid("", true). "." .$this->ExtExtract(); 

        return $this->fNewName;
    }

    //INSERT DATA INTO DB
    private function dB(){
        $this->newName();
        $query = "INSERT INTO gallery (userId, pTitle, pDesc, fDestination, pOrder) VALUES(?,?,?,?,?);";
        $stmt = $this->Connect()->prepare($query);
        $stmt->execute([$this->userId, $this->pTitle, $this->pDesc, $this->fNewName, $this->pOrder = uniqid(" ", false)]);

        return true;
    }

    private function moveFile(){
        $this->dB();
        $this->fDestination = "../uploads/".$this->fNewName;

        move_uploaded_file($this->fTLocation, $this->fDestination);
    }
    private function Accept(){

        // CHECK IF EMPTY
        if($this->isEmpty()){
            $error = "Heads up!, You need to Enter a title and Description for your upload";
            die(Returnn($error));
        }

        //CHECK OR ASSIGN NAME
        $this->hasName();

        //CHECK FILE
        if($this->hasFile()){
            $error = "Heads up!, You have not uploaded any file";
            die(Returnn($error));
        }

        //CHECK TYPE
        if($this->AcceptType() == false){
            $error = "Heads up!, the uploaded file type is not Accepted";
            die(Returnn($error));
        }

        //CHECK SIZE
        if($this->NotAcceptSize()){
            $error = "Heads up!, The file size $this->kbbb kb is too large, go lower than " .$this->acceptedSize()." kb";
            die(Returnn($error));
        }

        //MOVE TO DB
        try{
            $this->moveFile();

        }catch(PDOException $e){
            
            $error = $e->getMessage();
            return Returnn($error);
        }


        //MOVE TO DESTINATION
        // try{

        // }catch(PDOException $e){

        //     $error = $e->getMessage();
        //     return Returnn($error);
        // }

        return true;
    }
    
    public function Spit() {


        if ($this->Accept()){

            $success = "File Uploaded Successfully";
            return Returns($success);

        }else{
            die();
        }

        // try{

        // $this->Accept();
        // $success = "Uploaded Successfully: ".$this->fDestination;
        // return Returns($success);

        // }catch(PDOException $e){
            
        //     $error = $e->getMessage();
        //     return Returnn($error);
        // }

    }
}