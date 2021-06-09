<?php
class pageNumberCheck {

    public function pnocheck1($pchk){
        //$this->paginNum = $pchk;
        $pchkc = preg_replace('/\D/','', $pchk);
        if (is_numeric($pchkc)){
            $this->paginNum = $pchkc;
        }
        else {
            $this->paginNum = 1;
        }
    }
    public function getPaginNum(){
        return $this->paginNum;
    }
}
class getASingleUser {

    public function singleUserDump($empnolink) {
        $empnolinkc= preg_replace('/\D/','', $empnolink);
        if (is_numeric($empnolinkc)){
            $this->empNum = $empnolinkc;
        }
        else {
            $this->empNum = '';
            header("Location: ./error.php");
            exit;
        }
    }
    public function getEmpNum(){
        if (is_numeric($this->empNum)){
            return $this->empNum;
        }
        else {
            header("Location: ./error.php");
            exit;
        }
    }
}
