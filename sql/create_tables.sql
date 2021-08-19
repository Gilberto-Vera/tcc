-- -----------------------------------------------------
-- Table "pessoa"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "pessoa" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(100) NOT NULL,
  "email" VARCHAR(45) NOT NULL,
  "senha" VARCHAR(45) NOT NULL,
  PRIMARY KEY ("id"))
;

CREATE UNIQUE INDEX IF NOT EXISTS "email_UNIQUE1" ON "pessoa" ("email" ASC);

-- -----------------------------------------------------
-- Table "administrador"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "administrador" (
  "id" SERIAL NOT NULL,
  "pessoa_id" INT NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_administrador_pessoa"
    FOREIGN KEY ("pessoa_id")
      REFERENCES "pessoa" ("id"))
;


-- -----------------------------------------------------
-- Table "cliente"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "cliente" (
  "id" SERIAL NOT NULL,
  "pessoa_id" INT NOT NULL,
  "endereco" VARCHAR(100) NOT NULL,
  "cpf" VARCHAR(45) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_cliente_pessoa"
    FOREIGN KEY ("pessoa_id")
      REFERENCES "pessoa" ("id"))
;


-- -----------------------------------------------------
-- Table "evento"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "evento" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "data" TIMESTAMP NOT NULL,
  "num_convidados" INT NOT NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "cliente_evento"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "cliente_evento" (
  "id" SERIAL NOT NULL,
  "cliente_id" INT NOT NULL,
  "evento_id" INT NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_cliente_evento_cliente"
    FOREIGN KEY ("cliente_id")
      REFERENCES "cliente" ("id"),
  CONSTRAINT "fk_cliente_evento_evento"
    FOREIGN KEY ("evento_id")
      REFERENCES "evento" ("id"))
;


-- -----------------------------------------------------
-- Table "convidado"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "convidado" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "num_acompanhantes" INT NOT NULL,
  "email" VARCHAR(45) NOT NULL,
  PRIMARY KEY ("id"))
;

CREATE UNIQUE INDEX IF NOT EXISTS "email_UNIQUE2" ON "convidado" ("email" ASC);

-- -----------------------------------------------------
-- Table "convidado_evento"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "convidado_evento" (
  "id" SERIAL NOT NULL,
  "evento_id" INT NOT NULL,
  "convidado_id" INT NOT NULL,
  "situacao" BOOLEAN NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_convidado_evento_evento"
    FOREIGN KEY ("evento_id")
      REFERENCES "evento" ("id"),
  CONSTRAINT "fk_convidado_evento_convidado"
    FOREIGN KEY ("convidado_id")
      REFERENCES "convidado" ("id"))
;


-- -----------------------------------------------------
-- Table "fornecedor"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "fornecedor" (
  "id" SERIAL NOT NULL,
  "cnpj" VARCHAR(18) NULL,
  "razao_social" VARCHAR(100) NULL,
  "nome_fantasia" VARCHAR(45) NOT NULL,
  "endereco" VARCHAR(100) NOT NULL,
  "Contato" VARCHAR(45) NOT NULL,
  "email" VARCHAR(45) NOT NULL,
  PRIMARY KEY ("id"))
;

CREATE UNIQUE INDEX IF NOT EXISTS "cnpj_UNIQUE" ON "fornecedor" ("cnpj" ASC);
CREATE UNIQUE INDEX IF NOT EXISTS "email_UNIQUE3" ON "fornecedor" ("email" ASC);


