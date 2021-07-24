-- -----------------------------------------------------
-- Table "pessoa"
-- -----------------------------------------------------
CREATE TABLE "pessoa" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(100) NOT NULL,
  "senha" VARCHAR(45) NOT NULL,
  "email" VARCHAR(45) NOT NULL,
  PRIMARY KEY ("id"))
;

CREATE UNIQUE INDEX "email_UNIQUE1" ON "pessoa" ("email" ASC);

-- -----------------------------------------------------
-- Table "administrador"
-- -----------------------------------------------------
CREATE TABLE "administrador" (
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
CREATE TABLE "cliente" (
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
CREATE TABLE "evento" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "data" TIMESTAMP NOT NULL,
  "num_convidados" INT NOT NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "cliente_evento"
-- -----------------------------------------------------
CREATE TABLE "cliente_evento" (
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
CREATE TABLE "convidado" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "num_acompanhantes" INT NOT NULL,
  "email" VARCHAR(45) NOT NULL,
  PRIMARY KEY ("id"))
;

CREATE UNIQUE INDEX "email_UNIQUE2" ON "convidado" ("email" ASC);

-- -----------------------------------------------------
-- Table "convidado_evento"
-- -----------------------------------------------------
CREATE TABLE "convidado_evento" (
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
CREATE TABLE "fornecedor" (
  "id" SERIAL NOT NULL,
  "cnpj" VARCHAR(18) NULL,
  "razao_social" VARCHAR(100) NULL,
  "nome_fantasia" VARCHAR(45) NOT NULL,
  "endereco" VARCHAR(100) NOT NULL,
  "Contato" VARCHAR(45) NOT NULL,
  "email" VARCHAR(45) NOT NULL,
  PRIMARY KEY ("id"))
;

CREATE UNIQUE INDEX "cnpj_UNIQUE" ON "fornecedor" ("cnpj" ASC);
CREATE UNIQUE INDEX "email_UNIQUE3" ON "fornecedor" ("email" ASC);


-- -----------------------------------------------------
-- Table "log"
-- -----------------------------------------------------
CREATE TABLE "log" (
  "id" SERIAL NOT NULL,
  "usuario" VARCHAR(45) NOT NULL,
  "data" TIMESTAMP NOT NULL,
  "acao" TEXT NOT NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "modelo_roteiro"
-- -----------------------------------------------------
CREATE TABLE "modelo_roteiro" (
  "id" SERIAL NOT NULL,
  "nome" VARCHAR(45) NOT NULL,
  "horario" VARCHAR(15) NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "modelo_sequencia"
-- -----------------------------------------------------
CREATE TABLE "modelo_sequencia" (
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

CREATE UNIQUE INDEX "ordem_UNIQUE1" ON "modelo_sequencia" ("ordem" ASC);

-- -----------------------------------------------------
-- Table "servico"
-- -----------------------------------------------------
CREATE TABLE "servico" (
  "id" SERIAL NOT NULL,
  "servico" VARCHAR(40) NOT NULL,
  PRIMARY KEY ("id"))
;


-- -----------------------------------------------------
-- Table "parceiro"
-- -----------------------------------------------------
CREATE TABLE "parceiro" (
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
CREATE TABLE "roteiro" (
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
CREATE TABLE "sequencia" (
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

CREATE UNIQUE INDEX "ordem_UNIQUE2" ON "sequencia" ("ordem" ASC);


-- -----------------------------------------------------
-- Table "servico_fornecedor"
-- -----------------------------------------------------
CREATE TABLE "servico_fornecedor" (
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
CREATE TABLE "situacao" (
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
CREATE TABLE "telefone_convidado" (
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
CREATE TABLE "telefone_fornecedor" (
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
CREATE TABLE "telefone_pessoa" (
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
CREATE TABLE "usuario" (
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
CREATE TABLE "usuario_evento" (
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

-- -----------------------------------------------------
-- Insert "administrador"
-- -----------------------------------------------------
INSERT INTO pessoa (id, nome, senha, email)
  VALUES (default, 'admin', 'admin', 'admin@admin')
;

INSERT INTO administrador (id, pessoa_id)
  VALUES (default, 1)
;

-- -----------------------------------------------------
-- Insert "situacao"
-- -----------------------------------------------------

INSERT INTO evento (id, nome, data, num_convidados)
  VALUES (default, 'Inical', '1979-03-28 23:57:02', 1)
;


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