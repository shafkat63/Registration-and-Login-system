SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
   `id` int(11) NOT NULL,
  `userId` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `password` VARCHAR(500) NOT NULL,
  `userType` VARCHAR(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);


 ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;