SELECT * FROM vehicule v
INNER JOIN marque m
ON m.id_marque = v.id_marque
WHERE m.id_marque = 1

SELECT * FROM vehicule v, marque m
WHERE v.id_marque = m.id_marque
WHERE m.id_marque = 1


SELECT FROM vehicule v
LEFT JOIN marque m
ON m.id_marque = v.id_marque
WHERE v.id_marque = 1


CREATE TABLE t1 (jdoc JSON);

INSERT INTO t1 VALUES('[{"toto":"tata"}]')