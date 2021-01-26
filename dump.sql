CREATE DATABASE IF NOT EXISTS `netpeak` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `netpeak`;

CREATE TABLE `user` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя пользователя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Пользователи';

CREATE TABLE `goods` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'название товар',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'изображение',
  `price` int(11) DEFAULT NULL COMMENT 'средняя цена',
  `insert_date` date COMMENT 'дата добавления',
  `user_id` int(11) DEFAULT NULL COMMENT 'id пользователя',
     FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Товары';

CREATE TABLE `reviews` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `goods_id` int(11) DEFAULT NULL COMMENT 'id товара',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'имя добавившего отзыв',
  `rating` TINYINT DEFAULT NULL COMMENT 'Оценка товара',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'комментарий',
  `insert_date` date COMMENT 'дата добавления',
   FOREIGN KEY (goods_id) REFERENCES goods(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Отзывы';


INSERT INTO `user` (`username`) VALUES
('Администратор'),
('Пользователь 1'),
('Пользователь 2');


INSERT INTO `goods` (`description`, `img`, `insert_date`, `user_id`) VALUES
('Телевизор', 'https://images.samsung.com/is/image/samsung/ua-fhdtv-n5300-ue43n5300auxua-frontblack-107349809?$720_576_PNG$', '2021-01-22', 1),
('Смартфон', 'https://www.toughgadget.com/wp-content/uploads/2016/06/cat-s60-rugged-waterproof-smartphone.png', '2021-01-05', 2);


INSERT INTO `reviews` (`goods_id`, `name`, `rating`, `comment`, `insert_date`) VALUES
(2, 'Дмитрий', 9, 'Хороший смартфон. Плохо держит батарею.', '2021-01-24'),
(1, 'Вячеслав', 5, 'Среднее качество. Низкая цена.', '2021-01-22');
