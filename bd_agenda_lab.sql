CREATE TABLE `tb_agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `data` date NOT NULL,
  `data_agendamento` date NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_laboratorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tb_laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tb_professor` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `matricula` int(11) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `tb_agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_laboratorio` (`id_laboratorio`);


ALTER TABLE `tb_laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`);

ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`id_professor`);


ALTER TABLE `tb_agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `tb_laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tb_professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tb_agendamento`
  ADD CONSTRAINT `tb_agendamento_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `tb_professor` (`id_professor`),
  ADD CONSTRAINT `tb_agendamento_ibfk_2` FOREIGN KEY (`id_laboratorio`) REFERENCES `tb_laboratorio` (`id_laboratorio`);
COMMIT;
