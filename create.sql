CREATE TABLE `choices` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `question_number` int(11) NOT NULL,
 `is_correct` tinyint(1) NOT NULL DEFAULT '0',
 `text` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1

CREATE TABLE `questions` (
 `question_number` int(11) NOT NULL,
 `text` text NOT NULL,
 PRIMARY KEY (`question_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
