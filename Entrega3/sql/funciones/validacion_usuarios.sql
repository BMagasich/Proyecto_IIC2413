CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
validacion_usuarios(v_nombre varchar, v_contrasena varchar, OUT tipo_r varchar) AS $$

-- declaramos las variables a utilizar
DECLARE

tupla1 RECORD;
tupla2 RECORD;
contador integer;

-- RECORD es un tipo (en realidad placeholder) que permite almacenar filas
-- más información sobre variables en https://www.postgresql.org/docs/9.1/plpgsql-declarations.html

-- definimos nuestra función
BEGIN
    contador := 0;
    FOR tupla1 IN (SELECT * FROM dblink('dbname=grupo25e3 user=grupo25 password=grupo25 port=5432','SELECT username, contraseña, tipo FROM usuarios') AS f(username varchar, contrasena varchar, tipo varchar))

    LOOP
        IF tupla1.username = v_nombre AND tupla1.contrasena = v_contrasena THEN
            contador := contador + 1;
            tipo_r := tupla1.tipo;
            -- SELECT tipo INTO tipo_r FROM usuarios WHERE usuarios.contraseña = tupla1.contrasena AND usuarios.username = tupla1.username; 
        END IF;
    END LOOP;

    IF contador = 0 THEN
        RAISE EXCEPTION 'Datos invalidos';
    END IF;



-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql