create database db_sistema_chamado;
use db_sistema_chamado;

create table tb_usuario(
  id_usuario int auto_increment primary key,
  nm_usuario varchar(225),
  nm_email varchar(225),
  nr_senha varchar(100),
  nr_celular varchar(100),
  nm_setor varchar(50)
);


CREATE TABLE tb_type(
  id_type INT AUTO_INCREMENT PRIMARY KEY,
  nm_type VARCHAR(20)
);

INSERT INTO tb_type VALUES
  (NULL, 'Incident'),
  (NULL, 'Request');

-- CATEGORY
CREATE TABLE tb_category(
  id_category INT AUTO_INCREMENT PRIMARY KEY,
  nm_category VARCHAR(30)
);

INSERT INTO tb_category VALUES
  (NULL, 'Notebook'),
  (NULL, 'Desktop'),
  (NULL, 'Cell-Phone'),
  (NULL, 'Net-Work');

-- URGENCY
CREATE TABLE tb_urgency(
  id_urgency INT AUTO_INCREMENT PRIMARY KEY,
  nm_urgency VARCHAR(20)
);

INSERT INTO tb_urgency VALUES
  (NULL, 'Very low'),
  (NULL, 'Low'),
  (NULL, 'Medium'),
  (NULL, 'High'),
  (NULL, 'Very high');

-- CALLS
CREATE TABLE tb_call (
  cd_call INT AUTO_INCREMENT PRIMARY KEY,
  fk_type INT,
  fk_category INT,
  fk_urgency INT,
  title VARCHAR(60),
  description TEXT,

  FOREIGN KEY (fk_type) REFERENCES tb_type(id_type),
  FOREIGN KEY (fk_category) REFERENCES tb_category(id_category),
  FOREIGN KEY (fk_urgency) REFERENCES tb_urgency(id_urgency)
);