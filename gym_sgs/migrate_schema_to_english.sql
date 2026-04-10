USE inmortal;

-- Normalize key layout before renaming
ALTER TABLE actividades
  DROP INDEX actividades_ibfk_1,
  ADD INDEX idx_actividades_id_entrenador (id_entrenador);

ALTER TABLE reservas
  DROP INDEX reservas_ibfk_2,
  DROP INDEX uq_reserva,
  ADD PRIMARY KEY (id_socio, cod_act),
  ADD INDEX idx_reservas_cod_act (cod_act);

-- Rename columns to English
ALTER TABLE socios
  CHANGE id_socio member_id INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE Nombre name VARCHAR(60) NOT NULL,
  CHANGE Edad age INT(3) NOT NULL,
  CHANGE Telefono phone VARCHAR(20) NOT NULL;

ALTER TABLE entrenadores_personales
  CHANGE id_entrenador trainer_id INT(11) NOT NULL AUTO_INCREMENT,
  CHANGE Nombre name VARCHAR(60) NOT NULL,
  CHANGE Tipo specialty VARCHAR(60) NOT NULL,
  CHANGE Edad age INT(3) NOT NULL;

ALTER TABLE actividades
  CHANGE cod_act activity_code VARCHAR(10) NOT NULL,
  CHANGE Nombre name VARCHAR(60) NOT NULL,
  CHANGE id_entrenador trainer_id INT(11) NOT NULL,
  CHANGE Horario schedule VARCHAR(60) NOT NULL,
  CHANGE imagen image VARCHAR(80) NOT NULL;

ALTER TABLE reservas
  CHANGE id_socio member_id INT(11) NOT NULL,
  CHANGE cod_act activity_code VARCHAR(10) NOT NULL,
  CHANGE fecha reservation_date DATE NOT NULL,
  CHANGE precio price DECIMAL(10,2) NOT NULL;

-- Rename tables to English
RENAME TABLE
  socios TO members,
  entrenadores_personales TO personal_trainers,
  actividades TO activities,
  reservas TO reservations;

-- Rename indexes for readability
ALTER TABLE activities
  RENAME INDEX idx_actividades_id_entrenador TO idx_activities_trainer_id;

ALTER TABLE reservations
  RENAME INDEX idx_reservas_cod_act TO idx_reservations_activity_code;

-- Recreate relations in English
ALTER TABLE activities
  ADD CONSTRAINT fk_activities_trainer
  FOREIGN KEY (trainer_id) REFERENCES personal_trainers(trainer_id)
  ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE reservations
  ADD CONSTRAINT fk_reservations_member
  FOREIGN KEY (member_id) REFERENCES members(member_id)
  ON UPDATE CASCADE ON DELETE CASCADE,
  ADD CONSTRAINT fk_reservations_activity
  FOREIGN KEY (activity_code) REFERENCES activities(activity_code)
  ON UPDATE CASCADE ON DELETE CASCADE;
