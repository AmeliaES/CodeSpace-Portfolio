-- Create tables for orders and order contents

CREATE TABLE IF NOT EXISTS orders (
  order_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  user_id int(10) unsigned NOT NULL,
  total decimal(8,2) NOT NULL,
  order_date datetime NOT NULL,
  PRIMARY KEY (order_id)
)  ;


CREATE TABLE IF NOT EXISTS order_contents (
  content_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  order_id int(10) unsigned NOT NULL,
  item_id int(10) unsigned NOT NULL,
  quantity int(10) unsigned NOT NULL DEFAULT '1',
  price decimal(8,2) NOT NULL,
  PRIMARY KEY (content_id)
)  ;
