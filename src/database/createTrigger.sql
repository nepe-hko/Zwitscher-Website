DELIMITER /
CREATE TRIGGER create_guid BEFORE INSERT ON Sessions
 FOR EACH ROW BEGIN
SET NEW.SessionId = UUID();
END;
/ DELIMITER;
