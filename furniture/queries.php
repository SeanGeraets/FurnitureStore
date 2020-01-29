<?php

SELECT * FROM products WHERE LOWER(CONCAT(product_category,'', product_name,'', product_desc)) LIKE LOWER("%$search%");

//Fulltext
ALTER TABLE table_name ADD FULLTEXT(your_field);
SELECT * FROM products WHERE MATCH(product_desc) AGAINST('$search');

?>