INSERT INTO categories (name) --1
VALUES ('Доски и лыжи');
INSERT INTO categories (name) --2
VALUES ('Крепления');
INSERT INTO categories (name) --3
VALUES ('Ботинки');
INSERT INTO categories (name) --4
VALUES ('Одежда');
INSERT INTO categories (name) --5
VALUES ('Инструменты');
INSERT INTO categories (name) --6
VALUES ('Разное');


INSERT INTO users (email, password, avatar, info)
VALUES ('firstmail@mail.ru', '123456', '', 'telephone: 89512354897', , );
INSERT INTO users (email, password, avatar, info, lots_id, rates_id)
VALUES ('secondmail@yandex.ru', '654321', '', 'telephone: 89563214250', , );


INSERT INTO lots (lotname, description, image, cost, ratestep, user_id, winner_id, categorie_id)
VALUES ('2014 Rossignol District Snowboard', 'Snowboard', 'img/lot-1.jpg', 10999, 500, 1, , 1);
INSERT INTO lots (lotname, description, image, cost, ratestep, user_id, winner_id, categorie_id)
VALUES ('DC Ply Mens 2016/2017 Snowboard', 'Snowboard', 'img/lot-2.jpg', 159999, 1000, 1, , 1);
INSERT INTO lots (lotname, description, image, cost, ratestep, user_id, winner_id, categorie_id)
VALUES ('Крепления Union Contact Pro 2015 года размер L/XL', 'Mounts', 'img/lot-3.jpg', 8000, 1000, 1, , 2);
INSERT INTO lots (lotname, description, image, cost, ratestep, user_id, winner_id, categorie_id)
VALUES ('Ботинки для сноуборда DC Mutiny Charocal', 'Boots', 'img/lot-4.jpg', 10999, 600, 2, , 3);
INSERT INTO lots (lotname, description, image, cost, ratestep, user_id, winner_id, categorie_id)
VALUES ('Куртка для сноуборда DC Mutiny Charocal', 'Jacket', 'img/lot-5.jpg', 7500, 500, 2, , 4);
INSERT INTO lots (lotname, description, image, cost, ratestep, user_id, winner_id, categorie_id)
VALUES ('Маска Oakley Canopy', 'Mask', 'img/lot-6.jpg', 5400, 200, 2, , 6);


INSERT INTO rates (ratecost, user_id, lot_id) --6
VALUES ( 2000, 2, 2);
INSERT INTO rates (ratecost, user_id, lot_id) --6
VALUES ( 800, 1, 6);




SELECT * FROM categories; --получаем все категории

SELECT * FROM lots
WHERE enddate < NOW(); 	  --получить самые новые, открытые лоты

SELECT l.id, lotname, name FROM lots l     --показать лот по его id и получить также название категории, к которой принадлежит лот
JOIN categories c
ON l.categorie_id = c.id;

UPDATE lots SET lotname = ''  --обновить название лота по его идентификатору
WHERE id = ;

SELECT IDENT_CURRENT('rates');	--получить список самых свежих ставок для лота по его идентификатору