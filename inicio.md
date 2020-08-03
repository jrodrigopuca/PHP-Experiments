# Intro
PHP: Lenguaje de programación web interpretado de licencia OpenSource altamente usado en todo el mundo.

# PHP con MS Azure
### php with azure websites: 
solo configurar php
- sitios web/nuevo(rápido/personalizada*/de galeria)/Form


### php with VM 
configurar en s.o
- proceso>maquina virtual>de la galeria>ubuntu server 12.04LTS
- Extremos: ssh22 (conexión remota) http 80
- Instalación

	```$ sudo apt-get install apache2 mysql-server php5 php5-mysql```
- para ver el process id (pid) de apache
	
  ```$ sudo service apache2 status```
- para ver carpeta web
	
  ```$ cd /var/www/ ```
  
	```$ sudo nano hola.php```
- para acceder a la base de datos
	``` 
  mysql -u root -p
	mysql> create database ejemplo;
	mysql> use ejemplo
	>create table personas (id int into_autoincrement, nombre varchar(255), constraint id_pk primary key(id));

	>select * from personas
  ```