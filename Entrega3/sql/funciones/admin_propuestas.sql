CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
admin_propuestas(codigo_p varchar, respuesta varchar)

-- declaramos lo que retorna, en este caso un booleano
RETURNS void AS $$

-- declaramos las variables a utilizar
DECLARE
propuesta RECORD;
fpl RECORD;
v_id integer;
peso float;
compania_f varchar;
valor float;



-- RECORD es un tipo (en realidad placeholder) que permite almacenar filas
-- más información sobre variables en https://www.postgresql.org/docs/9.1/plpgsql-declarations.html

-- definimos nuestra función
BEGIN
    SELECT MAX(vuelo_id) INTO v_id FROM vuelo;

    FOR propuesta IN (SELECT * FROM dblink('dbname=grupo92e3 user=grupo92 password=grupo92 port=5432','SELECT * FROM vuelos') AS f(vuelo_id integer, codigo_v varchar, compania varchar, f_salida date, f_llegada date, aeronave varchar, aerodromo_salida integer, aerodromo_llegada integer, estado varchar))

    LOOP
        IF propuesta.codigo_v = codigo_p AND (respuesta = 'aceptado' or respuesta = 'rechazado') THEN
            FOR fpl IN (SELECT * FROM dblink('dbname=grupo92e3 user=grupo92 password=grupo92 port=5432','SELECT ruta, velocidad, altitud, c_vuelo FROM fpl') AS g(ruta integer, velocidad float, altitud float, c_vuelo varchar))
            LOOP
                IF fpl.c_vuelo = codigo_p THEN
                    v_id := v_id + 1;
                    SELECT aeronave.peso INTO peso FROM aeronave WHERE aeronave.codigo = propuesta.aeronave LIMIT 1;
                    SELECT compania.nombre INTO compania_f FROM compania WHERE compania.codigo = propuesta.compania  LIMIT 1;
                    valor := peso * 1000;
                    INSERT INTO vuelo values(v_id, propuesta.aerodromo_salida, propuesta.aerodromo_llegada, fpl.ruta, propuesta.codigo_v, propuesta.aeronave, propuesta.f_salida, propuesta.f_llegada, fpl.velocidad, fpl.altitud, respuesta, valor , compania_f);
                END IF;
            END LOOP;
        END IF;   
    END LOOP;





-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql