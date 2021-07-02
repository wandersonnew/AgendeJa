<?php
/*
	Passagem de parâmetro na rota usa-se :id
	Exemplo: /product/:id
*/

namespace App;

use Src\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		//Rota do site
		$routes['home'] = array(
			'route' => '/',
			'controller' => 'IndexController',
			'action' => 'home'
		);

		//Rota de pacientes
		$routes['register'] = array(
			'route' => '/patient/register',
			'controller' => 'PatientController',
			'action' => 'register'
		);
		$routes['toregister'] = array(
			'route' => '/patient/toregister',
			'controller' => 'PatientController',
			'action' => 'toregister'
		);
		$routes['login'] = array(
			'route' => '/patient/login',
			'controller' => 'PatientController',
			'action' => 'login'
		);
		$routes['tologin'] = array(
			'route' => '/patient/tologin',
			'controller' => 'PatientController',
			'action' => 'tologin'
		);
		$routes['tologout'] = array(
			'route' => '/patient/logout',
			'controller' => 'PatientController',
			'action' => 'logout'
		);
		$routes['recoverpass'] = array(
			'route' => '/patient/recoverpass',
			'controller' => 'PatientController',
			'action' => 'recoverpass'
		);
		$routes['torecoverpass'] = array(
			'route' => '/patient/torecoverpass',
			'controller' => 'PatientController',
			'action' => 'torecoverpass'
		);

		//Rotas do doutor
		$routes['doctor'] = array(
			'route' => '/doctor',
			'controller' => 'DoctorController',
			'action' => 'home'
		);
		$routes['logindoctor'] = array(
			'route' => '/doctor/login',
			'controller' => 'DoctorController',
			'action' => 'login'
		);
		$routes['tologindoctor'] = array(
			'route' => '/doctor/tologin',
			'controller' => 'DoctorController',
			'action' => 'tologin'
		);
		$routes['tologoutdoctor'] = array(
			'route' => '/doctor/logout',
			'controller' => 'DoctorController',
			'action' => 'logout'
		);
		//Rotas gerenciamento de secretária
		$routes['secretarydoctor'] = array(
			'route' => '/doctor/secretary',
			'controller' => 'DoctorController',
			'action' => 'secretary'
		);
		$routes['registersecretarydoctor'] = array(
			'route' => '/doctor/register/secretary',
			'controller' => 'DoctorController',
			'action' => 'registersecretary'
		);
		$routes['editsecretarydoctor'] = array(
			'route' => '/doctor/editsecretary/:id',
			'controller' => 'DoctorController',
			'action' => 'editSecretary'
		);
		$routes['updatesecretarydoctor'] = array(
			'route' => '/doctor/update/secretary',
			'controller' => 'DoctorController',
			'action' => 'updateSecretary'
		);
		$routes['deletesecretarydoctor'] = array(
			'route' => '/doctor/delete/secretary/:id',
			'controller' => 'DoctorController',
			'action' => 'deleteSecretary'
		);
		//Rotas gerenciamento de clínica
		$routes['clinicdoctor'] = array(
			'route' => '/doctor/clinic',
			'controller' => 'DoctorController',
			'action' => 'clinic'
		);
		$routes['registerclinicdoctor'] = array(
			'route' => '/doctor/register/clinic',
			'controller' => 'DoctorController',
			'action' => 'registerclinic'
		);
		$routes['editseclinicdoctor'] = array(
			'route' => '/doctor/editclinic/:id',
			'controller' => 'DoctorController',
			'action' => 'editClinic'
		);
		$routes['updateclinicdoctor'] = array(
			'route' => '/doctor/update/clinic',
			'controller' => 'DoctorController',
			'action' => 'updateClinic'
		);
		$routes['deleteclinicdoctor'] = array(
			'route' => '/doctor/delete/clinic/:id',
			'controller' => 'DoctorController',
			'action' => 'deleteClinic'
		);
		

		$this->setRoutes($routes);
	}

}

?>