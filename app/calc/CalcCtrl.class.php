<?php

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';


class CalcCtrl {

	private $msgs;
	private $infos;
	private $form;
	private $result;
	private $hide_intro;

	
	public function __construct(){
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	
	public function getParams(){
		$this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
		$this->form->lat = isset($_REQUEST ['lat']) ? $_REQUEST ['lat'] : null;
		$this->form->op = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
	}
	
	
	public function validate() {
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lat ) && isset ( $this->form->op ))) {
			return false;
		} else { 
			$this->hide_intro = true;
		}
		
		
		if ($this->form->kwota == "") {
			$this->msgs->addError('Nie podano kwoty kredytu.');
		}
		if ($this->form->lat == "") {
			$this->msgs->addError('Nie podano na ile lat pobiera się kredyt.');
		}
		if ($this->form->op == "") {
			$this->msgs->addError('Nie podano oprocentowania.');
		}
		
		
		if (! $this->msgs->isError()) {
			if (! is_numeric ( $this->form->kwota )) {
				$this->msgs->addError('Podana kwota nie jest liczbą całkowitą.');
			}
			if (! is_numeric ( $this->form->lat )) {
				$this->msgs->addError('Podany okres, na jaki pobiera się kredyt nie jest liczbą całkowitą.');
			}
			if (! is_numeric ( $this->form->op )) {
				$this->msgs->addError('Podane oprocentowanie jest nieprawidłowe.');
			}
		}
		return ! $this->msgs->isError();
	}
	
	
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			$this->form->kwota = intval($this->form->kwota);
			$this->form->lat = intval($this->form->lat);
			$this->form->op = intval($this->form->op);
			
			$this->msgs->addInfo('Parametry poprawne.');
				
			$this->result->result = ($this->form->kwota/($this->form->lat*12)) + (($this->form->kwota/($this->form->lat*12))*($this->form->op/100));
			$this->result->result = intval($this->result->result);	
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator kredytowy');
		$smarty->assign('page_description','ZAPRASZAMY DO SKORZYSTANIA Z NASZEGO PROFESJONALNEGO KALKULATORA KREDYTOWEGO.');
		$smarty->assign('page_header','obiekty - kontroler');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc/CalcView.html');
	}
}