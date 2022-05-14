-- Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
SELECT nombre, MAX(stock) FROM `productos`


-- Realizar una consulta que permita conocer cuál es el producto más vendido.
SELECT p.nombre, SUM(cantidad) as vendido FROM `detalle_venta` d INNER JOIN productos p ON d.id_producto = p.id GROUP BY id_producto ORDER BY vendido DESC LIMIT 1