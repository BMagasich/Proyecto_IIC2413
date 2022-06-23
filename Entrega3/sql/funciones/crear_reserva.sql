CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
crear_reserva(id integer, pasaporte_comprador varchar, pasaporte1 varchar, pasaporte2 varchar, pasaporte3 varchar)

-- declaramos lo que retorna, en este caso un booleano
RETURNS void AS $$

-- declaramos las variables a utilizar
DECLARE

vuelo_r RECORD;
contador integer;
n_ticket integer;
r_id integer;

tupla1 RECORD;
tupla_vuelo1 RECORD;
contador1 integer;
tope1 integer;

tupla_vuelo2 RECORD;
contador2 integer;
tope2 integer;

tupla_vuelo3 RECORD;
contador3 integer;
tope3 integer;

-- RECORD es un tipo (en realidad placeholder) que permite almacenar filas
-- más información sobre variables en https://www.postgresql.org/docs/9.1/plpgsql-declarations.html

-- definimos nuestra función
BEGIN
    SELECT * INTO vuelo_r FROM vuelo WHERE vuelo_id = id LIMIT 1;
    SELECT MAX(numero) INTO n_ticket FROM ticket;
    SELECT MAX(reserva_id) INTO r_id FROM reserva;
    r_id := r_id + 1;
    contador := 0;
    contador1 := 0;
    tope1 := 0;
    contador2 := 0;
    tope2 := 0;
    contador3 := 0;
    tope3 := 0;

    FOR tupla1 IN (SELECT * FROM dblink('dbname=grupo25e3 user=grupo25 password=grupo25 port=5432','SELECT pasaporte FROM pasajero') AS f(pasaporte varchar))

    LOOP

        IF pasaporte1 IS NOT NULL THEN
            contador := contador + 1;
            IF pasaporte1 = tupla1.pasaporte THEN
                contador1 := contador1 + 1;
                
                FOR tupla_vuelo1 IN (
                    SELECT fecha_salida, fecha_llegada FROM ticket JOIN vuelo ON ticket.vuelo_id = vuelo.vuelo_id WHERE pasaporte_pasajero = pasaporte1
                )

                LOOP
                    IF CAST(vuelo_r.fecha_salida AS date) >= CAST(tupla_vuelo1.fecha_salida AS date) and CAST(vuelo_r.fecha_salida AS date) <= CAST(tupla_vuelo1.fecha_llegada AS date) THEN
                        RAISE EXCEPTION 'No se puede realizar una reserva con tope de horarios';
                        tope1 := tope1 + 1;
                    END IF;
                END LOOP;

                IF tope1 = 0 THEN
                    n_ticket := n_ticket + 1
                    INSERT INTO reserva values(r_id, r_id, n_ticket, pasaporte_comprador);
                    INSERT INTO ticket values(n_ticket, pasaporte1, vuelo_r.vuelo_id, 1, 'Economica', 'Falso');
                END IF;


            END IF;
        END IF;

        IF pasaporte2 IS NOT NULL THEN
            contador := contador + 1;
            IF pasaporte2 = tupla1.pasaporte THEN
                contador2 := contador2 + 1;
                
                FOR tupla_vuelo2 IN (
                    SELECT fecha_salida, fecha_llegada FROM ticket JOIN vuelo ON ticket.vuelo_id = vuelo.vuelo_id WHERE pasaporte_pasajero = pasaporte2
                )

                LOOP
                    IF CAST(vuelo_r.fecha_salida AS date) >= CAST(tupla_vuelo2.fecha_salida AS date) and CAST(vuelo_r.fecha_salida AS date) <= CAST(tupla_vuelo2.fecha_llegada AS date) THEN
                        RAISE EXCEPTION 'No se puede realizar una reserva con tope de horarios';
                        tope2 := tope2 + 1;
                    END IF;
                END LOOP;

                IF tope2 = 0 THEN
                    n_ticket := n_ticket + 1
                    INSERT INTO reserva values(r_id, r_id, n_ticket, pasaporte_comprador);
                    INSERT INTO ticket values(n_ticket, pasaporte2, vuelo_r.vuelo_id, 2, 'Economica', 'Falso');
                END IF;
            END IF;
        END IF;

        IF pasaporte3 IS NOT NULL THEN
            contador := contador + 1;
            IF pasaporte3 = tupla1.pasaporte THEN
                contador3 := contador3 + 1;
                
                FOR tupla_vuelo3 IN (
                    SELECT fecha_salida, fecha_llegada FROM ticket JOIN vuelo ON ticket.vuelo_id = vuelo.vuelo_id WHERE pasaporte_pasajero = pasaporte3
                )

                LOOP
                    IF CAST(vuelo_r.fecha_salida AS date) >= CAST(tupla_vuelo3.fecha_salida AS date) and CAST(vuelo_r.fecha_salida AS date) <= CAST(tupla_vuelo3.fecha_llegada AS date) THEN
                        RAISE EXCEPTION 'No se puede realizar una reserva con tope de horarios';
                        tope3 := tope3 + 1;
                    END IF;
                END LOOP;

                IF tope3 = 0 THEN
                    n_ticket := n_ticket + 1
                    INSERT INTO reserva values(r_id, r_id, n_ticket, pasaporte_comprador);
                    INSERT INTO ticket values(n_ticket, pasaporte3, vuelo_r.vuelo_id, 3, 'Economica', 'Falso');
                END IF;
            END IF;
        END IF;
    END LOOP;
    IF contador1 = 0 THEN
        RAISE EXCEPTION 'No se puede realizar una reserva con pasaporte invalido';
    END IF;
    IF contador2 = 0 THEN
        RAISE EXCEPTION 'No se puede realizar una reserva con pasaporte invalido';
    END IF;
    IF contador3 = 0 THEN
        RAISE EXCEPTION 'No se puede realizar una reserva con pasaporte invalido';
    END IF;
    IF contador = 0 THEN
        RAISE EXCEPTION 'No se puede realizar una reserva sin ingresar pasaporte';
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql