--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `parent_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `parent_category_id`) VALUES
(2, 'Chemicals', 0),
(3, 'Inorganic chemicals', 2),
(4, 'Organic Chemicals', 2),
(5, 'Electronics', 0),
(6, 'Laptop', 5),
(7, 'Dell', 6),
(8, 'i3 Processor', 7),
(9, 'i5 Processors', 7),
(10, 'i7 Processors', 7),
(11, 'Epoxy', 2),
(12, 'Fine Chemicals', 2),
(13, 'Mobile', 5),
(14, 'Sensors', 5),
(15, 'Food', 0),
(16, 'Textile', 0),
(17, 'Fruits', 15),
(18, 'Vegetables', 15),
(19, 'Safety Shoes', 16),
(20, 'Uniform', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

-------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `item_sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
