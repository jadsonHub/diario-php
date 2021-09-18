create database user;
use user;
create table users(id int(11) primary key auto_increment not null,
     senha varchar(33) not null,
     nome varchar(255) not null,
     cep varchar(10) not null,
     bairro varchar(15) not null,
     estado varchar(2) not null,
     rua varchar(25) not null,
     email varchar(100) not null,
     cidade varchar(30) not null,
     telefone varchar(117) not null,
     login varchar(25) not null,
     token varchar(33)
     );

INSERT INTO users(nome,senha,cep,bairro,estado,rua,email,cidade,telefone,login)
VALUES("jadson",md5("1234"),"44054536","parque ipe","ba","P","txt01@gmail.com","FSA","75 9908908","jadson");


  $sql = "INSERT INTO users(nome,senha,cep,bairro,estado,rua,email,cidade,telefone,login)VALUES
        ('$nome','$senha','$cep','$bairro','$estado','$rua','$email','$cidade','$telefone','$login');
        ";
        mysqli_query($conect,$sql);

        echo  mysqli_query($conect,$sql);

        echo sleep(10);
