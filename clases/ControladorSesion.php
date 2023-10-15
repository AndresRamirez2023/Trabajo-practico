<?php
require_once 'RepositorioUsuario.php';
require_once 'usuario.php';

class Controlador_Sesion
{

	protected $usuario = null;

	public function login($nombre_usuario, $clave)
	{

		$r = new Repositorio_Usuario();
		$usuario = $r->login($nombre_usuario, $clave);

		if ($usuario === false) {
			//fallo el login
			return [false, "usuario o clave incorrecta"];
		} else {
			//login correcto se ingresa al sistema
			session_start();
			$_SESSION['usuario'] = serialize($usuario);
			return [true, "Ingreso correcto"];
		}
	}
}
