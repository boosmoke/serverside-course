CREATE TABLE `produkter` (
 `id` int(11) NOT NULL,
 `namn` varchar(255) NOT NULL,
 `produktbild` varchar(255) NOT NULL,
 `pris` double(10,2) NOT NULL,
 `beskrivning` varchar(255) NOT NULL
) 

INSERT INTO `produkter` (`id`, `namn`, `produktbild`, `pris`, `beskrivning`) VALUES
(1, 'Röda Hjul', 'red.jpeg', 250.00, 'LED Hjul med röda lysen'),
(2, 'Grön Hjul', 'green.jpeg', 250.00, 'LED Hjul med gröna lysen'),
(3, 'Blå Hjul', 'blue.jpeg', 250.00, 'LED Hjul med blåa lysen'),
(4, 'Gula Hjul', 'yellow.jpeg', 250.00, 'LED Hjul med gula lysen')