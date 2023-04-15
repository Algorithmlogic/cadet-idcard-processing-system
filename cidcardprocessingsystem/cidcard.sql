create TABLE `admininfo`(
	`adminid` int(11) NOT NULL,
	`username` varchar(20) NOT NULL,
	`password` varchar(20) NOT NULL,
	`fullname` varchar(20) NOT NULL,
	`email` varchar(20) NOT NULL
) ENGINE= InnoDB DEFAULT CHARSET=Latin1;

--
-- dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`adminid`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'admin', 'admin', 'Nda cadet', 'ndacadet@gmail.com');

create TABLE `user` (
`idno` int(10) NOT NULL primary key Auto_INCREMENT,
`Ndano` varchar(20) NOT NULL,
`password` varchar(20) NOT NULL,
`fullname` varchar(20) NOT NULL,
`rank` varchar(20) NOT NULL,
`course` varchar(20) NOT NULL,
` department` varchar(20) NOT NULL,
`height` varchar(20) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=Latin1;