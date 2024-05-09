<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('jwt/vendor/autoload.php');
use \Firebase\JWT\JWT;

class Authjwt{
    
	var $key = "medinet";
	
    public function encode_token($accion, $tx_modulo, $nu_rif, $nb_dominio, $buscar)
    {
          $token = array(
                "iss" => "http://latinclub.net",
                "aud" => "http://latinclub.net",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (7 * 24 * 60 * 60), //expira en una semana            
                "accion" => "$accion",
                "modulo" => "$tx_modulo",
                "nu_rif" => "$nu_rif",
                "nb_dominio" => "$nb_dominio",
                "buscar" => "$buscar"
           );

            $jwt = JWT::encode($token, $this->key);
            return $jwt;    
    }

    
         public function encode_token_verficar_email($email)
    {
          $token = array(
                "iss" => "http://latinclub.net",
                "aud" => "http://latinclub.net",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (7 * 24 * 60 * 60), //expira en una semana            
                "email" => "$email"
           );

            $jwt = JWT::encode($token, $this->key);
            return $jwt;    
    }

             public function encode_token_chats($username, $co_grupo_difusion)
    {
          $token = array(
                "iss" => "http://latinclub.net",
                "aud" => "http://latinclub.net",
                "iat" => time(),
                "nbf" => time(),
                "exp" => time() + (7 * 24 * 60 * 60), //expira en una semana            
                "username" => "$username",
                "co_grupo_difusion" => "$co_grupo_difusion"
           );

            $jwt = JWT::encode($token, $this->key);
            return $jwt;    
    }




	public function decode_token($jwt)
    {
	  	$decoded = JWT::decode($jwt, $this->key, array('HS256'));
		return $decoded;	
     }


}