-- -----------------------------------------------------
-- Table "log"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "log" (
  "id" SERIAL NOT NULL,
  "usuario" VARCHAR(45) NOT NULL,
  "data" TIMESTAMP NOT NULL,
  "acao" TEXT NOT NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "modelo_roteiro"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "modelo_roteiro" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "horario" VARCHAR(15) NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "modelo_sequencia"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "modelo_sequencia" (
  "id" SERIAL NOT NULL,
  "modelo_roteiro_id" INT NOT NULL,
  "descricao" VARCHAR(45) NOT NULL,
  "ordem" INT NOT NULL,
  "observacao" TEXT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_modelo_sequencia_modelo_roteiro"
    FOREIGN KEY ("modelo_roteiro_id")
      REFERENCES "modelo_roteiro" ("id"))
;

CREATE UNIQUE INDEX IF NOT EXISTS "ordem_UNIQUE1" ON "modelo_sequencia" ("ordem" ASC);

-- -----------------------------------------------------
-- Table "servico"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "servico" (
  "id" SERIAL NOT NULL,
  "servico" VARCHAR(40) NOT NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "parceiro"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "parceiro" (
  "id" SERIAL NOT NULL,
  "evento_id" INT NOT NULL,
  "fornecedor_id" INT NOT NULL,
  "servico_id" INT NOT NULL,
  "num_colaboradores" INT NOT NULL,
  "situacao" BOOLEAN NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_parceiro_evento"
    FOREIGN KEY ("evento_id")
      REFERENCES "evento" ("id"),
  CONSTRAINT "fk_parceiro_fornecedor"
    FOREIGN KEY ("fornecedor_id")
      REFERENCES "fornecedor" ("id"),
  CONSTRAINT "fk_parceiro_servico"
    FOREIGN KEY ("servico_id")
      REFERENCES "servico" ("id"))
;


-- -----------------------------------------------------
-- Table "roteiro"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "roteiro" (
  "id" SERIAL NOT NULL,
  "evento_id" INT NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "horario" VARCHAR(15) NULL,
  "situacao" BOOLEAN NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_roteiro_evento"
    FOREIGN KEY ("evento_id")
      REFERENCES "evento" ("id"))
;


-- -----------------------------------------------------
-- Table "sequencia"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "sequencia" (
  "id" SERIAL NOT NULL,
  "roteiro_id" INT NOT NULL,
  "descricao" VARCHAR(45) NOT NULL,
  "ordem" INT NOT NULL,
  "observacao" TEXT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_sequencia_roteiro"
    FOREIGN KEY ("roteiro_id")
      REFERENCES "roteiro" ("id"))
;

CREATE UNIQUE INDEX IF NOT EXISTS "ordem_UNIQUE2" ON "sequencia" ("ordem" ASC);


-- -----------------------------------------------------
-- Table "servico_fornecedor"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "servico_fornecedor" (
  "id" SERIAL NOT NULL,
  "fornecedor_id" INT NOT NULL,
  "servico_id" INT NOT NULL,
  "principal" BOOLEAN NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_servico_fornecedor_servico"
    FOREIGN KEY ("servico_id")
      REFERENCES "servico" ("id"),
  CONSTRAINT "fk_servico_fornecedor_fornecedor"
    FOREIGN KEY ("fornecedor_id")
      REFERENCES "fornecedor" ("id"))
;


-- -----------------------------------------------------
-- Table "situacao"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "situacao" (
  "id" SERIAL NOT NULL,
  "evento_id" INT NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "observacao" TEXT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_situacao_evento"
    FOREIGN KEY ("evento_id")
      REFERENCES "evento" ("id"))
;


-- -----------------------------------------------------
-- Table "telefone_convidado"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "telefone_convidado" (
  "id" SERIAL NOT NULL,
  "convidado_id" INT NOT NULL,
  "telefone" VARCHAR(14) NOT NULL,
  "principal" BOOLEAN NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_telefone_convidado_convidado"
    FOREIGN KEY ("convidado_id")
      REFERENCES "convidado" ("id"))
;


-- -----------------------------------------------------
-- Table "telefone_fornecedor"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "telefone_fornecedor" (
  "id" SERIAL NOT NULL,
  "fornecedor_id" INT NOT NULL,
  "descricao" VARCHAR(45) NULL,
  "telefone" VARCHAR(14) NOT NULL,
  "principal" BOOLEAN NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_telefone_fornecedor_fornecedor"
    FOREIGN KEY ("fornecedor_id")
      REFERENCES "fornecedor" ("id"))
;


-- -----------------------------------------------------
-- Table "telefone_pessoa"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "telefone_pessoa" (
  "id" SERIAL NOT NULL,
  "pessoa_id" INT NOT NULL,
  "telefone" VARCHAR(14) NOT NULL,
  "principal" BOOLEAN NOT NULL,
  "descricao" VARCHAR(45) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_telefone_pessoa_pessoa"
    FOREIGN KEY ("pessoa_id")
      REFERENCES "pessoa" ("id"))
;


-- -----------------------------------------------------
-- Table "usuario"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "usuario" (
  "id" SERIAL NOT NULL,
  "pessoa_id" INT NOT NULL,
  "funcao" VARCHAR(45) NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_usuario_pessoa"
    FOREIGN KEY ("pessoa_id")
      REFERENCES "pessoa" ("id"))
;


-- -----------------------------------------------------
-- Table "usuario_evento"
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS "usuario_evento" (
  "id" SERIAL NOT NULL,
  "usuario_id" INT NOT NULL,
  "evento_id" INT NOT NULL,
  PRIMARY KEY ("id"),
  CONSTRAINT "fk_usuario_evento_usuario"
    FOREIGN KEY ("usuario_id")
      REFERENCES "usuario" ("id"),
  CONSTRAINT "fk_usuario_evento_evento"
    FOREIGN KEY ("evento_id")
      REFERENCES "evento" ("id"))
;

CREATE OR REPLACE FUNCTION inserir_dados() RETURNS void AS
$$
BEGIN
  IF (SELECT COUNT(*) FROM pessoa) = 0 THEN
    -- -----------------------------------------------------
    -- Insert "administrador"
    -- -----------------------------------------------------
    INSERT INTO pessoa (id, nome, email, senha)
      VALUES (default, 'admin', 'admin@admin', 'admin');

    INSERT INTO administrador (id, pessoa_id)
      VALUES (default, 1);

    -- -----------------------------------------------------
    -- Insert "cliente"
    -- -----------------------------------------------------
    INSERT INTO pessoa (id, nome, email, senha)
      VALUES (default, 'Tiger Nixon', 'Edinburgh@seila.com', 61),
        (default, 'Garrett Winters', 'Accountant@seila.com', 63),
        (default, 'Ashton Cox', 'Author@seila.com', 66),
        (default, 'Cedric Kelly', 'Developer@seila.com', 22),
        (default, 'Airi Satou', 'Senior@seila.com', 33),
        (default, 'Brielle Williamson', 'Williamson@seila.com', 61),
        (default, 'Herrod Chandler', 'Chandler@seila.com', 59),
        (default, 'Rhona Davidson', 'Davidson@seila.com', 55),
        (default, 'Colleen Hurst', 'Hurst@seila.com', 39),
        (default, 'Sonya Frost', 'Frost@seila.com', 23),
        (default, 'Jena Gaines', 'Gaines@seila.com', 30),
        (default, 'Quinn Flynn', 'Flynn@seila.com', 24),
        (default, 'Charde Marshall', 'Marshall@seila.com', 36),
        (default, 'Haley Kennedy', 'Kennedy@seila.com', 43),
        (default, 'Tatyana Fitzpatrick', 'Fitzpatrick@seila.com', 19),
        (default, 'Michael Silva', 'Silva@seila.com', 66),
        (default, 'Paul Byrd', 'Byrd@seila.com', 64),
        (default, 'Gloria Little', 'Little@seila.com', 59),
        (default, 'Bradley Greer', 'Greer@seila.com', 41),
        (default, 'Dai Rios', 'Rios@seila.com', 35)
    ;
  END IF;

  IF (SELECT COUNT(*) FROM evento) = 0 THEN
    -- -----------------------------------------------------
    -- Insert "evento"
    -- -----------------------------------------------------
    INSERT INTO evento (id, nome, data, num_convidados)
      VALUES (default, 'Inicial', '1979-03-28 23:57:02', 1)
    ;
  END IF;

  IF (SELECT COUNT(*) FROM situacao) = 0 THEN
    -- -----------------------------------------------------
    -- Insert "situacao"
    -- -----------------------------------------------------
    INSERT INTO situacao (id, evento_id, nome, Observacao)
      VALUES (default, 1, 'Iniciado', ''),
        (default, 1, 'Confirmado', ''),
        (default, 1, 'Finalizado', ''),
        (default, 1, 'Bloqueado', ''),
        (default, 1, 'Cancelado', '')
    ;
  END IF;
END
$$ LANGUAGE plpgsql;

SELECT inserir_dados();

DROP FUNCTION inserir_dados;
