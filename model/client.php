<?php
  function insert_client($conn, $data){
    //insere os dados na tabela pessoa
    $sql = "INSERT INTO pessoa (id, nome, email, senha)
      VALUES (default, '$data[nome]', '$data[email]', '$data[senha]')
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

  function getClients($conn) {
    $sql = "SELECT pessoa.id, nome, telefone, email FROM pessoa
      INNER JOIN telefone_pessoa ON pessoa_id = pessoa.id";
    
    $result = pg_query($conn,$sql);
    if (!$result) {
        echo "Ocorreu um erro.\n";
        exit;
    }
    $clients = pg_fetch_all($result);
    
    return $clients;
  }
?>