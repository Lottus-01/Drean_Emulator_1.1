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

