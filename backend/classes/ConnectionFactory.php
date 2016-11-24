<?php


class ConnectionFactory
{

    public function getConnection(){

        $conexao = mysqli_connect("localhost", "root", "48h12rp6", "igs");
        mysqli_set_charset($conexao,'utf8');
        ini_set('default_charset','utf-8');

        return $conexao;
    }
}