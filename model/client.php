<?php
  function insert_client($conn, $data){
    //insere os dados na tabela pessoa
    $sql = "INSERT INTO pessoa (id, nome, email, senha, ativo)
      VALUES (default, '$data[nome]', '$data[email]', '$data[senha]', TRUE)
      RETURNING id";
      $result = pg_query($conn, $sql);
      if(!$result){
        $is_inserted = false;
        echo "Ocorreu um erro.\n";
        exit;
      } else {
        $is_inserted = true;
      }

      //busca o id do cliente na tabela pessoa
      $row = pg_fetch_row($result);

      // insere os dados na tabela cliente
      $sql = "INSERT INTO cliente (id, pessoa_id, endereco, cpf)
        VALUES (default, '$row[0]', '$data[endereco]', '$data[cpf]')";
      $result = pg_query($conn, $sql);
      if(!$result){
        $is_inserted = false;
        echo "Ocorreu um erro.\n";
        exit;  
      } else {
        $is_inserted = true;
      }

      // insere os dados na tabela telefone_pessoa
      $sql = "INSERT INTO telefone_pessoa (id, pessoa_id, telefone, principal, descricao)
        VALUES (default, '$row[0]', '$data[telefone]', TRUE, 'celular')";
      $result = pg_query($conn, $sql);
      if(!$result){
        $is_inserted = false;
        echo "Ocorreu um erro.\n";
        exit;  
      } else {
        $is_inserted = true;
      }

    return $is_inserted;
  }

  function list_clients($conn) {
    $sql = "SELECT pessoa.id, nome, telefone, email FROM pessoa
      INNER JOIN telefone_pessoa ON pessoa_id = pessoa.id
      WHERE pessoa.ativo = TRUE";
    
    $result = pg_query($conn,$sql);
    if (!$result) {
        echo "Ocorreu um erro.\n";
        exit;
    }
    $clients = pg_fetch_all($result);
    
    return $clients;
  }

  function del_client($conn, $id){
    $sql = "UPDATE pessoa SET ativo = FALSE
    WHERE id = '$id'";

    $result = pg_query($conn,$sql);
    if (!$result) {
      $del_client = false;
      echo "Ocorreu um erro.\n";
      exit;
    }
    $del_client = true;

    return $del_client;
  }

  function edit_clients($conn, $id) {
    $sql = "SELECT pessoa.id, nome, cpf, telefone, endereco, email, senha FROM pessoa
      INNER JOIN cliente ON cliente.pessoa_id = pessoa.id
      INNER JOIN telefone_pessoa ON telefone_pessoa.pessoa_id = pessoa.id
      WHERE pessoa.id = $id";
    
    $result = pg_query($conn,$sql);
    if (!$result) {
        echo "Ocorreu um erro.\n";
        exit;
    }
    $client = pg_fetch_row($result);
    return $client;
  }

  function verify_email($conn, $email){
    $sql = "SELECT * FROM pessoa WHERE email='$email'";
    $res = pg_query($conn, $sql);
    return $res;
  }

  function verify_edit_email($conn, $email, $id_client){
    $res = pg_query($conn,("Select * from pessoa where email='$email'"));
    return $res;
  }
?>