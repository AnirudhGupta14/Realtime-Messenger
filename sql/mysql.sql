CREATE DATABASE messenger;

USE messenger;

CREATE TABLE `users` 
(
  `user_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
)

CREATE TABLE `messages`
(
  `msg_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) 
