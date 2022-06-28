CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
crear_usuarios()

-- declaramos lo que retorna, en este caso un booleano
RETURNS void AS $$

-- declaramos las variables a utilizar
DECLARE

tupla1 RECORD;
id integer;
password1 varchar;
tupla2 RECORD;
password2 varchar;

-- RECORD es un tipo (en realidad placeholder) que permite almacenar filas
-- más información sobre variables en https://www.postgresql.org/docs/9.1/plpgsql-declarations.html

-- definimos nuestra función
BEGIN
    id := 1;
    INSERT INTO usuarios values(id, 'DGAC', 'admin', 'Admin DGAC');
    id := id + 1;

    FOR tupla1 IN (SELECT * FROM dblink('dbname=grupo25e3 user=grupo25 password=grupo25 port=5432','SELECT codigo FROM compania') AS f(codigo varchar))

    LOOP
        password1 := substr(md5(random()::text), 0, 9);
        INSERT INTO usuarios values(id, tupla1.codigo, password1, 'Compañia Aerea');
        id := id + 1;
    END LOOP;

    FOR tupla2 IN (SELECT * FROM dblink('dbname=grupo25e3 user=grupo25 password=grupo25 port=5432','SELECT nombre, pasaporte FROM pasajero') AS g(nombre varchar, pasaporte varchar))

    LOOP
        password2 := concat(substr(tupla2.nombre, 0, 4) ,substr(tupla2.pasaporte, 7, 8) ,substr(md5(random()::text), 0, 3));
        INSERT INTO usuarios values(id, tupla2.pasaporte, password2, 'Pasajero');
        id := id + 1;
    END LOOP;


-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql