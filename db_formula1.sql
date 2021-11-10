create database formula_1;
CREATE TABLE IF NOT EXISTS tb_paises(
  cod_pais CHAR(3) PRIMARY KEY NOT NULL,
  nome_pais VARCHAR(45) NOT NULL);


CREATE TABLE IF NOT EXISTS tb_equipes(
  id_equipe CHAR(2) PRIMARY KEY NOT NULL,
  nome_equipe VARCHAR(45) NOT NULL,
  paises_cod_pais CHAR(3) NOT NULL,
  INDEX fk_equipes_paises_idx (paises_cod_pais ASC) VISIBLE,
  CONSTRAINT fk_equipes_paises
    FOREIGN KEY (paises_cod_pais)
    REFERENCES tb_paises (cod_pais));


CREATE TABLE IF NOT EXISTS tb_pilotos (
  numero_piloto INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome_piloto VARCHAR(45) NOT NULL,
  equipes_id_equipe CHAR(2) NOT NULL,
  paises_cod_pais CHAR(3) NOT NULL,
  INDEX fk_pilotos_equipes1_idx (equipes_id_equipe ASC) VISIBLE,
  INDEX fk_pilotos_paises1_idx (paises_cod_pais ASC) VISIBLE,
  CONSTRAINT fk_pilotos_equipes1
    FOREIGN KEY (equipes_id_equipe)
    REFERENCES tb_equipes (id_equipe),
  CONSTRAINT fk_pilotos_paises1
    FOREIGN KEY (paises_cod_pais)
    REFERENCES tb_paises (cod_pais));


CREATE TABLE IF NOT EXISTS tb_corridas (
  id_gp INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome_gp VARCHAR(45) NOT NULL,
  quantidade_voltas INT NOT NULL,
  paises_cod_pais CHAR(3) NOT NULL,
  INDEX fk_corridas_paises1_idx (paises_cod_pais ASC) VISIBLE,
  CONSTRAINT fk_corridas_paises1
    FOREIGN KEY (paises_cod_pais)
    REFERENCES tb_paises (cod_pais));


CREATE TABLE IF NOT EXISTS tb_participantes (
  posicao_largada VARCHAR(3) NOT NULL,
  pilotos_numero_piloto INT NOT NULL,
  corridas_id_gp INT NOT NULL,
  INDEX fk_participantes_pilotos1_idx (pilotos_numero_piloto ASC) VISIBLE,
  INDEX fk_participantes_corridas1_idx (corridas_id_gp ASC) VISIBLE,
  CONSTRAINT fk_participantes_pilotos1
    FOREIGN KEY (pilotos_numero_piloto)
    REFERENCES tb_pilotos (numero_piloto),
  CONSTRAINT fk_participantes_corridas1
    FOREIGN KEY (corridas_id_gp)
    REFERENCES tb_corridas (id_gp));


CREATE TABLE IF NOT EXISTS tb_resultados (
  posicao_chegada VARCHAR(3) NOT NULL,
  tempo_corrida VARCHAR(45) NOT NULL,
  pontuacao VARCHAR(45) NOT NULL,
  numero_piloto INT NOT NULL,
  id_gp INT NOT NULL,
  INDEX numero_piloto_idx (numero_piloto ASC) VISIBLE,
  INDEX id_gp_idx (id_gp ASC) VISIBLE,
  CONSTRAINT numero_piloto
    FOREIGN KEY (numero_piloto)
    REFERENCES tb_participantes (pilotos_numero_piloto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT id_gp
    FOREIGN KEY (id_gp)
    REFERENCES tb_participantes (corridas_id_gp));


CREATE TABLE IF NOT EXISTS tb_voltas (
  numero_voltas INT PRIMARY KEY NOT NULL,
  tempo TIME NOT NULL,
  numero_piloto INT NOT NULL,
  id_gp INT NOT NULL,
  INDEX numero_piloto_idx (numero_piloto ASC) VISIBLE,
  INDEX id_gp_idx (id_gp ASC) VISIBLE,
  CONSTRAINT numero_piloto1
    FOREIGN KEY (numero_piloto)
    REFERENCES tb_participantes (pilotos_numero_piloto),
  CONSTRAINT id_gp1
    FOREIGN KEY (id_gp)
    REFERENCES tb_participantes (corridas_id_gp));
    

INSERT INTO tb_paises VALUES ('EUA', 'Estados Unidos');
INSERT INTO tb_paises VALUES ('JAP', 'Japão');
INSERT INTO tb_paises VALUES ('BRA', 'Brasil');
INSERT INTO tb_paises VALUES ('ITA', 'Itália');
INSERT INTO tb_paises VALUES ('UK', 'Reino Unido');
INSERT INTO tb_paises VALUES ('FRA', 'França');
INSERT INTO tb_paises VALUES ('FIN', 'Finlândia');
INSERT INTO tb_paises VALUES ('ALE', 'Alemanha');
INSERT INTO tb_paises VALUES ('MON', 'Mônaco');
INSERT INTO tb_paises VALUES ('HUN', 'Hungria');

/*parei de inserir aqui */

INSERT INTO tb_equipes VALUES ('01', 'Ferrari', '01');
INSERT INTO tb_equipes VALUES ('02', 'McLaren', 'BRA');
INSERT INTO tb_equipes VALUES ('03', 'Benetton', 'UK');
INSERT INTO tb_equipes VALUES ('04', 'Williams', 'UK');
INSERT INTO tb_equipes VALUES ('05', '', '');
INSERT INTO tb_equipes VALUES ('06', '', '');
INSERT INTO tb_equipes VALUES ('07', '', '');
INSERT INTO tb_equipes VALUES ('08', '', '');