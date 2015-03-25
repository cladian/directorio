<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user = Usuarios::model()->find('username=?', array($this->username));

        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->errorCode = self::ERROR_NONE;

            $this->setState('IDUSER', $user->id);
            //Consulta de relación UsuarioRegistro
            $userRegistro = Usuarioregistro::model()->find('usuarios_id=?', array($user->id));
            if ($userRegistro) {
                $this->setState('REGISTROID', $userRegistro->registros->id);
                $this->setState('TIPOREGISTROID', $userRegistro->registros->tiposregistro_id);
                // $this->setState('consorcioID', $user->usuarioregistros->id);
                // VARIABLES DE SESSION PARA ALMACENAMIENTO AUTOMÁTICO DE INFORMACIÓN
                if ($userRegistro->registros->tiposregistro_id == Yii::app()->params['idCons']) {
                    $consorcioRegistro = Consorcios::model()->find('registros_id=?', array($userRegistro->registros->id));
                    if ($consorcioRegistro) {
                        $this->setState('CONSORCIOID', $consorcioRegistro->id);
                        $this->setState('CONSORCIOREGISTROSID', $consorcioRegistro->registros_id);
                    }
                    //  $this->setState('CONSORCIOID', $user->usuarioregistros->registros->consorcioses->id);
                }
                if ($userRegistro->registros->tiposregistro_id == Yii::app()->params['idPyme']) {
                    $pymeRegistro = Pymes::model()->find('registros_id=?', array($userRegistro->registros->id));
                    if ($pymeRegistro) {
                        $this->setState('PYMEID', $pymeRegistro->id);
                        $this->setState('CONSORCIOID', $pymeRegistro->consorcios_id);
                    }
                }

            }
        }

        return $this->errorCode == self::ERROR_NONE;


    }
}