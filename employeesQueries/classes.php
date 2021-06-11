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

class checkThoseVars {

    public function varCheckerInput($dbconvar, $getter, $vartocheck){
        $tsetfilter = '';
        $dsetfilter = '';
        $fnsetfilter = '';
        $lnsetfilter = '';
        $nosetfilter = '';
        $ensetfilter = '';
        $tset = '';
        $dset = '';
        $fnset = '';
        $lnset = '';
        $noset = '';
        $fnisset = '';
        $lnisset = '';
        $enisset = '';
        $tisset = '';
        $disset = '';
        $rolessArrayX = array("Assistant Engineer","Engineer","Manager","Senior Engineer","Senior Staff","Technique Leader", "Staff");
        $deptsArrayX = array("d001","d002","d003","d004","d005","d006","d007","d008","d009");

        if ($vartocheck  == 't') {
            $tset = mysqli_real_escape_string($dbconvar, $getter);
            if (in_array($tset, $rolessArrayX)) {
                $this->tsetfilter = 'and title.title = "'. $tset . '"';
                $this->tisset = $tset;
            } else {
                $this->tsetfilter = "and title.title is not null";
                $this->tisset = '';
            }
        }
        if ($vartocheck  == 'd') {
            $dset = mysqli_real_escape_string($dbconvar, $getter);
            if (in_array($dset, $deptsArrayX)) {
                $this->dsetfilter = 'and depts.ds_dept_no = "'. $dset . '"';
                $this->disset = $dset;
            } else {
                $this->dsetfilter = "and depts.ds_dept_no is not null\n";
                $this->disset = '';
            }
        }
        if ($vartocheck  == 'fn') {
            $fnset = mysqli_real_escape_string($dbconvar, $getter);
            $fnset = preg_replace('/[^a-zA-Z]/','', $fnset);
            $this->fnsetfilter = 'and employees1.first_name LIKE "'. $fnset .'%"';
            $this->fnisset = $fnset;
        } else {
            $this->fnsetfilter = "\n";
            $this->fnisset = '';
        }
        if ($vartocheck  == 'ln') {
            $lnset = mysqli_real_escape_string($dbconvar, $getter);
            $lnset = preg_replace('/[^a-zA-Z]/','', $lnset);
            $this->lnsetfilter = 'and employees1.last_name LIKE "'. $lnset .'%"';
            $this->lnisset = $lnset;

        } else {
            $this->lnsetfilter = "\n";
            $this->lnisset = '';
        }
        if ($vartocheck  == 'en') {
            $enset = mysqli_real_escape_string($dbconvar, $getter);
            $this->nosetfilter = 'and employees1.emp_no LIKE "'. $noset .'%"';
            $this->enisset = $noset;
        } else {
            $nosetfilter = "\n";
            $this->enisset ='';
        }


    }
    public function varCheckerOutput($vartocheck,$getValueIn, $variant){
        $rolessArrayXb = array("Assistant Engineer","Engineer","Manager","Senior Engineer","Senior Staff","Technique Leader", "Staff");
        $deptsArrayXb = array("d001","d002","d003","d004","d005","d006","d007","d008","d009");
        $filterArray1 = array("fn","ln","t");
        $getValueIn = preg_replace('/[?]/','', $getValueIn);
        if (in_array($getValueIn, $filterArray1)){
            $getValueIn = preg_replace('/[^a-zA-Z]/','', $getValueIn);
        }

        if (($vartocheck  == 't') && (!is_null($getValueIn)) && (in_array($getValueIn, $rolessArrayXb))) {
            if ($variant == 'filter') {
                return $this->tsetfilter;
            } elseif ($variant == 'sortby') {
                return $this->tisset;
            }
        } elseif (($vartocheck  == 't') && (!in_array($getValueIn, $rolessArrayXb))) {
            if ($variant == 'filter') {
                if ($getValueIn != ''){
                    trigger_error("Job Title was incorrect - filter will show all job titles", E_USER_NOTICE);
                }
                $this->tsetfilter = "and title.title is not null\n";
                return $this->tsetfilter;
            } elseif ($variant == 'sortby') {
                $this->tisset = '';
                return $this->tisset;
            }
        } elseif (($vartocheck  == 'd') && (!is_null($getValueIn)) && (in_array($getValueIn, $deptsArrayXb))) {
            if ($variant == 'filter') {
                return $this->dsetfilter;
            } elseif ($variant == 'sortby') {
                return $this->disset;
            }
        } elseif (($vartocheck  == 'd') && (!is_null($getValueIn)) && (!in_array($getValueIn, $deptsArrayXb))) {
            if ($variant == 'filter') {
                if ($getValueIn != ''){
                    trigger_error("Department was incorrect - filter will show all departments", E_USER_NOTICE);
                }
                $this->dsetfilter = "and depts.ds_dept_no is not null\n";
                return $this->dsetfilter;
            } elseif ($variant == 'sortby') {
                $this->disset = '';
                return $this->disset;
            }
        } elseif (($vartocheck  == 'fn') && (!is_null($getValueIn))){
            if ($variant == 'filter') {
                return $this->fnsetfilter;
            } elseif ($variant == 'sortby') {
                return $this->fnisset;
            }
        } elseif (($vartocheck  == 'fn') && (is_null($getValueIn))){
            if ($variant == 'filter') {
                $this->fnsetfilter = "\n";
                return $this->fnsetfilter;
            } elseif ($variant == 'sortby') {
                $this->fnisset = '';
                return $this->fnisset;
            }
        } elseif (($vartocheck  == 'ln') && (!is_null($getValueIn))) {
            if ($variant == 'filter') {
                return $this->lnsetfilter;
            } elseif ($variant == 'sortby') {
                return $this->lnisset;
            }
        } elseif (($vartocheck  == 'ln') && (is_null($getValueIn))) {
            if ($variant == 'filter') {
                $this->lnsetfilter = "\n";
                return $this->lnsetfilter;
            } elseif ($variant == 'sortby') {
                $this->lnisset = '';
                return $this->lnisset;
            }
        } elseif (($vartocheck  == 'en') && (!is_null($getValueIn))) {
            $getValueIn = preg_replace('/\D/','', $getValueIn);
            if ($variant == 'filter') {
                $this->lnsetfilter = 'and employees1.emp_no LIKE "'.$getValueIn.'%"';
                return $this->lnsetfilter;
            } elseif ($variant == 'sortby') {
                $this->lnisset = $getValueIn;
                return $this->lnisset;
            }
        } elseif (($vartocheck  == 'en') && (is_null($getValueIn))) {
            $getValueIn = preg_replace('/\D/','', $getValueIn);
            if ($variant == 'filter') {
                $this->lnsetfilter = 'and employees1.emp_no LIKE "'.$getValueIn.'%"\n';
                return $this->nosetfilter;
            } elseif ($variant == 'sortby') {
                $this->enisset = $getValueIn;
                return $this->enisset;
            }
        }
    }
}