<?php
class pageNumberCheck {
    public $pchk;
    public $pchkc;
    public function pnocheck1($pchk){
        //$this->paginNum = $pchk;
        $pchkc= preg_replace('/\D/','', $pchk);
        if (is_numeric($pchk)){
            $this->paginNum = $pchk;
        }
        else {
            /*$pchkc= preg_replace('/\D/','', $pchk);
            if (is_numeric ($pchkc)){
                $this->paginNum = $pchkc;
            }
            else {*/
                $this->paginNum = 1;
            /*}*/
        }
    }
    public function getPaginNum(){
        return $this->paginNum;
    }
}
