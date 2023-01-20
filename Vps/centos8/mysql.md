CREATE USER 'hoangtu'@'localhost' IDENTIFIED WITH authentication_plugin BY 'password';

CREATE USER 'hoangtu'@'localhost' IDENTIFIED BY 'password';

GRANT PRIVILEGE ON database.table TO 'hoangtu'@'localhost';

GRANT ALL PRIVILEGES ON *.* TO 'hoangtu'@'localhost' WITH GRANT OPTION;
