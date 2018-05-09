create database test_api;
grant all privileges on test_api.* to test_api@localhost identified by 'dk39aks3';
flush privileges;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL UNIQUE,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into users(`email`, `name`, `address`, `tel`, `created`) VALUES
('test1@example.com', 'test 1 name', 'test 1 address', '000-111-222', '2018-05-09 10:06:00'),
('test2@example.com', 'test 2 name', 'test 2 address', '000-111-222', '2018-05-09 10:06:00'),
('test3@example.com', 'test 3 name', 'test 3 address', '000-111-222', '2018-05-09 10:06:00');