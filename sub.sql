-- PROCEDURE: driver_info()
-- Get the statistics of drivers into a temporary table
-- which is available only in one session
DELIMITER //
CREATE PROCEDURE driver_info ()
BEGIN
	CREATE TEMPORARY TABLE trafix.driver_stats (
		age INT NOT NULL,
		available INT NOT NULL,
		count INT NOT NULL
	);
	INSERT INTO trafix.driver_stats
		SELECT drive_age age, assigned available, count(drive_age) count
		FROM trafix.driver
		GROUP BY drive_age, assigned;
END
//
DELIMITER ;

-- TRIGGER: freq_constraint
-- to check that max of freq is 50
DELIMITER //
CREATE TRIGGER freq_constraint BEFORE INSERT ON trafix.assign
	FOR EACH ROW BEGIN
		IF NEW.freq > 50 THEN
			SET NEW.freq = NULL;
		END IF;
	END;
//
DELIMITER ;


-- VIEW: cur_avl_driver
-- the current available driver
CREATE VIEW cur_avl_driver AS
	SELECT *
	FROM driver
	WHERE assigned = 0
	ORDER BY drive_age DESC



-- PROCEDURE: coach_of_route
-- select all coaches assigned to the same route
-- store them in a temporary table
-- TEMP: coachofroute
DELIMITER //
CREATE PROCEDURE coach_of_route (IN route_num INT)
BEGIN
	CREATE TEMPORARY TABLE coachofroute (
		route_id INT(11) NOT NULL,
		coach_id INT(11) NOT NULL,
		type TINYINT(4) NOT NULL,
		age	INT(11),
		repair TINYINT(1) NOT NULL
	);
	INSERT INTO coachofroute
		SELECT route_id, coach.coach_id, type, age, repair
		FROM assign LEFT JOIN coach ON assign.coach_id = coach.coach_id
		WHERE assign.route_id = route_num;
END
//
DELIMITER ;

-- PROCEDURE: route_assign
-- display route assignment information
-- TEMP: routeassign
DELIMITER //
CREATE PROCEDURE route_assign ()
BEGIN
	CREATE TEMPORARY TABLE routeassign (
		route_id INT NOT NULL,
		src_name VARCHAR(45),
		des_name VARCHAR(45),
		distance INT NOT NULL,
		coach_num INT
	);
	INSERT INTO routeassign
		SELECT y.route_id route_id, src_name, des_name, distance, coalesce(coach_num, 0)
 		FROM (
			SELECT route_id, src_name, name des_name, distance 
			FROM (
				SELECT route_id, name src_name, distance, des 
				FROM route LEFT JOIN city ON route.src = city.city_id
				) x LEFT JOIN city ON x.des = city.city_id
 			) y LEFT JOIN (
			SELECT route_id, count(coach_id) coach_num
			FROM assign
			GROUP BY route_id
			) z ON y.route_id = z.route_id;
END
//
DELIMITER ;

-- PROCEDURE: pop_des
-- SELECT the top 10 most poplular destination
DELIMITER //
CREATE PROCEDURE pop_des ()
BEGIN
	CREATE TEMPORARY TABLE popdes (
		des_name VARCHAR(45) NOT NULL,
		count INT NOT NULL
	);
	INSERT INTO popdes
		SELECT name des_name, count
		FROM (
			SELECT des, count(des) count
			FROM ticket_info JOIN (
				SELECT route_id, des
				FROM route
				) x on ticket_info.route_id = x.route_id
			GROUP BY des
		) y JOIN city on y.des = city.city_id
		ORDER BY count DESC
		LIMIT 10;
END
//
DELIMITER ;


-- TRIGGER: auto_assign
-- When the total coach seats cannot meet the demand of increasing
-- passenger flow, the system will auto assign a coach
-- onto the route
DELIMITER //
DROP TRIGGER IF EXISTS trafix.auto_assign//
CREATE TRIGGER auto_assign BEFORE INSERT ON trafix.ticket_info
	FOR EACH ROW BEGIN
		DECLARE total INT; -- temp var to hold the current total
		DECLARE seats INT; -- temp var to hold current total seats
		DECLARE newcoach INT; -- temp var to hold a random selected new coach
		DECLARE nfreq INT; -- temp var to hold next freq of a route
		SELECT COUNT(*) INTO total FROM ticket_info WHERE route_id = NEW.route_id;
-- 		IF total > 10345 THEN
-- 			SET NEW.route_id = 'a';
-- 		END IF;
		SELECT coalesce(sum(seat),0) INTO seats FROM assign NATURAL JOIN coach WHERE route_id = NEW.route_id; -- total seats avl
		IF seats <= total THEN
			SELECT coach_id into newcoach FROM coach WHERE avl = 1 ORDER BY rand() LIMIT 1;
			SELECT coalesce(max(freq),0) INTO nfreq FROM assign WHERE route_id = NEW.route_id;
			INSERT INTO assign value (newcoach, NEW.route_id, nfreq + 1);
			UPDATE coach SET avl = 0 WHERE coach_id = newcoach;
		END IF;
	END;
//
DELIMITER ;

